<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Menu;

class PageMenuController extends Controller
{
    public function index(String $url, Page $page)
    {
        $menus=$page->menu()->get();
        return view('pages.menus.index', ['url' => $url], compact('page', 'menus'));
    }

    public function create(String $url, Page $page)
    {

        return view('pages.menus.create', ['url' => $url], compact('page'));
    }

    public function store(String $url, Page $page,Request $request )
    {
        $menus=$page->menu()->create($this->validate($request, [
            'title' => 'required',
            'link'=> 'required'
        ]));
        return redirect()->route('pages.menus.show', [$url, $page, $menus]);
    }

    public function show(String $url, Page $page, Menu $menu)
    {
        if($menu->page_id!=$page->id)
        {
            abort(404);
        }
        return view('pages.menus.show', ['url' => $url], compact('page','menu'));
    }

    public function edit(String $url, Page $page, Menu $menu)
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
            'title' => 'required',
            'link'=> 'required'
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
    }
}
