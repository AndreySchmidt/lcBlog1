@extends('admin.layouts.main')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Редактирование пользователя</h1>
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
        
        <form class="col-4" action="{{ route('admin.user.update', $user->id) }}" method="POST">
          @csrf
          @method('PATCH')

          <input type="hidden" name="user_id" value="{{ $user->id }}" />

          <div class="form-group">
              <label>Роль пользователя</label>
              <select name = "role" class="form-control">
                @foreach($roles as $key => $role)
                <option
                {{ $key == $user->role? 'selected' : '' }}
                value = "{{ $key }}">{{ $role }}</option>
                @endforeach
              </select>
            </div>

          <div class="card-body">
            <div class="form-group">
              <label for="name">Название категории</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter user name" value="{{ $user->name }}">
              @error('name')
              <div class="text-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="card-body">
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" name="email" placeholder="Enter user email" value="{{ $user->email }}">
              @error('email')
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