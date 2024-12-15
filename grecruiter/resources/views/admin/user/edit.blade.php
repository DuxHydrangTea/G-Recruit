@extends('admin.page')
@section('title','Rank Manager')
@section('main-content')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Layout</h3>
                <p class="text-subtitle text-muted">There's a lot of form layout that you can use</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Layout</li>
                    </ol>
                </nav>
            </div>
        </div>

    </div>
    <!-- Basic Horizontal form layout section start -->
    <section id="basic-horizontal-layouts">
    <div class="row match-height justify-content-center">
        <div class="col-md-6 col-12 ">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">User Form</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                <form action="{{ route('user.update', $user->id) }}" class="form form-horizontal" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                <div class="form-body">
                    <div class="row">
                    <div class="col-md-4">
                        <label>Nick name</label>
                      
                    </div>
                    <div class="col-md-8 form-group">
                        <input value="{{$user->nickname}}" type="text" id="first-name" class="form-control" name="nickname" >
                        @error('nickname')
                        <div class="alert alert-danger"><span> {{$message}} </span></div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label>Full name</label>
                      
                    </div>
                    <div class="col-md-8 form-group">
                        <input value="{{$user->name}}"  type="text" id="first-name" class="form-control" name="name" >
                        @error('name')
                        <div class="alert alert-danger"><span> {{$message}} </span></div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>Birthday</label>
                      
                    </div>
                    <div class="col-md-8 form-group">
                        <input value="{{$user->birthday}}"  type="date" id="first-name" class="form-control" name="birthday" >
                       
                    </div>
                    <div class="col-md-4">
                        <label>Email</label>
                      
                    </div>
                    <div class="col-md-8 form-group">
                        <input value="{{$user->email}}"  type="text" id="first-name" class="form-control" name="email" >
                        @error('email')
                        <div class="alert alert-danger"><span> {{$message}} </span></div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>Password</label>
                      
                    </div>
                    <div class="col-md-8 form-group">
                        <input value="{{$user->password}}"  type="text" id="first-name" class="form-control" name="password" >
                        @error('password')
                        <div class="alert alert-danger"><span> {{$message}} </span></div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>Phone</label>
                      
                    </div>
                    <div class="col-md-8 form-group">
                        <input value="{{$user->phone}}"  type="text" id="first-name" class="form-control" name="phone" >
                        @error('phone')
                        <div class="alert alert-danger"><span> {{$message}} </span></div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>Address</label>
                      
                    </div>
                    <div class="col-md-8 form-group">
                        <input value="{{$user->address}}"  type="text" id="first-name" class="form-control" name="address" >
                    </div>
                    <div class="col-md-4">
                        <label>Select Esport</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <select name="esport_id" id="" class="form-control">
                        <option value="0" {{$user->esport_id == 0 ? 'selected': ''}}>-- None --</option>
                        @foreach ($esports as $e)
                        <option value="{{$e->id}}" {{$user->esport_id == $e->id ? 'selected': ''}}>{{$e->esport_name}}</option>
                        @endforeach
                      
                      </select>
                    </div>
                    <div class="col-md-4">
                        <label>Select Rank</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <select name="rank_id" id="" class="form-control">
                        <option value="0" {{$user->rank_id == 0 ? 'selected': ''}}>-- None --</option>
                        @foreach ($ranks as $r)
                        <option value="{{$r->id}}" {{$user->rank_id == $r->id ? 'selected': ''}}>{{$r->rank_name}}</option>
                        @endforeach
                      
                      </select>
                    </div>
                    <div class="col-md-4">
                        <label>Select Position</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <select name="position_id" id="" class="form-control">
                        @foreach ($positions as $p)
                        <option value="{{$p->id}}" {{$user->position_id == $p->id ? 'selected': ''}}>{{$p->position_name}}</option>
                        @endforeach
                      
                      </select>
                    </div>
                    <div class="col-md-4">
                        <label>Avatar</label>
                    </div>
                    <div class="col-md-4 form-group">
                        <img src="{{ '/storage'.$user->avatar }}" alt="" width="150px" >
                    </div> 
                    <div class="col-md-4 form-group">
                        <input type="file" id="contact-info" class="form-control" name="avatar" >
                    </div>
                    
                    <div class="col-md-4">
                        <label>Advantage 1</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <input value="{{$user->advantage_1}}" type="text" id="first-name" class="form-control" name="advantage_1" >
                    </div>

                    <div class="col-md-4">
                        <label>Advantage 2</label>
                    </div>
                      
                    <div class="col-md-8 form-group">
                        <input value="{{$user->advantage_2}}" type="text" id="first-name" class="form-control" name="advantage_2" >
                    </div>

                    <div class="col-md-4">
                        <label>Advantage 3</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <input value="{{$user->advantage_3}}" type="text" id="first-name" class="form-control" name="advantage_3" >
                    </div>

                    <div class="col-sm-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                        <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                    </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
       
    </div>
    </section>

</div>    
@endsection