<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use App\Models\NotebookPage;
use App\Models\NotebookShareLink;
use App\Services\NotebookPageService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class NotebookShareLinkController extends Controller
{
    public function index(Request $request, Notebook $notebook)
    {
        return view('notebooks.share.index', [
            'notebook' => $notebook,
            'activeShareLinks' => $notebook->notebookShareLinks,
        ]);
    }

    public function create(Request $request, Notebook $notebook)
    {
        return view('notebooks.share.create', [
            'notebook' => $notebook,
        ]);
    }

    public function edit(Request $request, Notebook $notebook, NotebookShareLink $notebookShareLink)
    {
        return view('notebooks.share.edit', [
            'shareLink' => $notebookShareLink,
            'visiblePageIds' => $notebookShareLink->visiblePageIds(),
            'notebook' => $notebookShareLink->notebook,
        ]);
    }

    // Formrequest?
    public function store(Request $request, Notebook $notebook)
    {
        $validated = $request->validate([
            'active_pages' => ['required', 'array'],
            'active_pages.*' => [
                'required',
                'numeric',
                Rule::exists('notebook_pages', 'id')
                    ->where('notebook_id', $notebook->id)
            ],
            'hide_notebook_name' => ['required', 'boolean'],
        ]);

        $pageData = [
            'visible_pages' => $validated['active_pages']
        ];

        $notebookShareLink = NotebookShareLink::create([
            'notebook_id' => $notebook->id,
            'page_data' => $pageData,
            'hide_notebook_name' => $validated['hide_notebook_name']
        ]);

        session()->flash('status', 'Share link created!');
        return redirect()->route('notebooks.share.index', $notebook);
    }

    public function update(Request $request, Notebook $notebook, NotebookShareLink $notebookShareLink)
    {
        $validated = $request->validate([
            'active_pages' => ['required', 'array'],
            'active_pages.*' => [
                'required',
                'numeric',
                Rule::exists('notebook_pages', 'id')
                    ->where('notebook_id', $notebook->id)
            ],
            'hide_notebook_name' => ['required', 'boolean'],
        ]);

        $pageData = [
            'visible_pages' => $validated['active_pages']
        ];

        $notebookShareLink->update([
            'page_data' => $pageData,
            'hide_notebook_name' => $validated['hide_notebook_name']
        ]);

        session()->flash('status', 'Share link updated!');
        return redirect()->route('notebooks.share.index', $notebook);
    }

    public function show(Request $request, NotebookShareLink $notebookShareLink)
    {
        return view('shared-notebook.show', [
            'shareLink' => $notebookShareLink,
            'notebook' => $notebookShareLink->notebook,
            'visiblePages' => $notebookShareLink->visiblePages(),
        ]);
    }
}
