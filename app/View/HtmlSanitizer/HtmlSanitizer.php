<?php

namespace App\View\HtmlSanitizer;

interface HtmlSanitizer
{
    /**
     * Sanitizes HTML from a WYSIWYG editor into safe HTML
     * we can render in the browser.
     *
     * @param string $html The raw HTML.
     * @return string The safe HTML.
     */
    public function sanitize(string $html): string;
}
