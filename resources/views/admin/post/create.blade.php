@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавление поста</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
        
        <form class="col-6" action="{{ route('admin.post.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="card-body">

            <div class="form-group">

              <label for="title">Название поста</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter post name" value = "{{ old('title') }}">
              @error('title')
              <div class="text-danger">Это поле является обязательным</div>
              <div class="text-danger">{{ $message }}</div>
              @enderror

            </div>

            <div class="form-group m-3">
              <textarea class="form-control" id="summernote" name="content">{{ old('content') }}</textarea>
              @error('content')
              <div class="text-danger">Это поле является обязательным</div>
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label for="preview_image">Превью</label>
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
            
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Добавить</button>
          </div>
        </form>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection