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
          <div class="list-sport-main mx-2">
            <div class="filter-bar">
              <form action="" class="flex items-center">
                <label class="form-control w-full">
                  <div class="label">
                    <span class="label-text">Tìm theo bộ môn</span>
                    
                  </div>
                  <select name="esport" class="select select-bordered">
                    <option value="">Tất cả</option>
                    @foreach ($esports as  $e)
                      <option value="{{$e->id}}">{{$e->esport_name??""}}</option>
                    @endforeach
                  </select>
                  
                </label>
                <label class="form-control w-full">
                  <div class="label">
                    <span class="label-text">Loại bài đăng</span>
                    
                  </div>
                  <select name="type" class="select select-bordered">
                    <option value="">Tất cả</option>
                    <option value="1">Ứng tuyển</option>
                    <option value="2">Tuyển dụng</option>
                  </select>
                  
                </label>
                <button type="submit" class="border-red-100 btn btn-success">Lọc</button>
              </form>
            </div>
            <div class="">
              <div class="mr-3 center-margin">
                @foreach ($posts as  $p)

                @php
                    $author = $p->user_id != 0 ? $p->user: $p->esportTeam 
                @endphp
                <a href="{{route('client.post.show', $p->slug)}}" class="block"> 
                  <section class="container w-full mb-5 antialiased ">
                    <article
                        class=" flex flex-wrap md:flex-nowrap shadow border border-[#818181] rounded mx-auto max-w-3xl group cursor-pointer transform duration-500 hover:-translate-y-1">
                        <img class="w-full max-h-[400px] object-cover md:w-52" src="/storage{{$p->thumbnail}}" alt="">
                        <div class="">
                            <div class="p-5 pb-10">
                                <h1 class="text-2xl font-semibold text-gray-800 mt-4">
                                    {{$p->title}}
                                </h1>
                                <p class="text-sm text-gray-400 mt-2 leading-relaxed">
                                   {{$p->abstract}}
                                </p>
                            </div>
                            <div class="bg-blue-50 p-5">
                                <div class="sm:flex sm:justify-between">
                                    <div>
                                        <div class="text-lg text-gray-700">
                                            <span class="text-gray-900 font-bold">{{$p->topic->topic_name}}</span>
                                        </div>
                                        <div class="flex items-center">
                                            
                                            <div class="text-gray-600 ml-2 text-sm md:text-base mt-1">
                                              <i class="fa-solid fa-earth-asia"></i> {{ $p->created_at->diffForHumans()}}
                                            </div>
                                        </div>
                                    </div>
                                    <button class="mt-3 sm:mt-0 py-2 px-5 md:py-3 md:px-6 bg-purple-700 hover:bg-purple-600 font-bold text-white md:text-lg rounded-lg shadow-md">
                              Xem thêm
                            </button>
                                </div>
                                <div class="mt-3 text-gray-600 text-sm md:text-sm">
                                    <div class="flex items-center  gap-2">
                                      <img src="/storage{{$author->avatar}}" class="rounded-full aspect-square object-cover w-6 h-6" alt="">
                                      <span>{{$author->name}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </section>

                </a>
                

                {{-- <div class="poster-item mb-8">
                    <div class="p-2">
                      <header class="poster-item-header pb-1">
                        <img
                          src="/storage{{$p->getAuthor()->avatar}}"
                          style="border-radius: 50%"
                          class="poster-item-header-img"
                        />
                        <div class="poster-name">
                          <p class="hover:underline font-bold text-rose-600">
                            {{$p->getAuthor()->name}} &#x2022; <span class="text-sm"> {{$p->applyType->type_name ?? ""}}</span>
                          </p>
                          <span>{{$p->topic->topic_name}}</span>
                          <span class="esport-in-post"> - {{$p->esport->esport_name??""}}</span>
                          <span class="text-gray-400"> - {{$p->created_at->diffForHumans()}}</span>
                        </div>
                      </header>
                      <div class="divider">{{$p->title}}</div>

                      <hr />
                      <p class="bg-violet-100 p-1 rounded">
                        {{$p->abstract}}
                        <hr>
                      </p>
                      <div class="content-post max-line-4">
                        <p>
                          {!!$p->content!!}
                        </p>
                      </div>
                          <button class="btn-read-more ">Readmore</button>
                    </div>
  
                    <img
                      src="/storage{{$p->thumbnail}}"
                      alt=""
                      srcset=""
                      width="100%"
                    />
                    <div class="flex fit-content my-2 mx-2 items-center justify-end">
                      
                      <span class="count-comment">{{count($p->likes)}} likes</span>
                      <span class="count-comment">{{count($p->comments)}} comments</span>
                      <a href="{{route('client.post.show', $p->slug)}}" class="link link-info">Xem chi tiết</a>
                    </div>
                  
                  </div>
                 --}}
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



