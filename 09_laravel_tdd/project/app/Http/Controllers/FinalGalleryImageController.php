<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Gallery;
use App\Models\Image;

class FinalGalleryImageController extends Controller
{
    public function show(String $url, Page $page, Gallery $gallery, Image $image)
    {
        if($gallery->page_id != $page->id)
        {
            abort(404);
        }

        return view('final.pages.galleries.images.show', ['url' => $url], compact('page', 'gallery', 'image'));
    }
}
