<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $recentNotes = $request
            ->user()
            ->notes()
            ->latest()
            ->limit(10)
            ->get();

        return Inertia::render('Dashboard', [
            'recentNotes' => $recentNotes,
        ]);
    }
}
