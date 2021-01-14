<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index(String $url)
    {
        $pages = Page::all();
        return view('pages.index', ['url' => $url])->withPages($pages);
    }

    public function create(String $url)
    {
        return view('pages.create', ['url' => $url]);
    }

    public function show(String $url, Page $page)
    {
        return view('pages.show', ['url' => $url])->withPage($page);
    }

    public function store(String $url, Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $page = new Page();
        $page->title = $request->title;
        $page->save();

        return redirect()->route('pages.show', [$url, $page]);
    }

}
