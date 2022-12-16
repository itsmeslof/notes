<?php

namespace App\Models;

use App\Services\StaticPageService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'slug',
        'md_content'
    ];

    /**
     * Get the rendered HTML output from a Page's markdown contents. If it doesn't exist, render it and cache the output.
     *
     * @param StaticPage $page
     *
     * @return string
     */
    public function getRenderedOutput(): string
    {
        return app(StaticPageService::class)->getRenderedOutput($this);
    }

    /**
     * Cache the page's rendered HTML output.
     *
     * @param string $output
     *
     * @return void
     */
    public function cacheOutput(string $output): void
    {
        app(StaticPageService::class)->cacheOutput($this->getCacheKey(), $output);
    }

    /**
     * Get the Page's cache key.
     *
     * @return string
     */
    public function getCacheKey(): string
    {
        return "static-page.{$this->id}.output";
    }
}
