@extends('layouts.admin')
 @section('content')

 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Create User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('user.index') }}">User List</a></li>
            <li class="breadcrumb-item active">Create User</li>
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
                            <h3 class="card-title">Create User</h3>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">

                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                              <div class="form-group">
                                <label for="username">User Name</label>
                                <input type="name" class="form-control" name="name" placeholder="Enter user name">

                                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                              </div>

                              <div class="form-group">
                                <label for="email1">Email address</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email">

                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                              </div>

                              <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password"  placeholder="Password">

                                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                              </div>
{{--                               
                              <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="summernote" rows="5" name="description"></textarea>
                              </div> --}}
                              
                            </div>
                            <!-- /.card-body -->
            
                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Add User</button>
                            </div>
                          </form>

                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>
 @endsection
 

 @section('style')
 <link type="text/css" rel="stylesheet" href="{{ asset('/admin/css/summernote.min.css') }}">
 @endsection

 @section('script')
<script type="text/javascript" src="{{ asset('admin/js/summernote.min.js') }}"></script>

<script>
  $('#summernote').summernote({
    placeholder: 'Hello Bootstrap 4',
    tabsize: 2,
    height: 300
  });
</script>
 @endsection