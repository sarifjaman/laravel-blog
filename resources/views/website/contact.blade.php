@extends('layouts.website')
    @section('content')
    
    <div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url('{{ asset('website') }}/images/img_4.jpg');">
        <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
            <div class="post-entry text-center">
                <h1 class="">About Us</h1>
                <p class="lead mb-4 text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem, adipisci?</p>
            </div>
            </div>
        </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                  @if(session()->has('success'))
                  <div class="text-success">
                    {{ session('success') }}
                  </div>
                  @endif
                   <div class="card">
                     <div class="card-body">
                  
                      <h4 class="text-center">Contact Us</h4>

                        <form action="{{ route('website.contact') }}" method="POST" class="p-3">
                          @csrf
                            <div class="form-group">
                              <label for="name">Name *</label>
                              <input type="text" name="name" class="form-control" id="name" placeholder="Please enter your name">
                              @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                              <label for="email">Email *</label>
                              <input type="email" name="email" class="form-control" id="email" placeholder="Please enter your email">
                              @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group">
                              <label for="website">Subject</label>
                              <input type="subject" name="subject" class="form-control" id="subject" placeholder="Please enter your subject">
                              @error('subject') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
          
                            <div class="form-group">
                              <label for="message">Message</label>
                              <textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Please enter your message"></textarea>
                            </div>
                            <div class="form-group">
                              <input type="submit" value="Post Comment" class="btn btn-primary">
                            </div>
          
                          </form>

                     </div>
                   </div>
                </div>

                <div class="col-md-5">
                    <div class="card">
                        <div class=" card-body">
                            <div class="details">
                                <span>Address:</span>
                                 <p></p>
                            </div>

                            <div class="details">
                                <span>Phone:</span>
                                 <p></p>
                            </div>

                            <div class="details">
                                <span>Email Address:</span>
                                 <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection