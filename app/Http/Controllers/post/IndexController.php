<?php

namespace App\Http\Controllers\Post;


use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Models\Post;

class IndexController extends BaseController {
    public function __invoke(FilterRequest $request)
    {

        $data = $request->validated();
$filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
//        $query = Post::query();

//        if(isset($data['category_id'])){
//            $query->where('category_id', $data['category_id']);
//        }
//
//        if(isset($data['title'])){
//            $query->where('title', 'like', "%{$data['title']}%");
//        }
//        if(isset($data['content'])){
//            $query->where('content', 'like', "%{$data['content']}%");
//        }
//        $posts = $query->get();
        $posts = Post::filter($filter)->paginate(10);

//        $posts = Post::paginate(10);
        return view('post.index', compact('posts'));
    }
}
