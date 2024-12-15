@extends('admin.page')
@section('title','Rank Manager')
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
               
                
               <a href="{{ route('user.create') }}"> Click here to create a new user </a>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('user-trash.index') }}">Trash Can</a></li>
                        
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
                            <th>Nickname</th>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th>Esport</th>
                            <th>Position</th>
                            <th>Function</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $users as $u )
                            
                        <tr>
                            
                            <td><a href="{{ route('user.show', $u) }}"><strong>{{$u->nickname}}</strong></a>  </td>
                            <td>{{$u->name}}</td>
                            <td> <img src="{{ '/storage'.$u->avatar}}" alt="" width="30px" height="30px"  class="avatar"> </td>
                            <td>{{$u->email}}</td>
                            <td>{{$u->esport->esport_name ?? "None"}}</td>
                            <td>{{$u->position_id}}</td>
                            <td>
                                
                                <a href="{{ route('user-trash.restore', $u) }}"><span class="badge bg-warning">Restore</span></a>
                                <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$u->id}}"><span class="badge bg-danger">Remove</span></a>
                              
                            </td>
                        </tr>
                                                   {{-- <!-- Modal --> --}}
                                                   <div class="modal fade" id="exampleModalCenter{{$u->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete confirm</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        You want to delete the Esport Game: <strong></strong>  ?
                                                       
                                                        </div>
                                                        <div class="modal-footer">
                                                            
                                                                <form action="{{ route('user-trash.force-delete', $u->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-danger" >Delete</button>
                                                                </form>
                                                               
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    </div>
                                                </div>
                                      
            
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