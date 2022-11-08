@extends('layouts.admin')
 @section('content')

  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Post</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
            <li class="breadcrumb-item active">Post List</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-item-center">
                        <h3 class="card-title">Post List</h3>

                        <div>
                            <a class="btn btn-primary" href="{{ route('post.create') }}">Create Post</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Tags</th>
                            <th>Author</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if($posts->count()>0)
                           @foreach($posts as $post)

                           <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>
                                <div style="max-width:70px; max-height:70px;overflow:hidden;">
                                    <img src="{{ asset($post->image) }}" class="img-fluid" alt="" />
                                </div>
                            </td>

                            <td>{{ $post->category->name }}</td>

                            <td>
                              @foreach($post->tags as $tag)
                               <span class="badge badge-primary"> {{ $tag->name }} </span>
                              @endforeach
                            </td>

                            <td>{{ $post->user->name }}</td>
                           
                            <td class="d-flex">
                              <a href="{{ route('post.show',[$post->id]) }}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('post.edit',[$post->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>

                                <form action="{{ route('post.destroy',[$post->id]) }}" method="POST" class="mr-1">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                          </tr>

                           @endforeach
                           @else
                           <td colspan="6"><p class="text-danger text-center">Data not found!</p></td>
                          @endif
                        </tbody>
                      </table>
                </div>

                <div class="card-footer">
                  {{ $posts->links('pagination::bootstrap-5') }}
                </div>
                
            </div>
        </div>
      </div>
    </div>
  </div>
 @endsection