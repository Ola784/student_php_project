<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Page;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreArticleRequest;
use Illuminate\Support\HtmlString;
use Parsedown;
use Symfony\Component\Console\Input\Input;

class PagePostController extends Controller
{
    public function index(String $url, Page $page)
    {
        //$posts = Post::orderBy('id', 'desc')->paginate(10);
        //return view('posts.index')->withPosts($posts)
        $posts=$page->post()->orderBy('id', 'desc')->get();
        return view('pages.posts.index', ['url' => $url], compact('page', 'posts'));
    }

    public function create(String $url, Page $page)
    {
        return view('pages.posts.create', ['url' => $url], compact('page'));
    }

    public function store(String $url, Page $page, Request $request, StoreArticleRequest $req)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->body = new HtmlString(app(Parsedown::class)->text($request->body));
        $post->save();

        return redirect()->route('pages.posts.show', [$url, $page, $post]);
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

        return view('pages.posts.edit', ['url' => $url], compact('page', 'post'));
    }

    public function update(String $url, Request $request, Page $page, Post $post)
    {
        $post->update($this->validate($request, [
            'title' => 'required',
            'body' => 'required'
        ]));

        $post->title = $request->title;
        $post->body = new HtmlString(app(Parsedown::class)->text($request->body));
        $post->save();

        return redirect()->route('pages.posts.show', [$url, $page, $post]);;
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
