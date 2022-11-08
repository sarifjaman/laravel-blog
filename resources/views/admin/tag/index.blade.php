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
            <li class="breadcrumb-item active">Tag</li>
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
    
                            <div>
                                <a class="btn btn-primary" href="{{ route('tag.create') }}">Create Tag</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                              <tr>
                                <th style="width: 10px">#</th>
                                <th>Tag Name</th>
                                <th>Slug</th>
                                <th style="width: 40px">Description</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @if($tags->count()>0)

                                @foreach($tags as $tag)
                                <tr>
                                    <td>{{ $tag->id }}</td>
                                    <td>{{ $tag->name }}</td>
                                    <td>{{ $tag->slug }}</td>
                                    <td>{{ $tag->description }}</td>

                                    <td class="d-flex">
                                        <a class="btn btn-primary btn-sm mr-1" href="{{ route('tag.edit',$tag->id) }}"><i class="fas fa-edit"></i></a>

                                        <form action="{{ route('tag.destroy',[$tag->id]) }}" method="POST" class="mr-1">
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
                      {{ $tags->links('pagination::bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
  </div>

@endsection