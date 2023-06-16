<?php

namespace App\Markdown;

class MarkdownParseResult
{
    public function __construct(
        public array $metadata = [],
        public string $outputHtml = "",
        public string $error = ""
    ) {
    }
}
