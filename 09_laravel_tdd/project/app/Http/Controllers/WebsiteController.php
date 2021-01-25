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
<<<<<<< HEAD
        $website = Website::where('url', $url)->first();
        if ($website == null)
            abort(404);

        $page = $website->pages()->get()->first();
=======
        //$website = Website::where('url', $url)->first();
        //if ($website == null)
          //  abort(404);

          //return view($website->url);
        $page = Page::all()->first();
>>>>>>> 0fbafa1ccd02890e588f3f5bd2ad44dd8e2e6faa
        return redirect()->route('website.show', [$url, $page]);
    }

    public function show(String $url, Page $page)
    {
<<<<<<< HEAD
        $website = Website::where('url', $url)->first();
        if (($website == null) || ($page->website_id != $website->id))
            return abort(404);

=======
       // $website = Website::where('url', $url)->first();
        //return view($website->url);
        //$user = auth()->user();
        //$website = $user->website();
        //return view($website->url);
>>>>>>> 0fbafa1ccd02890e588f3f5bd2ad44dd8e2e6faa
        $galleries = $page->gallery()->get();
        $menus     = $page->menu()->get();
        return view('website.show', ['url' => $url], compact('page', 'menus', 'galleries'));
    }
}
