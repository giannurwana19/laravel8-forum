<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getImageForumAttribute()
    {
        return asset('storage') . '/' . $this->image;
    }

    // N Forum memiliki N tag
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // N Forum dimiliki 1 user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // 1 forum memiliki N comment (poly)
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
