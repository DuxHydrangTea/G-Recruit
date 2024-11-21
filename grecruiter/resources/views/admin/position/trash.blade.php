@extends('admin.page')
@section('title','Rank Manager')
@section('main-content')

@php
    use App\Models\Esport; 
@endphp




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
               
                
               <a href="{{route('position.create')}}"> Click here to create a new Position </a>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('position-trash.index') }}">Trash Can</a></li>
                        
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
                            <th>Description</th>
                            <th>Create at</th>
                            <th>Update at</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ( $positions as $p )
                                 
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>  {{$p->position_name}}</td>
                            <td>{{ $p->description}}</td>
                            <td>{{ $p->created_at}}</td>
                            <td>{{ $p->updated_at}}</td>
                            <td>
                                
                                <a href="{{route('position-trash.restore', $p)}}"><span class="badge bg-warning">Restore</span></a>
                                <a href="" data-toggle="modal" data-target="#exampleModalCenter{{$p->id}}"><span class="badge bg-danger">Force Delete</span></a>
                              
                            </td>
                        </tr>
                                                   {{-- <!-- Modal --> --}}
                                                   <div class="modal fade" id="exampleModalCenter{{$p->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Delete confirm</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                        You want to delete the Position: <strong>{{$p->position_name}}</strong>  ?
                                                       
                                                        </div>
                                                        <div class="modal-footer">
                                                            
                                                                <form action="{{route('position-trash.force-delete', $p)}}" method="POST">
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