<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // N comment dimiliki oleh beberapa model (poly)
    public function commentable()
    {
        return $this->morphTo();
    }

    // N comment dimiliki 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 1 comment memiliki N comment (poly)
    public function comments() // .. 1
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}










// h: DOKUMENTASI

// p: clue 1
// fitur balas komentar
// kita bisa berkomentar di dalam komentar itu sendiri
