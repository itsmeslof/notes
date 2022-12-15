<?php

namespace App\Http\Controllers;

use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function show(Request $request, StaticPage $page)
    {
        return view('static-pages.show', [
            'page' => $page
        ]);
    }
}
