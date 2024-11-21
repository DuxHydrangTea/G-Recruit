@extends('admin.page')
@section('title','Create a new menu')
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
            <h4 class="card-title">Menu Form</h4>
            </div>
            <div class="card-content">
            <div class="card-body">
                <form action="{{route('menu.store')}}" class="form form-horizontal" method="POST"  >
                    @csrf
                <div class="form-body">
                    <div class="row">
                    <div class="col-md-4">
                        <label>Menu name</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <input type="text" id="first-name" class="form-control" name="menu_name" >
                        @error('menu_name')
                        <div class="alert alert-danger"><span> {{$message}} </span></div>
                        
                        @enderror
                    </div>
    
                    <div class="col-md-4">
                        <label>Order</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <input type="number" id="contact-info" class="form-control" name="order" >
                    </div>

                    <div class="col-md-4">
                        <label>Route</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <input type="text" id="contact-info" class="form-control" name="route" >
                    </div>
                 


                    <div class="col-md-4">
                        <label>Icon</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <input type="text" id="contact-info" class="form-control" name="icon" >
                    </div>


                    <div class="col-md-4">
                        <label>Type</label>
                    </div>
                    <div class="col-md-8 form-group">
                        <input type="number" id="contact-info" class="form-control" name="type" >
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