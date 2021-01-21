<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Gallery;

class PageGalleryController extends Controller
{
    public function index(String $url, Page $page)
    {
        $galleries = $page->gallery()->get();
        return view('pages.galleries.index', ['url' => $url], compact('page', 'galleries'));
    }

    public function create(String $url, Page $page)
    {
        return view('pages.galleries.create', ['url' => $url], compact('page'));
    }

    public function store(String $url, Page $page, Request $request)
    {
        $gallery = $page->gallery()->create($this->validate($request, [
            'title' => 'required'
        ]));
        return redirect()->route('pages.galleries.show', [$url, $page, $gallery]);
    }

    public function show(String $url, Page $page, Gallery $gallery)
    {
        if($gallery->page_id != $page->id)
        {
            abort(404);
        }
        $images = $gallery->images()->get();

        //redirect?
        return view('pages.galleries.show', ['url' => $url], compact('page', 'gallery', 'images'));
    }

    public function edit(String $url, Page $page, Gallery $gallery)
    {
        if($gallery->page_id != $page->id)
        {
            abort(404);
        }
        return view('pages.galleries.edit', ['url' => $url],compact('page','gallery'));
    }

    public function update(String $url, Request $request, Page $page, Gallery $gallery)
    {
        $gallery->update($this->validate($request, [
            'title' => 'required'
        ]));
        return redirect()->route('pages.galleries.show', [$url, $page, $gallery]);
    }

    public function destroy(String $url, Page $page, Gallery $gallery)
    {
        if($gallery->page_id != $page->id)
        {
            abort(404);
        }
        $gallery->delete();
        return redirect()->route('pages.galleries.index', [$url, $page]);
    }

    public function add_image(String $url, Page $page, Gallery $gallery)
    {
        if($gallery->page_id != $page->id)
        {
            abort(404);
        }
        return view('pages.galleries.images.create', ['url' => $url], compact('page'));
    }
}
