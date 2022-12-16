<?php

namespace App\Http\Livewire\Notebooks\Pages;

use App\CustomMarkdownConverter;
use App\Models\Notebook;
use App\Services\NotebookPageService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class MarkdownEditor extends Component
{
    use AuthorizesRequests;

    public string $mdContent;

    public function save(NotebookPageService $notebookPageService, string $notebookHash, string $pageHash, string $content)
    {
        $notebook = Notebook::where('hashid', $notebookHash)->firstOrFail();
        $page = $notebook->pages()->where('hashid', $pageHash)->firstOrFail();

        $this->authorize('update', $page);

        $page->content = $content;
        $page->save();

        $notebookPageService->setOutputCache(
            $page,
            CustomMarkdownConverter::convert($content)->getContent()
        );

        $redirectTo = route('notebooks.pages.show', [$notebook, $page]);
        $flash = 'Page content updated!';

        session()->flash('status', $flash);
        return redirect($redirectTo);
    }

    public function render()
    {
        return view('livewire.notebooks.pages.markdown-editor');
    }
}
