<?php

namespace App\Services;

use App\Models\Notebook;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class NotebookService
{
    public function store(User $user, array $validatedData): Notebook
    {
        $notebook = $user->notebooks()->create($validatedData);

        Log::info('NotebookService::store return $notebook');
        return $notebook;
    }
}
