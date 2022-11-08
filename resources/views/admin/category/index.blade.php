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
            <li class="breadcrumb-item active">Category</li>
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
                        <h3 class="card-title">Category List</h3>

                        <div>
                            <a class="btn btn-primary" href="{{ route('category.create') }}">Create Category</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Post Count</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @if($categories->count()>0)
                     @foreach($categories as $category)

                     <tr>
                        <td>{{ $category['id'] }}</td>
                        <td>
                            {{ $category['name'] }}
                            {{-- {{ $category->name }} --}}
                        </td>
                        {{-- <td>
                          <div class="progress progress-xs">
                            <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                          </div>
                        </td> --}}
                        <td><span class="badge bg-danger">{{ $category['slug'] }}</span></td>
                        <td>{{ $category['description'] }}</td>

                        <td class="d-flex">
                          <a href="{{ route('category.edit',[$category->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>

                          <form action="{{ route('category.destroy',[$category->id]) }}" method="POST" class="mr-1">
                            @method('DELETE')
                            @csrf
                          <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                          </form>

                          {{-- <a href="{{ route('category.show',[$category->id]) }}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a> --}}
                        </td>
                      </tr>
                     @endforeach
                     @else
                     <td colspan="6"><p class="text-danger text-center">Data not found!</p></td>
                     @endif
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  {{ $categories->links('pagination::bootstrap-5') }}
                </div>

              </div>
        </div>
      </div>
    </div>
  </div>
 @endsection