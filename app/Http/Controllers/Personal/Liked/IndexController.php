<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];

        $data['usersCount'] = User::all()->count();
        $data['categoriesCount'] = Category::all()->count();
        $data['tagsCount'] = Tag::all()->count();
        $data['postsCount'] = Post::all()->count();

        return view('personal.liked.index', compact('data'));
    }
    
}
