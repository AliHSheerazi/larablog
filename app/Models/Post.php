<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $fillable = [
        'name',
        'category_id',
        'created_by',
        'slug',
        'description',
        'yt_iframe',
        'meta_description',
        'meta_title',
        'meta_keyword',
        'status',
    ]
}
