@extends('client.page')
@section('user-main-content')

    <div class="container">
      <div class="container-1-4">
        <!-- menu left side -->
        @include('client.layouts.side-bar')
        <!-- main content -->
        <div class="main-content">
          
        
         
          <div class="container" id="tab-info-2" >
        
            
            <div class="team-info">
              <div class="team-info-side side-1">
              
                  <img
                  id="show_avatar_team"
                    class="side-1-avatar"
                    src="/storage{{$team->avatar}}"
                    alt=""
                    accept="image/*"
                  />
                  
                
                
               
                  <h1 class="py-3 uppercase text-lg text-center font-bold">{{$team->name}}</h1> 
                  
                <hr />
                <div class="flex items-center gap-2">
                    <img
                    src="/storage{{$team->esport->icon}}"
                    height="30px"
                    width="30px"
                    alt=""
                    
                  />
                  
                  <span>{{$team->esport->esport_name}}</span>
                </div>
                 
                 
                <p class="founder"><strong><i class="fa-solid fa-user-tie"></i> :</strong> 
                @foreach ($team->users as $founder )
                        {{$founder->name." / "}}
                @endforeach
                    
                </p>
                <i class="created_at"> <strong><i class="fa-solid fa-calendar-days"></i> : </strong> {{$team->created_at->format('Y-d-m')}} </i>
                

                          <div class="relative overflow-x-auto shadow-md sm:rounded-lg border my-2">
                            <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                    <tr>
                                        <th scope="col" class="px-2 py-1">
                                            Tuyển thủ
                                        </th>
                                        <th scope="col" class="px-2 py-1">
                                          Nick name
                                      </th>
                                        <th scope="col" class="px-2 py-1">
                                            Vị trí
                                        </th>
                                        
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach ($members as $member )
                                  <tr class="odd:bg-white  even:bg-gray-50 ev border-b ">
                                    <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap ">
                                        {{$member->name}}
                                    </th>
                                    <td class="px-2 py-1">
                                      {{$member->nickname}}
                                    </td>
                                    <td class="px-2 py-1">
                                      {{optional($member->position)->position_name}}
                                    </td>
                                    
                                </tr>
                                  @endforeach
                                    
                                    </tbody>
                            </table>
                          </div>
              </div>

              <div class="team-info-side">
               
                <div class="" id="introduce-tab">
                  <div class="p-3">
                    <h2 class="uppercase divider divider-start font-bold">Trạng thái tuyển dụng</h2>
                    {!!$team->recruiting_status!!}
                  </div>
                  
                  <div class="p-3">
                    <h2 class="uppercase divider divider-start font-bold">Giới thiệu</h2>
                    {!!$team->description!!}
                  </div>
                  
                  <div class="p-3">
                    <h2 class="uppercase divider divider-start font-bold">Bài viết của đội</h2>
                    @forelse ($posts as $post )
                    <div class="w-full border mx-auto bg-white rounded-xl shadow-md overflow-hidden my-3 ">
                      <div class="md:flex">
                          <div class="md:shrink-0">
                              <img class="h-48 w-full object-cover md:h-full md:w-48" src="/storage{{$post->thumbnail}}">
                          </div>
                          <div class="p-8">
                              <div class="flex gap-3 items-center uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                                <span>{{$post->topic->topic_name}}</span> 
                                <span class="flex w-3 h-3  bg-blue-600 rounded-full"></span>
                                <span>{{$post->created_at->diffForHumans()}}</span> 
                              </div>
                              <hr>
                              <a href="{{route('client.post.show', $post->slug)}}" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{$post->title}}
                              </a>
                              <p class="mt-2 text-slate-500 line-clamp-2">
                                {{$post->abstract}}
                              </p>
                          </div>
                      </div>
                  </div>
                    @empty
                        <h1>Team chưa có bài viết nào!</h1>
                    @endforelse
                  
                  </div>
                  
                </div>
                <div id="approve-tab"></div>
              </div>
            </div>
           
        
        </div>
        </div>
      </div>
    </div>

@endsection