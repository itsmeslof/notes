<?php

namespace App\Http\Controllers\Notes;

use App\Http\Controllers\Controller;
use App\Models\Note;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DeleteController extends Controller
{
    public function show(Request $request, Note $note)
    {
        $this->authorize('delete', $note);

        return Inertia::render('Notes/Delete', [
            'note' => $note
        ]);
    }

    public function destroy(Request $request, Note $note)
    {
        $this->authorize('delete', $note);

        $note->delete();

        // We need to clear the cached markdown for this note

        $request->session()->flash('status', 'Note deleted');
        return redirect()->route('dashboard');
    }
}
