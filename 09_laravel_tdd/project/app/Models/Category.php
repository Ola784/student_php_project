<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['thumbnail', 'name', 'slug', 'is_published'];

    public function post() {
        return $this->belongsToMany(Post::class, 'category_posts');
    }
    use HasFactory;
}