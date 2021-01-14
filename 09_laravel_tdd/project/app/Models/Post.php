<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['thumbnail', 'title', 'slug', 'sub_title', 'details', 'post_type', 'is_published'];

    public function page() {
        return $this->belongsTo(Page::class);
    }

    public function category() {
        return $this->belongsToMany(Category::class, 'category_posts');
    }

    use HasFactory;
}
