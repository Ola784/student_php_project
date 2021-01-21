<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Gallery;

class FinalPageController extends Controller
{
    public function index(String $url)
    {
        $page = Page::all()->first();
        return redirect()->route('final.pages.show', [$url, $page]);
    }

    public function show(String $url, Page $page)
    {
        $galleries = $page->gallery()->get();
        return view('final.pages.show', ['url' => $url], compact('page', 'galleries'));
    }
}
