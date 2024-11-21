@extends('admin.auth-page') 
@section('title','Login Admin')
@section('auth-content')

<div id="auth">
        
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12 mx-auto">
                <div class="card pt-4">
                    <div class="card-body">
                        <div class="text-center mb-5">
                            <img src="{{asset('assets/admin')}}/assets/images/favicon.svg" height="48" class='mb-4'>
                            <h3>Login</h3>
                            <p>Please fill the form to login.</p>
                        </div>
                        <form action="{{ route('admin.auth.handle-login') }}" method="POST">

                            @csrf
                            <div class="row">
                                <div class="col-md-12 col-12">
                                  @session('add_message')
                                  <div class="alert alert-danger"><span> login failes </span></div>

                                  @endsession
                                   
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="first-name-column">Email</label>
                                        <input type="email" id="first-name-column" class="form-control"  name="email">
                                        @error('email')
                                        <div class="alert alert-danger"><span> {{$message}} </span></div>
                                        @enderror
                                    </div>
                                </div>
                               
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label for="email-id-column">Password</label>
                                        <input type="text" id="email-id-column" class="form-control" name="password">
                                        @error('password')
                                        <div class="alert alert-danger"><span> {{$message}} </span></div>
                                        
                                             @enderror
                                    </div>
                                </div>
                              
                             
                            </diV>
    
                                    <a href="{{ route('admin.auth.register') }}">Haven't an account? Register</a>
                            <div class="clearfix">
                                <button class="btn btn-primary float-right" type="submit">Submit</button>
                            </div>
                        </form>
                      
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        </div>
    
@endsection