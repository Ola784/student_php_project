<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Post;
use App\Models\Website;

class FinalPostController extends Controller
{
    public function show(String $url, Page $page, Post $post)
    {
        $website = Website::where('url', $url)->first();
        if (($website == null) || ($page->website_id != $website->id))
            return abort(404);
        if($post->page_id != $page->id)
            return abort(404);


        return view('final.pages.posts.show', ['url' => $url], compact('page', 'post'));
    }
}
