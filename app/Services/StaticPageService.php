<?php

namespace App\Services;

use App\CustomMarkdownConverter;
use App\Models\StaticPage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

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
        // return Cache::get($page->getCacheKey(), 'CACHE NOT FOUND');

        $output = Cache::remember(
            $page->getCacheKey(),
            3600,
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
        Cache::put(
            $cacheKey,
            $output,
            3600
        );
    }

    public function updatePageContent(StaticPage $page, string $content, string $output)
    {
        $page->md_content = $content;
        $page->save();

        $this->cacheOutput($page->getCacheKey(), $output);
    }

    public function invalidateCache(string $cacheKey)
    {
        Cache::forget($cacheKey);
    }
}
