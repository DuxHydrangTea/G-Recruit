@extends('client.page')
@section('user-main-content')
<link rel="stylesheet" href="/assets/user/assets/css/listpost.css" />

<div class="container">
    <div class="container-1-4">
        @include('client.layouts.side-bar')
      <div class="main-content">
        <div class="slide-header">
          <h1>
            Welcome to G-Recruiter
            <br />
            Choose any player for your team
          </h1>
          <a href="">Browser More</a>
        </div>
        <div class="list-sport gap-5">
         
          @livewire('comments-component', [
            'post_id' => $p->id
          ])

          <div class="list-sport-main mt-1">
            <a href="{{url()->previous()}}" class="my-2 d-block">Back</a>
            <div class="">
              <div class=" center-margin">
                
                @php
                    $author = $p->user_id != 0 ? $p->user: $p->esportTeam 
                @endphp
                <div class="poster-item">
                    <div class="p-2">
                      <header class="poster-item-header pb-1">
                        <img
                          src="/storage{{$p->getAuthor()->avatar}}"
                          style="border-radius: 50%"
                          class="poster-item-header-img"
                        />
                        <div class="poster-name">
                          <p class="hover:underline font-bold text-rose-600">
                            {{$p->getAuthor()->name}}
                          </p>
                          <span>{{$p->topic->topic_name}}</span>
                          <span class="esport-in-post"> - {{$p->esport->esport_name}}</span>
                          <span class="text-gray-400"> - {{$p->created_at->diffForHumans()}}</span>
                        </div>
                      </header>
                      <hr />
                      <p class="abstract-post">
                        {{$p->abstract}}
                        <hr>
                      </p>
                      <div class="content-post">
                        <p>
                          {!!$p->content!!}
                        </p>
                      </div>
                          
                    </div>
  
                    <img
                      src="/storage{{$p->thumbnail}}"
                      alt=""
                      srcset=""
                      width="100%"
                    />
                    
                  
                  </div>
               
               
                
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- // -->
    </div>
  </div>
@endsection



