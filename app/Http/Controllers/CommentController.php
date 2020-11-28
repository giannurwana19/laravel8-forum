<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Forum;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Forum $forum)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $forum->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        session()->flash('succcess', 'Komentar berhasil dikirm!');

        return back();
    }
}
