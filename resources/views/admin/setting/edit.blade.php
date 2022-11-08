@extends('layouts.admin')
 @section('content')

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0">Edit Setting</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{ route('website') }}">Home</a></li>
                    <li class="breadcrumb-item">Edit Setting</li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>

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

                            <form action="{{ route('setting.update') }}" method="POST" enctype="multipart/form-data">
                               
                                @csrf
                                {{-- @method('PUT') --}}

                              
                                  <div class="form-group">
                                    <label for="titlename">Site Name</label>
                                    <input type="title" name="name" value="{{ $setting->name }}" class="form-control" placeholder="Enter title">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                  </div>

                                 <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="facebook">Facebook</label>
                                      <input type="facebook" name="facebook" value="{{ $setting->facebook }}" class="form-control" placeholder="Facebook" />
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="Twitter">Twitter</label>
                                      <input type="twitter" name="twitter" value="{{ $setting->twitter }}" class="form-control" placeholder="Twitter" />
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="instagram">Instagram</label>
                                      <input type="instagram" name="instagram" value="{{ $setting->instagram }}" class="form-control" placeholder="Instagram" />
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="reddit">Reddit</label>
                                      <input type="twitter" name="reddit" value="{{ $setting->reddit }}" class="form-control" placeholder="Reddit" />
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="email">Email</label>
                                      <input type="email" name="email" value="{{ $setting->email }}" class="form-control" placeholder="email" />
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="copyright">Copyright</label>
                                      <input type="copyright" name="copyright" value="{{ $setting->copyright }}" class="form-control" placeholder="Copyright" />
                                    </div>

                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="phone" name="phone" value="{{ $setting->phone }}" class="form-control" placeholder="Phone" />
                                      </div>
                                    </div>

                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" value="{{ $setting->address }}" class="form-control" placeholder="Address" />
                                      </div>
                                    </div>

                                  </div>
                                 </div>

                                  <div class="form-group img-sec">
                                    <div class="image-upload">
                                      <label for="image-upload">Logo Upload</label>
                                      <input type="file" name="site_logo" value="{{ $setting->site_logo }}" class="form-control" alt="" />
                                    </div>

                                    <div class="show-image" >
                                      <img src="{{ asset($setting->site_logo) }}" class="img-fluid" alt="" width="30%"/>
                                    </div>
                                </div>

                                  <br>

                                  <div class="form-group des" style="position: relative">
                                    <label for="description">About Site</label>
                                   <textarea name="about_site" rows="3" class="form-control">{{ $setting->about_site }}</textarea>
                                  </div>
                
                                <div class="card-footer">
                                  <button type="submit" class="btn btn-primary">Update Setting</button>
                                </div>
                              </form>

                        </div>
                    </div>
                </div>
              </div>
            </div>
         </div>
 @endsection