<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Models\Gallery;
use App\Models\Page;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index(String $url)
    {
        $website = Website::where('url', $url)->first();
        if ($website == null)
            abort(404);

        $page = $website->pages()->get()->first();
        return redirect()->route('website.show', [$url, $page]);
    }

    public function show(String $url, Page $page)
    {
        $website = Website::where('url', $url)->first();
        if (($website == null) || ($page->website_id != $website->id))
            return abort(404);

        $galleries = $page->gallery()->get();
        $menus     = $page->menu()->get();
        return view('website.show', ['url' => $url], compact('page', 'menus', 'galleries'));
    }
}
