@extends('layouts.admin')
 @section('content')
       <!-- Content Header (Page header) -->
       <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Edit Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post List</a></li>
                <li class="breadcrumb-item">Edit Post</li>
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
                          <h3 class="card-title">Edit Post</h3>
                        </div>
    
                        <div class="card-body">

                            <form action="{{ route('post.update',$post->id) }}" method="POST" enctype="multipart/form-data">
                               
                                @csrf
                                @method('PUT')

                              
                                  <div class="form-group">
                                    <label for="titlename">Title Name</label>
                                    <input type="title" name="title" value="{{ $post->title }}" class="form-control" placeholder="Enter title">
                                  </div>

                                  <div class="form-group">
                                    <label for="category">Category</label>
                                    <select class="form-control" name="category">
                                        <option value="" selected style="display: none;">--Select Category--</option>

                                        @foreach($categories as $c)
                                        <option value="{{ $c->id }}" @if($post->category_id == $c->id) selected @endif>{{ $c->name }}</option>
                                        @endforeach
                                    </select>
                                  </div>

                                  <div class="form-group img-sec">
                                      <div class="image-upload">
                                        <label for="image-upload">Image Upload</label>
                                        <input type="file" name="image" value="{{ $post->image }}" class="form-control" alt="" />
                                      </div>

                                      <div class="show-image" >
                                        <img src="{{ asset($post->image) }}" class="img-fluid" alt="" width="30%"/>
                                      </div>
                                  </div>

                                  <br>

                                  <div class="form-group">
                                    <label for="ceckbox">Tag Activate</label>
                                  
                                   <div class="check d-flex">
                                    @foreach($tags as $tag)
                                    <div class="custom-control custom-switch d-flex">
                                      <input type="checkbox" name="tags[]" class="custom-control-input" id="tag{{ $tag->id }}" value="{{ $tag->id }}"
                                      @foreach($post->tags as $t) 
                                        @if($tag->id == $t->id) checked @endif
                                      @endforeach 
                                      >
                                      <label class="custom-control-label mr-3" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                                    </div>
                                    @endforeach
                                   </div>
                                  </div>

                                  <div class="form-group des" style="position: relative">
                                    <label for="description">Description</label>
                                   <textarea name="description" id="summernote" rows="5" class="form-control">{{ $post->description }}</textarea>
                                  </div>
                                 
                              
                                <!-- /.card-body -->
                
                                <div class="card-footer">
                                  <button type="submit" class="btn btn-primary">Update Post</button>
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