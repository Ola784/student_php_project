<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Page;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\Post\StoreArticleRequest;



class PostController extends Controller
{

    public function index(String $url, Page $page)
    {
        $posts = $page->post()->get();
        return view('pages.posts.index', ['url' => $url], compact('page', 'posts'));
    }

    public function create(String $url, Page $page)
    {
        $categories = Category::orderBy('name')->get();
        return view('pages.posts.create', ['url' => $url], compact('categories'));

    }

    public function store(String $url, Page $page, Request $request)
    {
        $post = $page->post()->create($this->validate($request, [
            'title' => 'required'
        ]));

        if (isset($request->categories)) {
            $post->categories()->attach($request->categories);
        }

        if ($request->tags != '') {
            $tags = explode(',', $request->tags);
            foreach ($tags as $tag_name) {
                $tag = Tag::firstOrCreate(['name' => $tag_name]);
                $post->tags()->attach($tag);
            }
        }

        return redirect()->route('pages.posts.show', [$url, $page, $post]);
    }

    public function show(String $url, Page $page, Post $post)
    {
        if($post->page_id != $page->id) {
            abort(404);
        }

        $post->load(['categories', 'tags']);
        $all_categories = Category::all();
        $all_tags = Tag::all();

        return view('pages.posts.show', ['url' => $url], compact('page','post', 'all_categories', 'all_tags'));
    }

    public function update(String $url, Request $request, Page $page, Post $post)
    {
        $post->update($this->validate($request, [
            'title' => 'required'
        ]));
        return redirect()->route('pages.posts.show', [$url, $page, $post]);
    }

    public function destroy(String $url, Page $page, Post $post)
    {
        if($post->page_id!=$page->id) {
            abort(404);
        }
        $post->delete();
        return redirect()->route('pages.post.index', [$url, $page]);
    }
}
