@extends('admin.page')
@section('title','Post Manager')
@section('main-content')





<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Danh sách bài viết </h3>
                <p><a href="" class="btn btn-warning">Thùng rác</a></p>
                    <p>
                        @session('add_message')
                        <div class="alert alert-success">
                            {{session('add_message')}}
                        </div>
                        @endsession
                    </p>
               
                
            
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                    
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            
            @foreach ($posts as $p )
            <div class="col-xl-4 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <h4 class="card-title">{{$p->title}}</h4>
                            <p class="card-text card-text-topic">
                                {{$p->topic->topic_name}}
                            </p>
                            <p class="card-text">
                                {{$p->abstract}}
                            </p>
                        </div>
                        <img class="img-fluid" src="/storage/images/{{$p->thumbnail}}" alt="Card image cap">
                    </div>
                    <div class="card-footer flex-column gap-5">
                        <div class="d-flex align-items-center gap-5 mb-3">
                            <img class="img-fluid avatar-sm" src="/storage/images/{{$p->user->avatar}}" alt="Card image cap">
                            <span >{{$p->user->name}}</span>
                            <span >- {{$p->created_at->diffForHumans()}}</span>
    
                        </div>
                        <a  class="btn btn-danger">Delete</a>
                
                            <a class="btn {{$p->is_privated ? '  btn-secondary' : ' btn-info' }}" href="{{route('post.private', $p->slug)}}"> {{$p->is_privated ? 'Unprivate' : 'Set private' }}</a>
                        
                        <a class="btn btn-light-primary read-more">Details</a>
                    </div>
                </div>
             
            </div>
           
            @endforeach
            
        </div>
    
    </section>
</div>  
@endsection