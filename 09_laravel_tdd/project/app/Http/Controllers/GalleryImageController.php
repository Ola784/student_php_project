<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Gallery;
use App\Models\Image;

class GalleryImageController extends Controller
{
    public function index(String $url, Page $page, Gallery $gallery)
    {
        $images = $gallery->images()->get();
        return view('pages.galleries.images.index', ['url' => $url], compact('page', 'gallery', 'images'));
    }

    public function create(String $url, Page $page, Gallery $gallery)
    {
        return view('pages.galleries.images.create', ['url' => $url], compact('page', 'gallery'));
    }

    public function store(String $url, Page $page, Gallery $gallery, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $file = time().'.'.$request->file->getClientOriginalExtension();

        $input['title'] = $request->title;

        $input['file'] = $file;
        $request->file->move(public_path('images'), $input['file']);

        $image = $gallery->images()->create($input);
        //$input['gallery_id'] = $gallery->id;
        //Image::create($input);

        return redirect()->route('pages.galleries.images.show', [$url, $page, $gallery, $image]);
    }

    public function show(String $url, Page $page, Gallery $gallery, Image $image)
    {
        if($gallery->page_id != $page->id)
        {
            abort(404);
        }

        // tu powinien byc widok na jeden image
        //$images = $gallery->images()->get();

        error_log('Some message here.');
        return view('pages.galleries.images.show', ['url' => $url], compact('page','gallery', 'image'));
    }

    public function edit(String $url, Page $page, Gallery $gallery, Image $image)
    {
        if($gallery->page_id != $page->id)
        {
            abort(404);
        }
        return view('pages.galleries.images.edit', ['url' => $url],compact('page','gallery','image'));
    }

    public function update(String $url, Request $request, Page $page, Gallery $gallery, Image $image)
    {
        $gallery->update($this->validate($request, [
            'title' => 'required',
        ]));
        return redirect()->route('pages.galleries.images.show', [$url, $page, $gallery, $image]);
    }

    public function destroy(String $url, Page $page, Gallery $gallery, Image $image)
    {
        if($gallery->page_id != $page->id)
        {
            abort(404);
        }
        $image->delete();
        return redirect()->route('pages.galleries.images.index', [$url, $page, $gallery]);
    }
}
