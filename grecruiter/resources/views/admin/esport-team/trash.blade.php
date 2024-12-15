@extends('admin.page')
@section('title','Esport Team Manager')
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
               
                
               <a href="{{ route('esport-team.create') }}"> Click here to create a new team </a>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="">Trash Can</a></li>
                        
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
                            <th>id</th>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th>Esport</th>
                            <th>Members</th>
                            <th>Function</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $data as $d )
                            
                        <tr>
                            
                            <td><a href=""><strong>{{$d->id}}</strong></a>  </td>
                            <td>{{$d->name}}</td>
                            <td> <img src=" /storage{{$d->avatar}}" alt="" width="30px" height="30px"  class="avatar"> </td>
                            <td>{{$d->esport_id}}</td>
                            
                            <td>0</td>
                            <td>
                                
                                <a href="{{ route('esport-team-trash.restore', $d->id) }}"><span class="badge bg-warning">Restore</span></a>
                                <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$d->id}}"><span class="badge bg-danger">Delete Forever</span></a>
                              
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
                                                        You want to delete the Esport Game: <strong></strong>  ?
                                                       
                                                        </div>
                                                        <div class="modal-footer">
                                                            
                                                                <form action="{{ route('esport-team-trash.force-delete', $d) }}" method="POST">
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
                                <h3>Nothings</h3>
                        @endforelse
                        
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>  
@endsection