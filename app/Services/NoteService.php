<?php

namespace App\Services;

use App\Markdown\MarkdownParseResult;
use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Facades\Cache;

class NoteService
{
    public function __construct(
        private MarkdownService $markdownService,
    ) {
    }

    public function render(string $content): MarkdownParseResult
    {
        // Check cache
        // Return cached version, or:
        // Render, Cache, and return

        $parseResult = $this->markdownService->render($content);

        // Cache the parse result

        return $parseResult;
    }

    public function store(User $user, string $content): Note
    {
        $parseResult = $this->markdownService->render($content);

        $note = Note::create([
            'content' => $content,
            'metadata' => $parseResult->metadata,
            'user_id' => $user->id
        ]);

        // Cache the parse result

        return $note;
    }

    public function update(Note $note, string $content)
    {
        $parseResult = $this->markdownService->render($content);

        $note->update([
            'content' => $content,
            'metadata' => $parseResult->metadata
        ]);

        // Cache the parse result
    }
}
