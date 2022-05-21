<?php

namespace App\Providers;

use App\Models\Attachment;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\View\HtmlSanitizer\HtmlSanitizer;
use App\View\HtmlSanitizer\SymfonyHtmlSanitizer;
use App\View\HtmlSanitizer\SymfonySanitizerFactory;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Symfony\Component\HtmlSanitizer\HtmlSanitizer as SymfonyHtmlSanitizerBase;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(HtmlSanitizer::class, SymfonyHtmlSanitizer::class);
        $this->app->bind(SymfonyHtmlSanitizerBase::class, fn () => SymfonySanitizerFactory::make());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Turbo::broadcastToOthers(true);
        Relation::enforceMorphMap([
            'attachment' => Attachment::class,
            'user' => User::class,
            'post' => Post::class,
            'comment' => Comment::class,
        ]);
    }
}
