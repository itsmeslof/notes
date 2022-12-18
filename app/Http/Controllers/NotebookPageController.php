<?php

namespace App\Http\Controllers;

use App\Exceptions\ResourceAlreadySoftDeletedException;
use App\Http\Requests\StoreNotebookPageRequest;
use App\Http\Requests\UpdateNotebookPageRequest;
use App\Models\Notebook;
use App\Models\NotebookPage;
use App\Services\NotebookPageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class NotebookPageController extends Controller
{
    public function __construct(private NotebookPageService $notebookPageService)
    {
    }

    public function index(Notebook $notebook)
    {
        abort(404);
    }

    public function edit(Notebook $notebook, NotebookPage $page)
    {
        $this->authorize('update', $page);

        return view('notebooks.pages.edit', [
            'notebook' => $notebook,
            'page' => $page
        ]);
    }

    public function update(UpdateNotebookPageRequest $request, Notebook $notebook, NotebookPage $page)
    {
        $page->update($request->validated());

        session()->flash('status', 'Page updated!');

        return redirect()->route('notebooks.pages.show', [$notebook, $page]);
    }

    public function create(Notebook $notebook)
    {
        $this->authorize('update', $notebook);

        if ($notebook->trashed()) {
            return back()->withErrors('You can not create a page for this notebook while it is trashed.');
        }

        return view('notebooks.pages.create', [
            'notebook' => $notebook
        ]);
    }

    public function show(Notebook $notebook, NotebookPage $page)
    {
        $this->authorize('view', $page);

        return view('notebooks.pages.show', [
            'notebook' => $notebook,
            'page' => $page,
            'renderedOutput' => $this->notebookPageService->getRenderedOutput($page)
        ]);
    }

    public function store(StoreNotebookPageRequest $request, Notebook $notebook)
    {
        $page = $this->notebookPageService->store($request->user(), $notebook, $request->validated());

        session()->flash('status', 'Page created!');

        return redirect()->route('notebooks.pages.show', [$notebook, $page]);
    }

    public function destroy(Notebook $notebook, NotebookPage $page)
    {
        $this->authorize('delete', $page);

        Cache::forget($page->getCacheKey());

        $this->notebookPageService->destroy($page);
        session()->flash('status', 'Page deleted!');

        return redirect()->route('notebooks.show', $notebook);
    }

    public function restore(Notebook $notebook, NotebookPage $page)
    {
        $this->authorize('restore', $page);

        $page->restore();
        session()->flash('status', 'Page restored!');

        return redirect()->route('notebooks.pages.show', [$notebook, $page]);
    }
}
