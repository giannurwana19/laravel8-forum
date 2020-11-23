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
}
