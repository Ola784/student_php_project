<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
         return view('menus.index')->withMenus($menus);
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $menu = new Menu();
        $menu->title = $request->title;
        $menu->save();

        return redirect()->route('menus.show', $menu);
    }

    public function show(Menu $menu)
    {
        return view('menus.show')->withMenu($menu);
    }

    public function edit(Menu $menu)
    {
        return view('menus.edit')->withMenu($menu);
    }

    public function update(Request $request, Menu $menu)
    {

        $this->validate($request, [
            'title' => 'required'
        ]);

        $menu->title = $request->title;
        $menu->save();

        return redirect()->route('menus.show', $menu);
    }


    public function destroy(Menu $menu)
    {
        $menu->delete();

        return redirect()->route('menus.index');
    }
}
