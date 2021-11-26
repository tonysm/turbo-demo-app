<?php

use App\Models\Reactions\EmojiRepository;
use Illuminate\Http\Client\Pool;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('app:prune-emojis', function (EmojiRepository $emojis) {
    $perPage = 200;
    $exists = [];

    $emojis->chunk($perPage)->each(function ($items) use ($emojis, &$exists) {
        $this->info(sprintf('Testing %d items...', $items->count()));

        $responses = Http::pool(fn (Pool $pool) => $items->map(fn (array $emoji) => (
            $pool->as($emoji['short_name'])->get($emojis->findSvgImageByName($emoji['short_name']))
        ))->all());

        foreach ($responses as $shortName => $response) {
            if ($response->ok()) {
                $exists[] = $emojis->findByName($shortName);
            }
        }

        File::put(app_path('Models/Reactions/cleaned-emojis.json'), json_encode($exists, JSON_PRETTY_PRINT));
        sleep(2);
    });

    File::put(app_path('Models/Reactions/cleaned-emojis.json'), json_encode($exists, JSON_PRETTY_PRINT));
})->purpose('Loops-through the emojis list and checks clears the ones created.');

Artisan::command('app:reorder-emojis', function (EmojiRepository $emojis) {
    $sorted = $emojis->getLazyCollection()
        ->sortBy('sort_order')
        ->values()
        ->all();

    File::put(app_path('Models/Reactions/emoji.json'), json_encode($sorted, JSON_PRETTY_PRINT));
})->purpose('Loops-through the emojis to reoder them.');
