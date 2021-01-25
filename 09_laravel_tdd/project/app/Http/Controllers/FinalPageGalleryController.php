<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Gallery;
use App\Models\Website;

class FinalPageGalleryController extends Controller
{
    public function show(String $url, Page $page, Gallery $gallery)
    {
        $website = Website::where('url', $url)->first();
        if (($website == null) || ($page->website_id != $website->id))
            return abort(404);
        if($gallery->page_id != $page->id)
            return abort(404);

        $images = $gallery->images()->get();

        //redirect?
        return view('final.pages.galleries.show', ['url' => $url], compact('page', 'gallery', 'images'));
    }
}
