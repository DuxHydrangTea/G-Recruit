@extends('client.page')
@section('user-main-content')
    
{{--      
      header bar

 --}}



    <div class="container">
      <div class="container-1-4">
        <!-- menu left side -->
       @include('client.layouts.side-bar')
            {{-- side bar --}}
        <!-- main content -->
        <div class="main-content">
          <div class="slide-header" style="background-image: url({{asset('assets/user')}}/assets/images/zed.jpg)">
            <h1>
              Welcome to G-Recruiter
              <br />
              Choose any player for your team
            </h1>
            <a href="">Browser More</a>
          </div>
          <div class="list-esport">
            <div class="title-list-bar">
              <h3>Esport</h3>
              <h3>See All</h3>
            </div>
            <div class="list-esport-main">
              <div class="list-esport-main-item" style="background-image: url({{asset('assets/user')}}/assets/images/games/lol-bgr.png)">
                <h3>League of Legends</h3>
              </div>
              <div class="list-esport-main-item" style="background-image: url({{asset('assets/user')}}/assets/images/games/dota2bgr.png)">
                <h3>Dota 2</h3>
              </div>
              <div class="list-esport-main-item" style="background-image: url({{asset('assets/user')}}/assets/images/games/valo-bgr.png)">
                <h3>Valorant</h3>
              </div>
              <div class="list-esport-main-item" style="background-image: url({{asset('assets/user')}}/assets/images/games/cs2bgr.png)">
                <h3>CS2</h3>
              </div>
            </div>
          </div>
          <div class="list-esport">
            <div class="title-list-bar">
              <h3>Professional Players</h3>
              <h3>See All</h3>
            </div>
            
            @livewire('home.user-ratest')
            
          </div>
          @livewire('home.post-component')
        </div>
        </div>
      </div>
    </div>
    <hr>

  @endsection
{{-- 
    footer --}}

