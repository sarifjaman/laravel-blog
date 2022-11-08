@extends('layouts.admin')
 @section('content')

   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Category</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('category.create') }}">Create Category</a></li>
            <li class="breadcrumb-item">Category List</li>
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
                  <h3 class="card-title">Create Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                  <div class="card-body">
{{-- 
                    @if(session()->has('success'))
                       <div class="alert alert-success">
                         {{ session()->get('success') }}
                       </div>
                    @endif --}}

                    <div class="form-group">
                      <label for="CategoryName">Category Name</label>
                      <input type="text" class="form-control" name="name" id="exampleInputEmail1" placeholder="Enter Category Name">
                      
                      @error('name')
                      <span class="text-danger">
                        {{ $message }}
                      </span>
                     @enderror
               
                    </div>


                    <div class="form-group">
                      <label for="exampleInputPassword1">Description</label>
                     <textarea name="description" id="description" rows="4" class="form-control" placeholder="Enter Description"></textarea>
                     {{-- <span class="text-danger">
                     @error('description')
                   {{ $message }}
                 @enderror
                </span> --}}
                    </div>
                   
                 
                 
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create Category</button>
                  </div>
                </form>
              </div>
      </div>
    </div>
  </div>
 @endsection