<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{

    protected $fillable = ['title', 'body'];

    public function pages() {
        return $this->belongsTo(Page::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'category_posts');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }

    public function getCategoriesLinksAttribute()
    {
        $categories = $this->categories()->get()->map(function($category) {
            return '<a href="'.route('pages.posts.index').'?category_id='.$category->id.'">'.$category->name.'</a>';
        })->implode(' | ');

        if ($categories == '') return 'none';

        return $categories;
    }

    public function getTagsLinksAttribute()
    {
        $tags = $this->tags()->get()->map(function($tag) {
            return '<a href="'.route('pages.posts.index').'?tag_id='.$tag->id.'">'.$tag->name.'</a>';
        })->implode(' | ');

        if ($tags == '') return 'none';

        return $tags;
    }

    use HasFactory;
}
