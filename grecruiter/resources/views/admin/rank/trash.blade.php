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
               
                
               <a href="{{route('rank.create')}}"> Click here to create a new Rank </a>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('rank-trash.index') }}">Trash Can</a></li>
                        
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
                            <th>Icon</th>
                            <th>Rank Name</th>
                            <th>Belong to Esport</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $ranks as $r )
                                 
                        <tr>
                            <td>{{$r->id}}</td>
                            <td> <img src="{{ '/storage'.$r->icon}}" alt="" width="30px" height="30px"> </td>
                            <td>  {{$r->rank_name}}</td>
                            <td>{{ $r->esport->esport_name}}</td>
                            <td>
                                
                                <a href="{{route('rank-trash.restore', $r->id)}}"><span class="badge bg-secondary">Restore</span></a>
                                <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$r->id}}"><span class="badge bg-danger">Remove</span></a>
                              
                            </td>
                        </tr>
                                                   {{-- <!-- Modal --> --}}
                                                   <div class="modal fade" id="exampleModalCenter{{$r->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete confirm</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        You want to delete the Esport Game: <strong>{{$r->rank_name}}</strong>  ?
                                                       
                                                        </div>
                                                        <div class="modal-footer">
                                                            
                                                                <form action="{{route('rank-trash.force-delete', $r)}}" method="POST">
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