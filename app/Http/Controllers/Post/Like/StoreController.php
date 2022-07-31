<?php

namespace App\Http\Controllers\Post\Like;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;

class StoreController extends Controller
{
    public function __invoke(Post $post)
    {
        // toggle(); если повторный запрос приходит, то он отвяжет лайк от поста
        auth()->user()->likedPosts()->toggle($post->id);

        return redirect()->route('post.index', $post->id);
    }
    
}
