@extends('admin.page')
@section('title','Rank Manager')
@section('main-content')


<section class="section">
    <div class="card m-3">
        <div class="card-header">
            <h4 class="card-title">Personal Information</h4>
        </div>
        <div class="card-body">
            <div class="row">
            
                <div class="col-md-12">
                    <img class="col-md-2 mt-3 mb-1 avatar" src="https://scontent.fhan2-4.fna.fbcdn.net/v/t39.30808-6/457026271_1933260077147062_8098894341863480578_n.jpg?_nc_cat=110&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeGCgdh-2a9mAVZFw-0tASJYR7X39fvz6BJHtff1-_PoEk-9KJ4A5xQnLlRbIJzDposClxW_B3qkJpLNx8bOo_df&_nc_ohc=qhN4-Bi7JEQQ7kNvgF5CvBZ&_nc_ht=scontent.fhan2-4.fna&oh=00_AYCZ89i5mEjTU5nb8e4npgN7WqNkpFV2zPOrU8C7iObBSw&oe=66D4BFC4" alt="">
                    <h5 class="card-title pl-5 font-bold">{{$user->nickname }}</h5>
                    <div class="row">
                        <div class="col-3">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
                                    aria-controls="v-pills-home" aria-selected="true">Personal</a>
                                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
                                    aria-controls="v-pills-profile" aria-selected="false">Esport</a>
                                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
                                    aria-controls="v-pills-messages" aria-selected="false">Timelines</a>
                                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
                                    aria-controls="v-pills-settings" aria-selected="false">Nothing</a>
                            </div>
                        </div>
                        <div class="col-9">
                            <div class="tab-content" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                  <div class="row">
                                    <div class="col-6">
                                        <ul>
                                            <li>
                                              <strong>Fullname: </strong> {{$user->name}}
                                            </li>
                                            <li>
                                                <strong>Birthday: </strong>  {{$user->birthday}}</li>
                                            <li>
                                                <strong>Email: </strong>  {{$user->email}}
                                            </li>
                                            <li>
                                                <strong>Phone: </strong>  {{$user->phone}}
                                            </li>
                                            <li>
                                                <strong>Address: </strong>  {{$user->address}}
                                            </li>
                                        </ul>
                                      </div>
                                      <div class="col-6">
                                        <ul>
                                            <li>Advantage 1: {{$user->advantage_1??"None"}}</li>
                                            <li>Advantage 2: {{$user->advantage_2??"None"}}</li>
                                            <li>Advantage 3: {{$user->advantage_3??"None"}}</li>
                                        </ul>
                                      </div>
                                  </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                   <ul>
                                    <li><strong>Esport:</strong> {{$user->esport->esport_name?? "None"}} </li>
                                    <li><strong>Position:</strong> {{$user->position->position_name?? "None"}}</li>
                                    <li><strong>Rank:</strong> {{$user->rank->rank_name?? "None"}} </li>
                                    <li><strong>Points:</strong> {{$user->rank_points}} points </li>
                                    <li><strong>Working in Team:</strong> </li>
                                   </ul>
                                </div>
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                <ul>  
                                @forelse ($user->timeline as $timeline )
                                   <li> <strong>{{$timeline->start_time}} to {{$timeline->end_time}}</strong>: {{$timeline->description}} </li>
                                    
                                @empty
                                    <h1>Empty</h1>
                                @endforelse
                            </ul>  
                            <button class="btn btn-warning">Edit</button>
                                </div>
                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                    Sed lacus quam, convallis quis condimentum ut, accumsan congue massa. Pellentesque et quam vel massa pretium ullamcorper
                                    vitae eu tortor.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection