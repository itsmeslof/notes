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
            [
                'content' => "# {$validatedData['name']}"
            ]
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

        $output = Cache::remember(
            $page->getCacheKey(),
            3600,
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
        Cache::put($page->getCacheKey(), $output, 3600);
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
        return Cache::get($page->getCacheKey());
    }
}
