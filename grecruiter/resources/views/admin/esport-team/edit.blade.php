@extends('admin.page')
@section('title','Esport Team Create')
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
            <h4 class="card-title">Team Form</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                <form action="{{route('esport-team.update', $data->id)}}" class="form form-horizontal" method="POST" enctype="multipart/form-data" >
                    @csrf
                    @method('PUT')
                <div class="form-body">
                    <div class="row">
                    <div class="col-md-12 mb-3 ">
                        <img src="{{ asset('storage/images'.'/'.$data->avatar) }}" alt="" class="avatar" height="100px" width="100px">
                    </div>
                    <div class="col-md-4">
                        <label>Team name</label>
                      
                    </div>
                    <div class="col-md-8 form-group">
                        <input type="text" id="first-name" class="form-control" value="{{$data->name}}" name="name" >
                        @error('name')
                        <div class="alert alert-danger"><span> {{$message}} </span></div>
                        
                             @enderror
                    </div>
                    <div class="col-md-4">
                        <label>Select Esport</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <select name="esport_id" id="" class="form-control">
                        @foreach ($esports as $e)
                        <option value="{{$e->id}}" {{$data->esport_id == $e->id ? "Selected":""}}>{{$e->esport_name}}</option>
                        @endforeach
                      
                      </select>
                    </div>
                    <div class="col-md-4">
                        <label>Avatar</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <input type="file" id="contact-info" class="form-control" name="avatar" >
                        @error('icon')
                        <div class="alert alert-danger"><span> {{$message}} </span></div>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>Description</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <input type="text" id="first-name" class="form-control" value="{{$data->description}}" name="description" >
                        @error('description')
                        <div class="alert alert-danger"><span> {{$message}} </span></div>
                             @enderror
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