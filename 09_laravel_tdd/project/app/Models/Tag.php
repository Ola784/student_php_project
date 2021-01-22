<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag
{
    protected $fillable = ['name'];

    public function page() {
        return $this->belongsTo(Page::class, 'category_posts');
    }

    public function posts() {
        return $this->belongsToMany(Post::class, 'category_posts');
    }
}
