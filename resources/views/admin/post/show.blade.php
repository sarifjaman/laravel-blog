@extends('layouts.admin')
 @section('content')

       <!-- Content Header (Page header) -->
       <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Show Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post List</a></li>
                <li class="breadcrumb-item">Show Post</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <style type="text/css">
      .image-upload{
        width: 50%;
        float: left;
      }

      .show-image{
        width: 50%;
        float: right;
      }

      .show-image img {
  position: relative;
  right: -60%;
  width: 40%;
}

.form-group.des {
  margin-top: 280px;
}
    </style>

         <!-- Main content -->
         <div class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Show Post</h3>
                        </div>
    
                        <div class="card-body">

                            <table class="table table-bordered">
                                <tbody>
                                   <tr>
                                        <th width="30%">Image</th>
                                        <td>
                                            <div style="width: 300px; height: 300px;">
                                                <img src="{{ asset($post->image) }}" class="img-fluid" style="border-radius: 10px;" alt="" />
                                            </div>
                                        </td>
                                   </tr>

                                   <tr>
                                     <th>Title</th>
                                     <td>{{ $post->title }}</td>
                                   </tr>

                                   <tr>
                                    <th>Category</th>
                                    <td>{{ $post->category->name }}</td>
                                   </tr>

                                   <tr>
                                    <th>Tags</th>
                                    <td>
                                        @foreach($post->tags as $tag)
                                          <span class="badge badge-primary">{{ $tag->name }}</span>
                                        @endforeach
                                    </td>
                                   </tr>

                                   <th>Author Name</th>
                                   <td>{{ $post->user->name }}</td>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
              </div>
            </div>
         </div>

 @endsection