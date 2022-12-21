<?php

namespace App\Http\Controllers;

use App\Models\Notebook;
use App\Http\Requests\StoreNotebookRequest;
use App\Http\Requests\UpdateNotebookRequest;
use App\Services\NotebookService;
use Illuminate\Http\Request;

class NotebookController extends Controller
{
    public function __construct(private NotebookService $notebookService)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $notebooks = $request->user()->notebooks()->get();

        return view('notebooks.index', [
            'allNotebooks' => $notebooks
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notebooks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNotebookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNotebookRequest $request)
    {
        $notebook = $this->notebookService->store($request->user(), $request->validated());

        session()->flash('status', 'Notebook created!');

        return redirect()->route('notebooks.show', $notebook);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Http\Response
     */
    public function show(Notebook $notebook)
    {
        $this->authorize('view', $notebook);

        return view('notebooks.show', [
            'notebook' => $notebook
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Http\Response
     */
    public function edit(Notebook $notebook)
    {
        $this->authorize('update', $notebook);

        return view('notebooks.edit', [
            'notebook' => $notebook
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNotebookRequest  $request
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNotebookRequest $request, Notebook $notebook)
    {
        $notebook->update($request->validated());

        session()->flash('status', 'Notebook updated!');

        return redirect()->route('notebooks.show', $notebook);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notebook  $notebook
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Notebook $notebook)
    {
        $this->authorize('delete', $notebook);

        $this->notebookService->destroy($notebook);
        session()->flash('status', 'Notebook deleted!');

        return redirect()->route('notebooks.index');
    }

    public function restore(Notebook $notebook)
    {
        $this->authorize('restore', $notebook);

        $notebook->restore();
        session()->flash('status', 'Notebook restored!');

        return redirect()->route('notebooks.show', $notebook);
    }
}
