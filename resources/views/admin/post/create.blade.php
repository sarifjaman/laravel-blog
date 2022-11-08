@extends('layouts.admin')
 @section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Create Post</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('post.create') }}">Create Post</a></li>
                <li class="breadcrumb-item">Post List</li>
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
                      <h3 class="card-title">Create Post</h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                              {{-- <div class="form-group">
                                <label for="PostTitle">Post Title</label>
                                <input type="text" name="title" class="form-control" placeholder="Enter title" />
                              </div> --}}

                              <div class="form-group">
                                <label for="TitleName">Title Name</label>
                                <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Enter Title Name">
                                <span class="text-danger">
                                @error('title')
                                  {{ $message }}
                               @enderror
                          </span>
                              </div>

                              <div class="form-group">
                                <label for="category">Category</label>
                                <select name="category" class="form-control"  {{ old('category') }}>
                                    <option style="display: none" selected>--Select Category--</option>

                                    @foreach($categories as $c)
                                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                </select>

                                @error('category')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>

                          <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input type="file" name="image" class="form-control" alt="" />

                              @error('image')
                               <span class="text-danger">{{ $message }}</span>
                              @enderror
                          </div>

                          <div class="form-group">
                            <label for="ceckbox">Tag Activate</label>
                          
                           <div class="check d-flex">
                            @foreach($tags as $tag)
                            <div class="custom-control custom-switch d-flex">
                              <input type="checkbox" name="tags[]" class="custom-control-input" id="tag{{ $tag->id }}" value="{{ $tag->id }}">
                              <label class="custom-control-label mr-3" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
                            </div>
                            @endforeach
                           </div>
                          </div>

                          <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="summernote" rows="5" name="description" value="{{ old('description') }}"></textarea>

                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                          </div>
                              
            
                            <div class="card-footer">
                              <button type="submit" class="btn btn-primary">Create Post</button>
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