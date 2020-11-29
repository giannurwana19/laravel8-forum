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

        session()->flash('success', 'Komentar berhasil dikirim!');

        return back();
    }

    public function reply(Request $request, Comment $comment)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $comment->comments()->create([
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        session()->flash('success', 'Komentar berhasil dibalas!');

        return back();
    }
}
