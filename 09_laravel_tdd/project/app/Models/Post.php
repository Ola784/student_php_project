<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function page() {
        return $this->belongsTo(Page::class);
    }

    public function category() {
        return $this->belongsToMany(Category::class, 'category_posts');
    }

    use HasFactory;
}
