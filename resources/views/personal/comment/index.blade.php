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
        <div class="row">
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Название</th>
                  <th colspan="2">Действие</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($comments as $comment)
                  <tr>
                    <td>{{ $comment->id }}</td>
                    <td>{{ $comment->message }}</td>
                    <td><a href="{{ route('personal.comment.edit', $comment->id) }}"><i class="fas fa-pencil-alt"></i></a></td>
                    <td>
                      <form action="{{ route('personal.comment.delete', $comment->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="border-0"><i class="fas fa-trash text-danger" role="button"></i></button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection