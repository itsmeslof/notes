<?php

namespace App\Http\Controllers\Notebooks;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateNotebookBookmarkRequest;
use App\Models\Notebook;

class BookmarkController extends Controller
{
    public function update(UpdateNotebookBookmarkRequest $request, Notebook $notebook)
    {
        $notebook->update($request->validated());

        $message =  $notebook->bookmarked ? 'Bookmark created' : 'Bookmark removed';
        return redirect()->route('notebooks.show', $notebook)->with('status', $message);
    }
}
