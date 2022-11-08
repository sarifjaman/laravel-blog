@extends('layouts.admin')
@section('content')
    <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User List</a></li>
            <li class="breadcrumb-item active">Edit User</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header --> 

   <!-- Main content -->
   <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-item-center">
                        <h3 class="card-title">Edit User</h3>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <form action="{{ route('user.update',[$user->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="name" class="form-control" name="name" value="{{ $user->name }}" placeholder="Enter name">

                                @error('name')
                                <span class="text-danger">
                                  {{ $message }}
                                </span>
                               @enderror
                              </div>

                          <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter email">

                            @error('email')
                            <span class="text-danger">
                              {{ $message }}
                            </span>
                           @enderror
                          </div>

                          <div class="form-group">
                            <label for="password">Password <small>(Enter your password if you are change password)</small></label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                          </div>

                        </div>
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Edit User</button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
      </div>
    </div
@endsection