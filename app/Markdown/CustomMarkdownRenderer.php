<?php

namespace App\Markdown;

use League\CommonMark\Environment\Environment;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;
use League\CommonMark\Extension\ExternalLink\ExternalLinkExtension;
use League\CommonMark\Extension\FrontMatter\FrontMatterExtension;
use League\CommonMark\Extension\FrontMatter\Output\RenderedContentWithFrontMatter;
use League\CommonMark\Extension\GithubFlavoredMarkdownExtension;
use League\CommonMark\Extension\HeadingPermalink\HeadingPermalinkExtension;
use League\CommonMark\MarkdownConverter;
use Spatie\CommonMarkHighlighter\FencedCodeRenderer;
use Spatie\CommonMarkHighlighter\IndentedCodeRenderer;

class CustomMarkdownRenderer
{
    private $config = [];
    private MarkdownConverter $markdownConverter;
    private Environment $environment;

    public function __construct()
    {
        $this->config = CustomMarkdownConfig::options();
        $this->environment = new Environment($this->config);
        $this->configureExtensions();
        $this->configureRenderers();
        $this->markdownConverter = new MarkdownConverter($this->environment);
    }

    private function configureExtensions()
    {
        $this->environment->addExtension(new CommonMarkCoreExtension());
        $this->environment->addExtension(new GithubFlavoredMarkdownExtension());
        $this->environment->addExtension(new ExternalLinkExtension());
        $this->environment->addExtension(new HeadingPermalinkExtension());
        $this->environment->addExtension(new FrontMatterExtension());
    }

    private function configureRenderers()
    {
        $this->environment->addRenderer(FencedCode::class, new FencedCodeRenderer());
        $this->environment->addRenderer(IndentedCode::class, new IndentedCodeRenderer());
    }

    /**
     * Convert the input string into rendered HTML and extract frontmatter.
     *
     * @throws \League\CommonMark\Extension\FrontMatter\Exception\InvalidFrontMatterException
     */
    public function render(string $input): MarkdownParseResult
    {
        $result = $this->markdownConverter->convert($input);
        $frontMatter = ($result instanceof RenderedContentWithFrontMatter)
            ? $result->getFrontMatter()
            : [];

        return new MarkdownParseResult(
            metadata: [
                'title' => $frontMatter['title'] ?? 'Untitled Note',
                'description' => $frontMatter['description'] ?? '',
                'tags' => $frontMatter['tags'] ?? [],
                'visibility' => $frontMatter['visibility'] ?? 'private',
                'author' => $frontMatter['author'] ?? 'private',
            ],
            outputHtml: $result->getContent()
        );
    }
}
