<?php

namespace App\Services;

use App\CustomMarkdownConverter;
use App\Models\Notebook;
use App\Models\NotebookPage;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class NotebookPageService
{
    public function store(User $user, Notebook $notebook, array $validatedData): NotebookPage
    {
        $page = $notebook->pages()->create(array_merge(
            $validatedData,
        ));
        return $page;
    }

    public function destroy(NotebookPage $page): void
    {
        $page->delete();
    }

    /**
     * Get the rendered HTML output from a Page's markdown contents.
     *
     * @param NotebookPage $page
     *
     * @return string
     */
    public function getRenderedOutput(NotebookPage $page): string
    {
        // TODO: convert this to a CacheService

        $output = Cache::rememberForever(
            $this->getCacheKey($page),
            function () use ($page) {
                return CustomMarkdownConverter::convert($page->content)->getContent();
            }
        );

        return $output;
    }

    /**
     * Cache the page's rendered HTML output.
     *
     * @param NotebookPage $page
     * @param string $output
     *
     * @return void
     */
    public function setOutputCache(NotebookPage $page, string $output): void
    {
        Cache::put($this->getCacheKey($page), $output, 3600);
    }

    /**
     * Get the page's rendered HTML output from the cache.
     *
     * @param NotebookPage $page
     *
     * @return string|null
     */
    public function getOutputCache(NotebookPage $page): string|null
    {
        return Cache::get($this->getCacheKey($page));
    }

    /**
     * Cache the page's cache key.
     *
     * @param NotebookPage $page
     *
     * @return string
     */
    public function getCacheKey(NotebookPage $page): string
    {
        return "output-{$page->id}";
    }
}
