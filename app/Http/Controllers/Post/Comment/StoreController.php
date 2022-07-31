<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Http\Requests\Post\Comment\StoreRequest;

class StoreController extends Controller
{
    // у меня вложена переменная в роут, поэтому приходит пост
    public function __invoke(StoreRequest $request, Post $post)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        $data['post_id'] = $post->id;

        Comment::create($data);

        return redirect()->route('post.show', $post->id);
    }
    
}
