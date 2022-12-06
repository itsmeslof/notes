<?php

namespace App\Http\Livewire;

use App\CustomMarkdownConverter;
use App\Models\Notebook;
use App\Models\NotebookPage;
use App\Services\NotebookPageService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class EditPageContent extends Component
{
    use AuthorizesRequests;

    const TAB_EDIT = 'edit';
    const TAB_PREVIEW = 'preview';

    public $activeTab = self::TAB_EDIT;

    public NotebookPage $page;
    public Notebook $notebook;

    public $editInput = '';
    public $previewOutput = '';

    public function mount()
    {
        $this->editInput = $this->page->content;
    }

    public function createPreview($input)
    {
        $md = CustomMarkdownConverter::convert($input);
        $this->previewOutput = $md->getContent();
    }

    public function resetState()
    {
        $this->enterEditMode();

        $this->editInput = $this->page->content;
        $this->previewOutput = '';
    }

    public function enterEditMode()
    {
        $this->setTab(self::TAB_EDIT);
    }

    public function enterPreviewMode()
    {
        if ($this->activeTab === self::TAB_PREVIEW) {
            return;
        }

        $this->setTab(self::TAB_PREVIEW);
        $this->createPreview($this->editInput);
    }

    public function setTab(string $tab)
    {
        if (!in_array($tab, ['edit', 'preview'])) {
            Log::error("Invalid tab: {$tab}");
            return;
        }

        if ($tab === $this->activeTab) {
            return;
        }

        $this->activeTab = $tab;
    }

    public function save(NotebookPageService $notebookPageService)
    {
        $this->authorize('update', $this->page);

        $redirectTo = route('notebooks.pages.show', [$this->notebook, $this->page]);
        $flash = 'Page contend updated!';

        if (!($this->page->content === $this->editInput)) {
            $this->page->content = $this->editInput;
            $this->page->save();

            $output = CustomMarkdownConverter::convert($this->page->content)->getContent();
            $notebookPageService->setOutputCache($this->page, $output);
        }

        session()->flash('status', $flash);
        return redirect($redirectTo);
    }

    public function render()
    {
        return view('livewire.edit-page-content');
    }
}
