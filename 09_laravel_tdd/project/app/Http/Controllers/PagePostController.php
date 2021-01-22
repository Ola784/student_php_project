<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;

class PagePostController extends Controller
{
    public function index(String $url, Page $page)
    {
        $posts=$page->post()->get();
        return view('pages.posts.index', ['url' => $url], compact('page', 'posts'));
    }

    public function create(String $url, Page $page)
    {
        return view('pages.posts.create', ['url' => $url], compact('page'));
    }

    public function store(String $url, Page $page,Request $request )
    {
        $posts=$page->post()->create($this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]));
        return redirect()->route('pages.posts.show', [$url, $page, $posts]);
    }

    public function show(String $url, Page $page, Post $post)
    {
        if($post->page_id!=$page->id) {
            abort(404);
        }
        return view('pages.posts.show', ['url' => $url], compact('page','post'));
    }

    public function edit(String $url, Page $page, Post $post)
    {
        if($post->page_id!=$page->id) {
            abort(404);
        }
        return view('pages.posts.edit', ['url' => $url],compact('page','post'));
    }

    public function update(String $url, Request $request, Page $page, Post $post)
    {
        $post->update($this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]));
        return redirect()->route('pages.posts.show', [$url, $page, $post]);
    }

    public function destroy(String $url, Page $page, Post $post)
    {
        if($post->page_id!=$page->id) {
            abort(404);
        }
        $post->delete();
        return redirect()->route('pages.posts.index', [$url, $page]);
    }
}
