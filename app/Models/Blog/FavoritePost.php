<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoritePost extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'user_id'
    ];
}
