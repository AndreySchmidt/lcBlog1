@extends('personal.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Коментарии к постам</h1>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <!-- Main row -->
        <form class="col-4" action="{{ route('personal.comment.update', $comment->id) }}" method="POST">
          @csrf
          @method('PATCH')
          <div class="card-body">
            <div class="form-group">
              <label for="message">Коментарий</label>
              <textarea class="form-control" id="message" name="message" cols="30" rows="10">{{ $comment->message }}</textarea>
              @error('message')
              <div class="text-danger">Это поле является обязательным</div>
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Обновить</button>
          </div>
        </form>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection