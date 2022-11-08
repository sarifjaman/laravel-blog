 @extends('layouts.admin')
 @section('content')

   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Message</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
            <li class="breadcrumb-item">Message List</li>
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
                        <h3 class="card-title">Message List</h3>

                        <div>
                            <a class="btn btn-primary" href="">Create Message</a>
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
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Message</th>
                        <th style="width: 40px">Action</th>
                      </tr>
                    </thead>
                    <tbody>

              @if($contacts->count())
               @foreach ($contacts as $contact)
                   
                     <tr>
                        <td>{{ $contact->id }}</td>

                        <td>{{ $contact->name }}</td>
               
                        <td><span class="badge bg-success">{{ $contact->email }}</span></td>

                        <td>{{ $contact->subject }}</td>

                        <td>{{ $contact->message }}</td>

                        <td class="d-flex">
                          <a href="{{ route('contact.show',['id' => $contact->id]) }}" class="btn btn-sm btn-success mr-1"><i class="fas fa-eye"></i></a>

                          <form action="{{ route('contact.destroy',['id' => $contact->id]) }}" method="POST" class="mr-1">
                            @method('DELETE')
                            @csrf
                          <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                  @endif
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  {{ $contacts->links('pagination::bootstrap-5') }}
                </div>
                
              </div>
        </div>
      </div>
    </div>
  </div>

 @endsection