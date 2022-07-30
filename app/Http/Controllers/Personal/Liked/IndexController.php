<?php

namespace App\Http\Controllers\Personal\Liked;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        // для получения лайкнутых постов беру авторезованного пользователя,
        // вызываю ->likedPost (метод в модели User) ... у метода нет круглых скобок, обрати внимание. Это получение коллекции
        // если с круглыми скобками, то это будет запрос в БД (мне нужна коллекция из модели)
        $posts = auth()->user()->likedPosts;

        return view('personal.liked.index', compact('posts'));
    }
    
}
