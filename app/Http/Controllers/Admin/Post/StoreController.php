<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        // dd($data);
        // $previewImage = $data['preview_image'];
        // $mainImage = $data['main_image'];
        // $previewImagePath = Storage::put('/images', $previewImage);
        // $mainImagePath = Storage::put('/images', $mainImage);

        $tagIds = [];
        if( isset($data['tag_ids']) )
        {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
        }


        // пихаем в транзакции ибо несколько таблиц и они со связанными записями
        //TODO стоит ее добавить, ибо трай не особо  решает 
        try
        {
            if( isset($data['preview_image']) )
            {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if( isset($data['main_image']) )
            {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }

    
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
        }
        catch (\Exception $exception) {
            abort(404);
        }

        return redirect()->route('admin.post.index');
    }
}
