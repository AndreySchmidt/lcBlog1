<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        // реализация перенесена в PostController
        // $posts = Post::paginate(4);// тут с пагинацией беру посты
        // $randomPosts = Post::get()->random(2);// беру рандомные посты
        
        // // посты с наибольшим количеством лайков likedUsers в модели постов метод
        // // liked_users_count автоматически добавится в вывод (передавать это не надо, он сам засунет в выдачу в attributes)
        // // смотрю какой элемент и добавляю его в ордер ->orderBy('liked_users_count', 'DESC')
        // //https://www.youtube.com/watch?v=ePo5UBt9JA0&list=PLd2_Os8Cj3t8StX6GztbdMIUXmgPuingB&index=37
        // $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(2);

        // return view('main.index', compact('posts', 'randomPosts', 'likedPosts'));

        return redirect()->route('post.index');
    }
    
}
