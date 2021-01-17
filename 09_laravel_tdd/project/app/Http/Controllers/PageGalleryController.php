<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Gallery;

class PageGalleryController extends Controller
{
    public function index(String $url, Page $page)
    {
        $galleries = $page->galleries()->get();
        return view('pages.galleries.index', ['url' => $url], compact('page', 'galleries'));
    }

    public function create(String $url, Page $page)
    {
        return view('pages.galleries.create', ['url' => $url], compact('page'));
    }

    public function store(String $url, Page $page, Request $request)
    {
        $galleries = $page->galleries()->create($this->validate($request, [
            'title' => 'required'
        ]));
        return redirect()->route('pages.galleries.show', [$url, $page, $galleries]);
    }

    public function show(String $url, Page $page, Gallery $gallery)
    {
        if($gallery->page_id != $page->id)
        {
            abort(404);
        }
        return view('pages.galleries.show', ['url' => $url], compact('page','galleries'));
    }

    /* public function edit(String $url, Page $page, Menu $menu)
    {
        if($menu->page_id!=$page->id)
        {
            abort(404);
        }
        return view('pages.menus.edit', ['url' => $url],compact('page','menu'));
    }

    public function update(String $url, Request $request, Page $page, Menu $menu)
    {
        $menu->update($this->validate($request, [
            'title' => 'required'
        ]));
        return redirect()->route('pages.menus.show', [$url, $page,$menu]);
    }

    public function destroy(String $url, Page $page, Menu $menu)
    {
        if($menu->page_id!=$page->id)
        {
            abort(404);
        }
        $menu->delete();
        return redirect()->route('pages.menus.index', [$url, $page]);
    } */
}
