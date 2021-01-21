<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Gallery;

class FinalPageGalleryController extends Controller
{
    public function show(String $url, Page $page, Gallery $gallery)
    {
        if($gallery->page_id != $page->id)
        {
            abort(404);
        }
        $images = $gallery->images()->get();

        //redirect?
        return view('final.pages.galleries.show', ['url' => $url], compact('page', 'gallery', 'images'));
    }
}
