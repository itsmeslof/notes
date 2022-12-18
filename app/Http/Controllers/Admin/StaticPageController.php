<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaticPageRequest;
use App\Http\Requests\UpdateStaticPageRequest;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function index()
    {
        return view('admin.static-pages.index', [
            'pages' => StaticPage::all()
        ]);
    }

    public function show(Request $request, StaticPage $page)
    {
        return view('admin.static-pages.show', [
            'page' => $page,
            'renderedOutput' => $page->getRenderedOutput()
        ]);
    }

    public function create()
    {
        return view('admin.static-pages.create');
    }

    public function store(StoreStaticPageRequest $request)
    {
        $validated = $request->validated();

        $page = StaticPage::create(array_merge(
            $validated,
            [
                'md_content' => "# {$validated['title']}"
            ]
        ));

        session()->flash('status', 'Page created!');
        return redirect()->route('admin.pages.show', $page);
    }

    public function edit(Request $request, StaticPage $page)
    {
        return view('admin.static-pages.edit', [
            'page' => $page
        ]);
    }

    public function update(UpdateStaticPageRequest $request, StaticPage $page)
    {
        $page->update($request->validated());

        session()->flash('status', 'Page updated!');
        return redirect()->route('admin.pages.show', $page);
    }

    public function destroy(Request $request, StaticPage $page)
    {
        $page->delete();

        session()->flash('status', 'Page deleted!');
        return redirect()->route('admin.pages.index');
    }
}
