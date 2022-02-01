<?php

use App\Manifest;
use App\View\HtmlSanitizer\HtmlSanitizer;

use function Tonysm\TurboLaravel\dom_id as turbo_laravel_dom_id;

if (! function_exists('dom_id')) {
    function dom_id(...$args)
    {
        return turbo_laravel_dom_id(...$args);
    }
}

if (! function_exists('clean')) {
    function clean(string $html): string
    {
        return resolve(HtmlSanitizer::class)->sanitize($html);
    }
}

if (! function_exists('tailwindcss')) {
    function tailwindcss(string $path): string
    {
        return asset((new Manifest)($path));
    }
}
