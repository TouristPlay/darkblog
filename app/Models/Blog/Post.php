<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        'title',
        'content',
        'category_id',
        'user_id',
        'published',
        'favorite'
    ];

//    public function users()
//    {
//        return $this->belongsToMany(User::class);
//    }

}
