<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Page;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $images = Gallery::get();
        $pages=Page::all();
        $page=$pages[0];
        $menus=$page->menu()->get();
        return view('website.index',compact('page','menus','images'));
    }
}
