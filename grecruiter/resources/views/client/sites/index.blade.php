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
              <h3 class="uppercase">Một số bộ môn nổi bật</h3>
              <h3 class="btn glass">Xem tất cả</h3>
            </div>
            <div class="list-esport-main">
              <div class="list-esport-main-item" style="background-image: url({{asset('assets/user')}}/assets/images/games/lol-bgr.png)">
                <h3 class="btn glass">League of Legends</h3>
              </div>
              <div class="list-esport-main-item" style="background-image: url({{asset('assets/user')}}/assets/images/games/dota2bgr.png)">
                <h3 class="btn glass">Dota 2</h3>
              </div>
              <div class="list-esport-main-item" style="background-image: url({{asset('assets/user')}}/assets/images/games/valo-bgr.png)">
                <h3 class="btn glass">Valorant</h3>
              </div>
              <div class="list-esport-main-item" style="background-image: url({{asset('assets/user')}}/assets/images/games/cs2bgr.png)">
                <h3 class="btn glass">CS2</h3>
              </div>
            </div>
          </div>
          <div class="divider">Xem qua</div>

          <div class="list-esport">
            <div class="title-list-bar">
              <h3 class="uppercase">Người chơi chuyên nghiệp</h3>
              <h3>Xem tất cả</h3>
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

