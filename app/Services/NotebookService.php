<?php

namespace App\Services;

use App\Models\Notebook;
use App\Models\User;

class NotebookService
{
    public function store(User $user, array $validatedData): Notebook
    {
        $notebook = $user->notebooks()->create($validatedData);
        return $notebook;
    }

    public function destroy(Notebook $notebook): void
    {
        $notebook->delete();
    }
}
