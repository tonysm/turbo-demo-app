<?php

namespace App\View\HtmlSanitizer;

use Symfony\Component\HtmlSanitizer\HtmlSanitizer as SymfonySanitizer;

class SymfonyHtmlSanitizer implements HtmlSanitizer
{
    public function __construct(private SymfonySanitizer $sanitizer)
    {
        //
    }

    /**
     * {@inheritDoc}
     */
    public function sanitize(string $html): string
    {
        return $this->sanitizer->sanitize($html);
    }
}
