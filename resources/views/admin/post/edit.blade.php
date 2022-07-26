@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование поста</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
        
        <form class="col-6" action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="card-body">
              <div class="form-group">

                <label for="title">Название поста</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter post name" value = "{{ $post->title }}">
                @error('title')
                <div class="text-danger">Это поле является обязательным</div>
                <div class="text-danger">{{ $message }}</div>
                @enderror

              </div>

              <div class="form-group m-3">
                <textarea class="form-control" id="summernote" name="content">{{ $post->content }}</textarea>
                @error('content')
                <div class="text-danger">Это поле является обязательным</div>
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>

              <div class="form-group">
                <label for="preview_image">Превью</label>
                <div class="w-25">
                  <img src = "{{ url('storage/' . $post->preview_image) }}"  alt = "preview image" class = "w-50" />
                </div>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="preview_image" name = "preview_image" />
                    <label class="custom-file-label" for="preview_image">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="main_image">Изображение</label>
                <div class="w-25">
                  <img src = "{{ asset('storage/' . $post->main_image) }}"  alt = "main image" class = "w-50" />
                </div>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="main_image" name = "main_image" />
                    <label class="custom-file-label" for="main_image">Choose file</label>
                  </div>
                  <div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label>Выберите категорию</label>
                <select name = "category_id" class="form-control">
                  @foreach($categories as $category)
                  <option
                  {{ ($category->id == $post->category_id)? 'selected' : '' }}
                  value = "{{ $category->id }}">{{ $category->title }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Тэги</label>
                <select multiple="" name = "tag_ids[]" class="form-control">
                  @foreach($tags as $tag)
                    <option
                    {{ is_array( $post->tags->pluck('id')->toArray() ) && in_array( $tag->id, $post->tags->pluck('id')->toArray() )? 'selected' : '' }}
                    value = "{{ $tag->id }}">{{ $tag->title }}</option>
                  @endforeach
                </select>
              </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
            <button type="submit" class="btn btn-primary">Обновить</button>
            </div>
        </form>

      </div>
    </section>

  </div>
@endsection