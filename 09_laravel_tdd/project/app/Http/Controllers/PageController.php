<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function index()
    {
        $pages = Page::all();
        return view('pages.index')->withPage($pages);
    }
}