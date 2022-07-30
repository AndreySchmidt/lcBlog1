<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class DeleteController extends Controller
{
    public function __invoke(Post $post)
    {
        // удалить линковку из пивота ->likedPosts() тут круглые скобки для создания запроса в базу
        auth()->user()->likedPosts()->detach($post->id);

        return redirect()->route('personal.liked.index');
    }
    
}
