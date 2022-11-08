@extends('layouts.admin')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tag</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
            <li class="breadcrumb-item active">Create Tag</li>
            <li class="breadcrumb-item active"><a href="{{ route('tag.index') }}">Tag List</a></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>

  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-item-center">
                            <h3 class="card-title">Tag List</h3>
                        </div>
                    </div>

                    <div class="card-body">

                        <form action="{{ route('tag.store') }}" method="POST">
                            @csrf

                            <div class="card-body">
                              <div class="form-group">
                                <label for="tagname">Tag Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Tag Name">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>

                              <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" rows=5></textarea>
                              </div>
                            
                            </div>
                            <!-- /.card-body -->
            
                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Add Tag</button>
                            </div>
                          </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>

@endsection