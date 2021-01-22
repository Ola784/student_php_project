<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use Parsedown;

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
        $page->content=$request->cnt;
        $page->content_markdown=new HtmlString(app(Parsedown::class)->text($request->cnt2));
        $page->save();


        return redirect()->route('pages.show', [$url, $page]);
    }

    public function edit(String $url,Page $page)
    {
        return view('pages.edit',['url' => $url])->withPage($page);
    }

    public function update(String $url,Request $request, Page $page)
    {
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
