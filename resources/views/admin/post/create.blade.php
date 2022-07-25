@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Добавление категории</h1>
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
        
        <form class="col-6" action="{{ route('admin.post.store') }}" method="POST">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="title">Название поста</label>
              <input type="text" class="form-control" id="title" name="title" placeholder="Enter post name">
              @error('title')
              <div class="text-danger">Это поле является обязательным</div>
              <div class="text-danger">{{ $message }}</div>
              @enderror
              <div class="form-group m-3"><textarea class="form-control" id="summernote" name="content"></textarea></div>
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