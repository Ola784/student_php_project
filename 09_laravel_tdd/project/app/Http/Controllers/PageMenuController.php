<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Menu;

class PageMenuController extends Controller
{
    public function index(Page $page)
    {
        $menus=$page->menu()->get();
        return view('pages.menus.index', compact('page', 'menus'));
    }

    public function create(Page $page)
    {

        return view('pages.menus.create', compact('page'));
    }

    public function store(Page $page,Request $request )
    {
        $menus=$page->menu()->create($this->validate($request, [
            'title' => 'required'
        ]));
        return redirect()->route('pages.menus.show',[$page,$menus]);
    }

    public function show(Page $page, Menu $menu)
    {
        if($menu->page_id!=$page->id)
        {
            abort(404);
        }
        return view('pages.menus.show',compact('page','menu'));
    }

    public function edit(Page $page, Menu $menu)
    {
        if($menu->page_id!=$page->id)
        {
            abort(404);
        }
        return view('pages.menus.edit',compact('page','menu'));
    }

    public function update(Request $request, Page $page, Menu $menu)
    {
        $menu->update($this->validate($request, [
            'title' => 'required'
        ]));
        return redirect()->route('pages.menus.show',[$page,$menu]);
    }

    public function destroy(Page $page, Menu $menu)
    {
        if($menu->page_id!=$page->id)
        {
            abort(404);
        }
        $menu->delete();
        return redirect()->route('pages.menus.index', $page);
    }
}
