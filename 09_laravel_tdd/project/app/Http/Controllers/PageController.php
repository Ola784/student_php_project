<?php

namespace App\Http\Controllers;

use App\Models\Website;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use Parsedown;

class PageController extends Controller
{
    public function index(String $url)
    {
        $user = auth()->user();
        if ($user == null || $url != $user->url)
            abort(404);
            
        $website = $user->website()->get()->first();
        
        //$websites = Website::all()->get();
        //$website = $websites[0];
        $pages = $website->pages()->get();

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

    public function store(Website $website, String $url, Request $request)
    {
        $user = auth()->user();
        if ($user == null || $url != $user->url)
            abort(404);
            
        $website = $user->website()->get()->first();
        if ($website == null)
            abort(404);

        $this->validate($request, [
            'title' => 'required'
        ]);

        $page = $website->pages()->create([
            'title' => $request->title,
            'content'=> $request->cnt,
            'content_markdown' => new HtmlString(app(Parsedown::class)->text($request->cnt2)),
            //'website_id' => $website->id,
        ]);

        return redirect()->route('pages.show', [$url, $page]);
    }

    public function edit(String $url,Page $page)
    {
        return view('pages.edit',['url' => $url])->withPage($page);
    }

    public function update(String $url,Request $request, Page $page)
    {
        $user = auth()->user();
        if ($user == null || $url != $user->url)
            abort(404);

        $this->validate($request, [
            'title' => 'required',
        ]);

        $page->title = $request->title;
        $page->content=$request->cnt;
        $page->content_markdown=new HtmlString(app(Parsedown::class)->text($request->cnt2));
        $page->save();

        return redirect()->route('pages.show', [$url,$page]);
    }

    public function destroy(String $url,Page $page)
    {
        $page->delete();
        return redirect()->route('pages.index',$url);
    }
}
