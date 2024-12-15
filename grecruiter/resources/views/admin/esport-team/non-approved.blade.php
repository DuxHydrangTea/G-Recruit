@extends('admin.page')
@section('title','Duyệt đội tuyển')
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
                        <li class="breadcrumb-item"><a href="{{ route('esport-team-trash.index') }}">Trash Can</a></li>
                        
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
                            <th>Status</th>
                            <th>Function</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $data as $d )
                            
                        <tr>
                            
                            <td><a href=""><strong>{{$d->id}}</strong></a>  </td>
                            <td>{{$d->name}}</td>
                            <td> <img src="/storage{{$d->avatar}}" alt="" width="30px" height="30px"  class="avatar"> </td>
                            <td>{{$d->esport->esport_name}}</td>
                            
                            <td>{{$d->members->count()}}</td>
                            <td>
                                @if($d->is_approved)
                                    <span>Đã duyệt</span>
                                @else
                                    <a href="{{route('esport_team.approve', $d->id)}}" class="d-inline-flex btn btn-success mb-3">Duyệt ngay</a>
                                    <a href="{{route('esport_team.deny', $d->id)}}" class="btn btn-warning d-inline-flex ">Từ chối</a>                                @endif
                            </td>
                            <td>
                                
                                <a href="{{ route('esport-team.edit', $d->id) }}" class="d-block mb-3"><span class="badge bg-warning">Edit</span></a>
                                <a href="" class="d-block" data-toggle="modal" data-target="#exampleModalCenter{{$d->id}}"><span class="badge bg-danger">Remove</span></a>
                              
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
                                                            
                                                                <form action="{{ route('esport-team.destroy', $d) }}" method="POST">
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