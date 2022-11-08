@extends('layouts.admin')
 @section('content')

   <!-- Content Header (Page header) -->
   <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Show Message</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
            <li class="breadcrumb-item">Show Message</li>
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
                  <h3 class="card-title">Show Message</h3>
                </div>

                <div class="card-body">

                    <table class="table table-bordered">
                        <tbody>
                            
                           <tr>
                                <th width="30%">Name</th>
                              <td>{{ $contact->name }}</td>
                           </tr>

                           <tr>
                             <th>Email</th>
                             <td>{{ $contact->email }}</td>
                           </tr>

                           <tr>
                            <th>Subject</th>
                            <td>{{ $contact->subject }}</td>
                           </tr>

                         

                           <tr>
                            <th>Message</th>
                           <td>{{ $contact->message }}</td>
                        </tr>
                    </tbody>
                    </table>

                </div>
            </div>
        </div>
      </div>
    </div>
 </div>

 @endsection