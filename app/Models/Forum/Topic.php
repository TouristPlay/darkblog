<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Topic extends Model
{

    protected $fillable = [
        'content',
        'title',
        'rubric_id',
        'user_id',
        'message_counter',
        'status'
    ];


    use HasFactory;
    use SoftDeletes;
}
