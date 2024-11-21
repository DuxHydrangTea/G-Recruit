@extends('client.page')
@section('user-main-content')
    

    <div class="container">
      <div class="container-1-4">
        <!-- menu left side -->
       @include('client.layouts.side-bar')
            {{-- side bar --}}
        <!-- main content -->
        <div class="main-content">
            <ul class="list-user w-1/2">
                @forelse ($users as  $user)
                <li class="detail-parent list-user-item flex gap-3 my-3 p-2 border rounded shadow-sm relative">
                    <div class="list-user-item-avatar h-32">
                        <img src="storage/images/{{$user->avatar}}" class="h-full aspect-square object-cover rounded" alt="">
                    </div>
                    <div class="list-user-item-abstract w-full">
                      <button popovertarget="profile-{{$user->id}}"><h2 class=" font-weight-bold my-1 text-lg"> <span class="font-weight-bold uppercase">{{$user->position->position_name}}: </span>  {{$user->name}}</h2></button>  
                      
                      <div class="">
                            <p class="block py-1 px-3  rounded-sm text-white w-fit my-2" style="background-color:  {{$user->color}}" >{{$user->nickname}}</p>
                            <p class="flex items-center gap-2 "><i class="fa-solid fa-play"></i>  <span class="{{$user->beJoinedTeam() ? "text-violet-400 font-bold" : "text-red-500"}}">{{$user->beJoinedTeam() ? $user->beJoinedTeam()->name  : "Người dùng này chưa tham gia đội tuyển nào!"}}</span></p>
                            <div class="flex items-center gap-1"> <img src="storage/images/{{$user->esport->icon??""}}" class="max-h-5 aspect-square" alt=""> <span>{{$user->esport->esport_name??"Không có"}}</span> </div>
                            <div class="flex items-center gap-1"> <img src="storage/images/{{$user->rank->icon??""}}" class="max-h-5 aspect-square" alt="{{$user->rank->rank_name}}"> <span>{{$user->rank_points}} points</span> </div>
                           
                           <div class="flex justify-end">
                        {{-- Kiểm tra người dùng có phải là chủ Team mới được Tuyển dụng --}}
                           @if(Auth::user()->founderOfTeam())
                                {{-- Kiểm tra người dùng đã tham gia Team nào chưa và người dùng có phải chủ team không ( họ không thể được tuyển dụng ) --}}
                                @if(!$user->beJoinedTeam() || !$user->founderOfTeam())
                                {{-- Kiểm tra người dùng  --}}
                                    @if ($user->isRecruitedBy())
                                            <a href="{{route('client.users.recruit',
                                            ['id' => $user->id,]
                                        )}}" class="flex gap-1 items-center justify-end btn btn-dark w-fit"> 
                                            
                                            Huỷ chiêu mộ
                                        </a>
                                    @else
                                    <div class="rounded p-3 " id="profile-{{$user->id}}" popover>
                                        <button class="mb-2 text-lg" popovertarget="profile-{{$user->id}}" popovertargetaction="hide"><i class="fa-solid fa-square-xmark"></i></button>
                                            <form action="{{route('client.users.recruit_with_message', $user->id)}}" class="form-group  flex flex-col gap-5 outline-none " method="post">
                                                @csrf
                                                <h1 class="text-center uppercase font-weight-bolder ">Chiêu mộ {{$user->name}}</h1>
                                                <label for="">
                                                    <p>Vị trí</p>
                                                    <select name="position_id" id="" class="p-2 outline-none">
                                                        @foreach ($positions as $position)
                                                            <option value="{{$position->id}}">{{$position->position_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </label>
                                                <label for="">
                                                    <textarea class="p-2" placeholder="Lời nhắn đi kèm..." name="message" id="" cols="30" rows="10"></textarea>
                                                </label>
                                                <button type="submit" class="btn btn-primary text-blue-600"> Gửi </button>
                                            </form>
                                        </div>  
                                        <a href="{{route('client.users.recruit',
                                        ['id' => $user->id,]
                                        )}}" class="flex gap-1 items-center justify-end btn btn-danger w-fit"> 
                                            
                                            Chiêu mộ
                                        </a>
                                    @endif
                            
                                @endif
                            @endif
                           </div>
                            
                        </div>
                    </div>

                    <div class="detail-child flex rounded absolute left-full w-full top-0  border shadow-sm p-2">
                        <div class="flex-1 p-3 flex flex-col gap-2">
                            <h1 class="uppercase text-lg text-center">Thông tin</h1>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-location-arrow"></i>
                                 {{$user->position->position_name}}
                            </div>
                            <hr>
                            <div class="flex items-start gap-2 flex-col">
                                <i class="fa-solid fa-clipboard-user"></i>
                                 {{$user->bio ?? "Không có thông tin!"}}
                            </div>
                            <a href="{{route('client.other_profile', $user->id)}}" class="btn btn-primary">View profile</a>
                        </div>
                        <div class="flex-1 border-l-2 border-l-slate-200 p-3">
                            <h1 class="uppercase text-lg text-center">Ưu điểm</h1>
                                <div class="">
                                        <div class="flex items-center my-2 ">
                                            <i class="fa-solid fa-star-half-stroke mr-2 text-red-400"></i> {{$user->advantage_1}}
                                        </div>
                                        <hr>
                                        <div class="flex items-center my-2 ">
                                            <i class="fa-solid fa-star-half-stroke mr-2 text-red-400"></i> {{$user->advantage_1}}
                                        </div>
                                        <hr>
                                        <div class="flex items-center my-2 ">
                                            <i class="fa-solid fa-star-half-stroke mr-2 text-red-400"></i> {{$user->advantage_1}}
                                        </div>
                                </div>
                                
                        </div>
                 
                    </div>
                </li>
                @empty
                    <h1 class="text-lg">Chưa có người dùng nào!</h1>
                    <p>Chuyển hướng đến <a class="text-red-400" href="{{route('client.users.index')}}">Tất cả...</a></p>
                @endforelse
               
            </ul>
        </div>
        </div>
      </div>
    </div>
    <hr>

  @endsection
{{-- 
    footer --}}

