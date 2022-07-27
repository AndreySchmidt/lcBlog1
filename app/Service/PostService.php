<?php

namespace App\Service;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostService
{
    public function store($data)
    {
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
            Db::beginTransaction();
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
            Db::commit();
        }
        catch (\Exception $exception) {
            Db::rollback();
            abort(500);
        }
    }

    public function update($data, $post)
    {
        $tagIds = [];
        if( isset($data['tag_ids']) )
        {
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
        }

        try
        {
            Db::beginTransaction();
            if( isset($data['preview_image']) )
            {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if( isset($data['main_image']) )
            {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
    
            $post->update($data);
            $post->tags()->sync($tagIds);
            Db::commit();
        }
        catch (\Exception $exception) {
            Db::rollback();
            abort(500);
        }

        return $post;
    }

}
