<?php

namespace App;

use BenFiratKaya\CommonMarkExtension\UnderlineExtension;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Extension\Footnote\FootnoteExtension;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\Extension\TableOfContents\TableOfContentsExtension;
use League\CommonMark\MarkdownConverter;
use N0sz\CommonMark\Marker\MarkerExtension;
use Spatie\CommonMarkShikiHighlighter\HighlightCodeExtension;

class CustomMarkdownConverter
{
    static $baseConfig = [
        'max_nesting_level' => 10,
        'html_input' => 'escape',
        'external_link' => [
            'internal_hosts' => 'localhost', // TODO: Don't forget to set this!
            'open_in_new_window' => true,
            'html_class' => 'external-link',
            'nofollow' => '',
            'noopener' => 'external',
            'noreferrer' => 'external',
        ],
        'heading_permalink' => [
            'html_class' => 'heading-permalink',
            'id_prefix' => 'content',
            'fragment_prefix' => 'content',
            'insert' => 'before',
            'min_heading_level' => 1,
            'max_heading_level' => 6,
            'title' => 'Permalink',
            'symbol' => '#',
            'aria_hidden' => true,
        ],
        'footnote' => [
            'backref_class'      => 'footnote-backref',
            'backref_symbol'     => '↩',
            'container_add_hr'   => true,
            'container_class'    => 'footnotes',
            'ref_class'          => 'footnote-ref',
            'ref_id_prefix'      => 'fnref:',
            'footnote_class'     => 'footnote',
            'footnote_id_prefix' => 'fn:',
        ],
        'table_of_contents' => [
            'html_class' => 'table-of-contents',
            'position' => 'top',
            'style' => 'ordered',
            'min_heading_level' => 1,
            'max_heading_level' => 6,
            'normalize' => 'relative',
            'placeholder' => null,
        ],
    ];

    public static function convert(string $input)
    {
        return (new MarkdownConverter(
            static::createEnvironment()
        ))->convert($input);
    }

    private static function createEnvironment()
    {
        $environment = (new Environment(static::$baseConfig))
            ->addExtension(new CommonMarkCoreExtension())
            ->addExtension(new GithubFlavoredMarkdownExtension())
            ->addExtension(new MarkerExtension())
            ->addExtension(new HighlightCodeExtension('github-dark'))
            ->addExtension(new ExternalLinkExtension())
            ->addExtension(new HeadingPermalinkExtension())
            ->addExtension(new FootnoteExtension())
            ->addExtension(new TableOfContentsExtension())
            ->addExtension(new UnderlineExtension());

        return $environment;
    }
}
