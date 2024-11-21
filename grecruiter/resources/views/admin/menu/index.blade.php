@extends('admin.page')
@section('title','Menu Manager')
@section('main-content')





<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Datatable</h3>
                
                    <p>
                        @session('add_message')
                        <div class="alert alert-success">
                            {{session('add_message')}}
                        </div>
                        @endsession
                    </p>
               
                
               <a href="{{route('menu.create')}}"> Click here to create a new Menu </a>
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
        <div class="card">
            <div class="card-header">
                Data
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Order</th>
                            <th>Route</th>
                            <th>Icon</th>
                            <th>Type</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $datas as $d )
                                 
                        <tr>
                            <td>{{$d->id}}</td>
                            <td>  {{$d->menu_name}}</td>
                            <td>{{$d->order}}</td>
                            <td>{{$d->route}}</td>
                            <td>{{$d->icon}}</td>
                            <td>{{$d->type}}</td>
                            <td>
                                
                                <a href="{{route('menu.edit', $d)}}"><span class="badge bg-warning">Edit</span></a>
                                <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$d->id}}"><span class="badge bg-danger">Remove</span></a>
                              
                            </td>
                        </tr>
                                                   {{-- <!-- Modal --> --}}
                                                   <div class="modal fade" id="exampleModalCenter{{$d->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete confirm</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        You want to delete the Esport Game: <strong>{{$d->menu_name}}</strong>  ?
                                                        <p>Route: {{$d->eoute}}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            
                                                                <form action="{{route('menu.destroy', $d)}}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger" >Delete</button>
                                                                </form>
                                                               
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    </div>
                                                </div>
                                                {{-- end modal --}}
            
                        @empty
                                <span>Nothings</span>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>  
@endsection