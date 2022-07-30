<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

class ShowController extends Controller
{
    public function __invoke(Post $post)
    {

        // блок похожие посты выводить не буду, но для примера работы с БД или выведу ))
        $relatedPosts = Post::where('category_id', $post->category_id)
            ->where('id', '!=',  $post->id)
            ->get()->take(3);

        // Carbon::setLocale('ru_RU');// чтобы не писать это в каждом контроллере, я перенесу это в boot() в AppServiceProvider
        $date = Carbon::parse($post->created_at);

        return view('post.show', compact('post', 'relatedPosts', 'date'));
    }
    
}
