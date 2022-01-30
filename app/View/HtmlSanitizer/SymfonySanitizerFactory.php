<?php

namespace App\View\HtmlSanitizer;

use Symfony\Component\HtmlSanitizer\HtmlSanitizer;
use Symfony\Component\HtmlSanitizer\HtmlSanitizerConfig;

class SymfonySanitizerFactory
{
    public static function make(): HtmlSanitizer
    {
        return new HtmlSanitizer(static::configuration(), PHP_INT_MAX);
    }

    protected static function configuration(): HtmlSanitizerConfig
    {
        return (new HtmlSanitizerConfig())
            ->allowSafeElements()
            ->allowElement('figure')
            ->allowElement('figcaption')
            // ->allowElement('rich-text-attachment', ['sgid', 'content', 'contentType', 'height', 'width'])
            ->allowAttribute('class', '*')
            ->allowAttribute('data-turbo-frame', ['a', 'form', 'button'])
        ;
    }
}
