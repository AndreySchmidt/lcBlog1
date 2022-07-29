@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
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
        
        <div class="card col-6">
            <div class="card-header border-transparent">
              <h3 class="card-title">{{ $user->name }}</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <tbody>
                  <tr>
                    <td>ID</td>
                    <td>{{ $user->id }}</td>
                  </tr>
                  <tr>
                    <td>Name</td>
                    <td>{{ $user->name }}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>{{ $user->email }}</td>
                  </tr>
                  <tr>
                    <td>Редактировать</td>
                    <td>
                      <a href="{{ route('admin.user.edit', $user->id) }}"><i class="fas fa-pencil-alt"></i></a>
                    </td>
                  </tr>
                  <tr>
                    <td>Удалить</td>
                    <td>
                      <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="border-0 bg-white"><i class="fas fa-trash text-danger" role="button"></i></button>
                      </form>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection