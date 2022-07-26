<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Admin\Post\BaseController;
use Illuminate\Http\Request;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }
}
