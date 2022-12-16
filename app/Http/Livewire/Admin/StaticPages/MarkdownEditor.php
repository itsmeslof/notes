<?php

namespace App\Http\Livewire\Admin\StaticPages;

use App\CustomMarkdownConverter;
use App\Models\StaticPage;
use App\Services\StaticPageService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Livewire\Component;

class MarkdownEditor extends Component
{
    use AuthorizesRequests;

    public string $mdContent;

    public function save(StaticPageService $staticPageService, string $slug, string $content)
    {
        $page = StaticPage::where('slug', $slug)->firstOrFail();

        $staticPageService->updatePageContent(
            $page,
            $content,
            CustomMarkdownConverter::convert($content)->getContent()
        );

        $redirectTo = route('admin.pages.show', [$page]);
        $flash = 'Page content updated!';

        session()->flash('status', $flash);
        return redirect($redirectTo);
    }

    public function render()
    {
        return view('livewire.admin.static-pages.markdown-editor');
    }
}
