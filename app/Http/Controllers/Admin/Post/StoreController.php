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

        $data['preview_image'] = Storage::put('/images', $data['preview_image']);
        $data['main_image'] = Storage::put('/images', $data['main_image']);

        Post::firstOrCreate($data);

        return redirect()->route('admin.post.index');
    }
}
