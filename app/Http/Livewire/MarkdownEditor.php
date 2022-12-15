<?php

namespace App\Http\Livewire;

use App\CustomMarkdownConverter;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class MarkdownEditor extends Component
{
    use AuthorizesRequests;

    const TAB_EDIT = 'edit';
    const TAB_PREVIEW = 'preview';

    public $activeTab = self::TAB_EDIT;

    public $originalContent = '';
    public $previewOutput = '';

    public function createPreview(string $content)
    {
        $this->previewOutput = CustomMarkdownConverter::convert(
            $content
        )->getContent();
    }

    public function resetState()
    {
        $this->enterEditMode();

        $this->previewOutput = '';
    }

    public function enterEditMode()
    {
        $this->setTab(self::TAB_EDIT);
    }

    public function enterPreviewMode(string $content)
    {
        if ($this->activeTab === self::TAB_PREVIEW) {
            return;
        }

        $this->setTab(self::TAB_PREVIEW);
        $this->createPreview($content);
    }

    public function setTab(string $tab)
    {
        if (!in_array($tab, [self::TAB_EDIT, self::TAB_PREVIEW])) {
            return;
        }

        $this->activeTab = $tab;
    }

    public function render()
    {
        return view('livewire.markdown-editor');
    }
}
