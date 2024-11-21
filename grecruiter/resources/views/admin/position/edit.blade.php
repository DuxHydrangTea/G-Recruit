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
            <h4 class="card-title">Rank Form</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                <form action="{{route('position.update', $position->id)}}" class="form form-horizontal" method="POST"  >
                    @csrf
                    @method('PUT')
                <div class="form-body">
                    @session('add_message')
                    <div class="alert alert-success">
                        {{session('add_message')}}
                    </div>
                    @endsession
                    <div class="row">
                    <div class="col-md-4">
                        <label>Position name</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <input type="text" id="first-name" class="form-control" name="position_name" value="{{$position->position_name}}">
                        @error('position_name')
                        <div class="alert alert-danger"><span> {{$message}} </span></div>
                        
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label>Select Esport</label>
                    </div>
                    <div class="col-md-8 form-group">
                      <select name="esport_id" id="" class="form-control">
                        <option value="0">NONE</option>
                        @foreach ($esports as $e)
                        <option value="{{$e->id}}" {{$e->id == $position->esport_id ? "selected" : ""}}>{{$e->esport_name}}</option>
                        @endforeach
                      
                      </select>
                    </div>
                    <div class="col-md-4">
                        <label>Description</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <input type="text" id="contact-info" class="form-control" name="description" value="{{$position->description}}" >
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