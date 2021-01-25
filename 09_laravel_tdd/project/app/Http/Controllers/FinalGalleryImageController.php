<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Gallery;
use App\Models\Image;
use App\Models\Website;

class FinalGalleryImageController extends Controller
{
    public function show(String $url, Page $page, Gallery $gallery, Image $image)
    {
        $website = Website::where('url', $url)->first();
        if (($website == null) || ($page->website_id != $website->id))
            return abort(404);
        if($gallery->page_id != $page->id)
            return abort(404);
        if($image->gallery_id != $gallery->id)
            return abort(404);

        return view('final.pages.galleries.images.show', ['url' => $url], compact('page', 'gallery', 'image'));
    }
}
