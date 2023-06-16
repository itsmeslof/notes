<?php

namespace App\Services;

use App\Markdown\CustomMarkdownRenderer;
use App\Markdown\MarkdownParseResult;

/**
 * General purpose Markdown Service for interacting with Markdown input and rendering.
 */
class MarkdownService
{
    public function __construct(
        protected CustomMarkdownRenderer $renderer
    ) {
    }

    /**
     * Render the markdown and return metadata and output html.
     */
    public function render(string $input): MarkdownParseResult
    {
        return $this->renderer->render($input);
    }
}
