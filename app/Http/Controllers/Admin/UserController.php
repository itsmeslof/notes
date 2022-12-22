<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', [
            'users' => User::all()
        ]);
    }

    public function show(User $user)
    {
        return view('admin.users.show', [
            'user' => $user
        ]);
    }

    public function destroy(User $user)
    {
        if ($user->id === auth()->user()->id) {
            return back()->withErrors('You can\'t delete your own account!');
        }

        $user->delete();
        session()->flash('status', 'User deleted!');
        return redirect()->route('admin.users.index');
    }
}
