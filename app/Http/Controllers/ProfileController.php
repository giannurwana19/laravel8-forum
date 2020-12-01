<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(User $user)
    {
        $forums = Forum::where('user_id', $user->id)->latest()->paginate(10);
        return view('profiles.index', compact('user', 'forums'));
    }
}
