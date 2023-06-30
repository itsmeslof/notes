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
            ->whereNotNull('last_viewed_at')
            ->where('last_viewed_at', '>', now()->subDays(14)->endOfDay())
            ->orderBy('last_viewed_at', 'DESC')
            ->limit(4)
            ->get();

        return Inertia::render('Dashboard', [
            'recentNotes' => $recentNotes,
        ]);
    }
}
