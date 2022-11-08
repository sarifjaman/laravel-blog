@extends('layouts.admin')
 @section('content')


   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
            <li class="breadcrumb-item active">User</li>
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
                        <h3 class="card-title">User List</h3>

                        <div>
                            <a class="btn btn-primary" href="{{ route('user.create') }}">Create User</a>
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
                        <th>Image</th>
                        <th>Email</th>
                        <th>Description</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                    </thead>

                    <tbody>
                    @if($users->count()>0)
                     @foreach($users as $user)

                     <tr>
                        <td>{{ $user->id }}</td>

                        <td>
                            {{ $user->name }}
                        </td>
                      
                        <td>{{ $user->image }}</td>

                        <td>{{ $user->email }}</td>

                        <td>{{ $user->description }}</td>

                        <td class="d-flex">
                          <a href="{{ route('user.edit',[$user->id]) }}" class="btn btn-sm btn-primary mr-1"><i class="fas fa-edit"></i></a>

                          <form action="{{ route('user.destroy',[$user->id]) }}" method="POST" class="mr-1">
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
                  {{ $users->links('pagination::bootstrap-5') }}
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>
 @endsection
