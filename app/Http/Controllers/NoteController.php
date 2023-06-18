<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNoteRequest;
use App\Models\Note;
use App\Services\NoteService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use League\CommonMark\Extension\FrontMatter\Exception\InvalidFrontMatterException;

class NoteController extends Controller
{
    public function __construct(
        private NoteService $noteService,
    ) {
    }

    public function index(Request $request)
    {
        return Inertia::render('Notes/Index', [
            'notes' => $request->user()->notes
        ]);
    }

    public function create(Request $request)
    {
        return Inertia::render('Notes/Create');
    }

    public function show(Request $request, Note $note)
    {
        $parseResult = $this->noteService->render($note->content);

        return Inertia::render('Notes/Show', [
            'note' => $note,
            'outputHtml' => $parseResult->outputHtml
        ]);
    }

    public function edit(Request $request, Note $note)
    {
        $this->authorize('update', $note);

        return Inertia::render('Notes/Edit', [
            'note' => $note
        ]);
    }

    public function store(StoreNoteRequest $request)
    {
        $validated = $request->validated();

        try {
            $note = $this->noteService->store(
                $request->user(),
                $validated['content']
            );
        } catch (InvalidFrontMatterException $e) {
            return back()->withErrors(['content' => $e->getMessage()]);
        }

        $request->session()->flash('status', 'Note created!');
        return redirect()->route('notes.show', $note);
    }

    public function update(StoreNoteRequest $request, Note $note)
    {
        $this->authorize('update', $note);

        $validated = $request->validated();

        try {
            $this->noteService->update(
                $note,
                $validated['content']
            );
        } catch (InvalidFrontMatterException $e) {
            return back()->withErrors(['content' => $e->getMessage()]);
        }

        $request->session()->flash('status', 'Note updated!');
        return redirect()->route('notes.show', $note);
    }
}
