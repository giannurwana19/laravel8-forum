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
}
