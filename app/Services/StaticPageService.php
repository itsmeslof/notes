<?php

namespace App\Services;

use App\CustomMarkdownConverter;
use App\Models\StaticPage;
use Illuminate\Support\Facades\Cache;

class StaticPageService
{
    /**
     * Get the rendered HTML output from a Page's markdown contents. If it doesn't exist, render it and cache the output.
     *
     * @param StaticPage $page
     *
     * @return string
     */
    public function getRenderedOutput(StaticPage $page): string
    {
        $output = Cache::rememberForever(
            $page->getCacheKey(),
            fn () => CustomMarkdownConverter::convert($page->md_content)->getContent()
        );

        return $output;
    }

    /**
     * Cache the page's rendered HTML output.
     *
     * @param string $cacheKey
     * @param string $output
     *
     * @return void
     */
    public function cacheOutput(string $cacheKey, string $output): void
    {
        Cache::forever(
            $cacheKey,
            $output
        );
    }

    public function updatePageContent(StaticPage $page, string $content, string $output)
    {
        $page->md_content = $content;
        $page->save();

        $this->cacheOutput($page->getCacheKey(), $output);
    }
}
