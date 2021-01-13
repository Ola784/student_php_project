<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::all();
        return view('pages.index')->withPages($pages);
    }

    public function create()
    {
        return view('pages.create');
    }

    public function show(Page $page)
    {
        return view('pages.show')->withPage($page);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $page = new Page();
        $page->title = $request->title;
        $page->save();

        return redirect()->route('pages.show', $page);
    }

}
