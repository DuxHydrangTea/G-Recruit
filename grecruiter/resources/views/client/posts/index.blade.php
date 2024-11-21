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
        <div class="list-sport">
         
          @livewire('home.post-component')
          <div class="list-sport-main">
            <div class="filter-bar">
              <form action="">
                <div class="filter-bar-element">
                  <label for="">By game:</label>
                  <select name="esport" id="">
                    <option value="">All</option>
                    @foreach ($esports as  $e)
                      <option value="{{$e->id}}">{{$e->esport_name??""}}</option>
                    @endforeach
                   
                  
                  </select>
                </div>
                <div class="filter-bar-element">
                  <label for="">By type:</label>
                  <select name="type" id="">
                    <option value="">All</option>
                    <option value="1">Xin ứng tuyển</option>
                    <option value="2">Tuyển dụng</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-danger bg-red-500">Filter</button>
              </form>
            </div>
            <div class="">
              <div class="mr-3 center-margin">
                @foreach ($posts as  $p)

                @php
                    $author = $p->user_id != 0 ? $p->user: $p->esportTeam 
                @endphp
                <div class="poster-item">
                    <div class="p-2">
                      <header class="poster-item-header pb-1">
                        <img
                          src="/storage/images/{{$author->avatar}}"
                          style="border-radius: 50%"
                          class="poster-item-header-img"
                        />
                        <div class="poster-name">
                          <p class="hover:underline font-bold text-rose-600">
                            {{$author->name}} &#x2022; <span class="text-sm"> {{$p->applyType->type_name ?? ""}}</span>
                          </p>
                          <span>{{$p->topic->topic_name}}</span>
                          <span class="esport-in-post"> - {{$p->esport->esport_name??""}}</span>
                          <span class="text-gray-400"> - {{$p->created_at->diffForHumans()}}</span>
                        </div>
                      </header>
                      <hr />
                      <p class="abstract-post">
                        {{$p->abstract}}
                        <hr>
                      </p>
                      <div class="content-post max-line-4">
                        <p>
                          {!!$p->content!!}
                        </p>
                      </div>
                          <button class="btn-read-more">Readmore</button>
                    </div>
  
                    <img
                      src="/storage/images/{{$p->thumbnail}}"
                      alt=""
                      srcset=""
                      width="100%"
                    />
                    <div class="d-flex fit-content my-2 mx-2 align-items-center">
                      <a href="{{route('client.post.show', $p->slug)}}" class="btn btn-primary ">Details</a>
                      <span class="count-comment">{{count($p->likes)}} likes</span>
                      <span class="count-comment">{{count($p->comments)}} comments</span>
                    </div>
                  
                  </div>
                @endforeach
               
                
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- // -->
    </div>
  </div>
@endsection



