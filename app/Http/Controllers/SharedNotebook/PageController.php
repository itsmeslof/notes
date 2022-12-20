<?php

namespace App\Http\Controllers\SharedNotebook;

use App\Http\Controllers\Controller;
use App\Models\NotebookShareLink;
use App\Services\NotebookPageService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show(Request $request, NotebookShareLink $notebookShareLink, string $pageHashId)
    {
        $notebookPage = $notebookShareLink->notebook->pages()->where('hashid', $pageHashId)->firstOrFail();
        if (!in_array($notebookPage->id, $notebookShareLink->visiblePageIds())) {
            abort(404);
        }

        return view('shared-notebook.page.show', [
            'shareLink' => $notebookShareLink,
            'notebook' => $notebookShareLink->notebook,
            'page' => $notebookPage,
            'renderedOutput' => app(NotebookPageService::class)->getRenderedOutput($notebookPage),
        ]);
    }
}
