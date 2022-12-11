<?php

namespace App\Http\Controllers;

use App\Http\Controllers\post\BaseController;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;

class PostController extends BaseController
{
    public function index()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);
        $query = Post::query();
        if (isset($data['category_id'])) {
            $query->where('category_id', $data['category_id']);
        }

        if (isset($data['title'])) {
            $query->where('title', 'like', "%{$data['title']}%");
        }
        $posts = $query->get();
        dd( $posts );
//    $posts = Post::all();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.create', compact('categories', 'tags'));
    }

    public function store()
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $post = Post::create($data);
        $post->tags()->attach($tags);

        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        $post = Post::findOrFail($post->id);
        return view('post.show', compact('post'));
    }


    public function edit(Post $post)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('post.edit', compact('post', 'categories', 'tags'));
    }

    public function update(Post $post)
    {
        $data = request()->validate([
            'title' => 'string',
            'content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => ''
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }
}
