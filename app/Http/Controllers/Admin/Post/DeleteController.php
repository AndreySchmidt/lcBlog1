<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Admin\Post\BaseController;
use Illuminate\Http\Request;
use App\Models\Post;

class DeleteController extends BaseController
{
    public function __invoke(Post $post)
    {
        //Удаление файлов картинок забыл сделать
        $post->delete();
        return redirect()->route('admin.post.index');
    }
}
