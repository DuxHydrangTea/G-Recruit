@extends('client.page')
@section('user-main-content')
    

    <div class="container">
      <div class="container-1-4">
        <!-- menu left side -->
       @include('client.layouts.side-bar')
            {{-- side bar --}}
        <!-- main content -->
        <div class="main-content">
           <div class="flex">
            <div class="dropdown dropdown-bottom">
                <div tabindex="0" role="button" class="btn m-1">Bộ môn <i class="fa-solid fa-angle-down"></i></div>
                <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                    @foreach ( get_all_esports() as $esport )
                        <li>
                            <a href="{{route('client.users.index', [
                                'esport' => $esport->id
                            ])}}"> <img src="/storage{{$esport->icon}}" class="h-[20px] w-[20px] rounded-full" alt=""> {{$esport->esport_name}}</a>
                        </li>
                    @endforeach
                    
                </ul>
              </div>
              <div class="dropdown dropdown-bottom">
                <div tabindex="1" role="button" class="btn m-1">Xếp hạng <i class="fa-solid fa-angle-down"></i></div>
                <ul tabindex="1" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                        @foreach ( get_all_esports() as $esport )
                            <li class="relative group" >
                                <div >
                                   <img src="/storage{{$esport->icon}}" class="h-[20px] w-[20px] rounded-full" alt=""> <span>{{$esport->esport_name}}</span> <i class="fa-solid fa-angle-right"></i>
                                    
                                </div>
                               <div class="absolute top-0 left-full hidden group-hover:block bg-white border rounded-xl">
                                    <ul>
                                        @foreach (get_all_ranks() as $rank )
                                                @if ($rank->esport_id == $esport->id)
                                                        <li >
                                                            <form action="">
                                                                <input type="text" hidden name="rank" value="{{$rank->id}}">
                                                                <button type="submit">{{$rank->rank_name}}</button>
                                                            </form>
                                                        
                                                        </li>
                                                @endif
                                        @endforeach
                                        
                                    </ul>
                               </div>
                                
                            </li>
                        @endforeach
                        
                    </ul>
                </ul>
              </div>
              <div class="dropdown dropdown-bottom">
                <div tabindex="3" role="button" class="btn m-1">Vị trí <i class="fa-solid fa-angle-down"></i></div>
                <ul tabindex="3" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                    <ul tabindex="0" class="dropdown-content menu bg-base-100 rounded-box z-[1] w-52 p-2 shadow">
                        @foreach ( get_all_esports() as $esport )
                            <li class="relative group" >
                                <div >
                                   <img src="/storage{{$esport->icon}}" class="h-[20px] w-[20px] rounded-full" alt=""> <span>{{$esport->esport_name}}</span> <i class="fa-solid fa-angle-right"></i>
                                    
                                </div>
                               <div class="absolute top-0 left-full hidden group-hover:block bg-white border rounded-xl">
                                    <ul>
                                        @foreach (get_all_positions() as $position )
                                                @if ($position->esport_id == $esport->id)
                                                        <li >
                                                            <form action="">
                                                                <input type="text" hidden name="position" value="{{$position->id}}">
                                                                <button type="submit">{{$position->position_name}}</button>
                                                            </form>
                                                        
                                                        </li>
                                                @endif
                                        @endforeach
                                        
                                    </ul>
                               </div>
                                
                            </li>
                        @endforeach
                        
                    </ul>
                </ul>
              </div>
        
           </div>
            <ul class="list-user w-1/2">
                @forelse ($users as  $user)
                <li class="detail-parent list-user-item flex gap-3 my-3 p-2 border rounded shadow-sm relative">
                    <div class="list-user-item-avatar avatar h-32">
                        <div class="rounded w-24">
                            <img src="storage{{$user->avatar}}" class="h-full  object-cover " alt="">
                        </div>
                        
                    </div>
                    <div class="list-user-item-abstract w-full">
                      <button popovertarget="profile-{{$user->id}}"><h2 class=" font-weight-bold my-1 text-lg"> <span class="font-weight-bold uppercase">{{optional($user->position)->description??""}}: </span>  {{$user->name}}</h2></button>  
                      
                      <div class="">
                            <p class="block py-1 px-3  rounded-sm text-white w-fit my-2" style="background-color:  {{$user->color}}" >{{$user->nickname}}</p>
                            <p class="flex items-center gap-2 "><i class="fa-solid fa-play"></i>  <span class="{{$user->beJoinedTeam() ? "text-violet-400 font-bold" : "text-red-500"}}">{{$user->beJoinedTeam() ? $user->beJoinedTeam()->name  : "Người dùng này chưa tham gia đội tuyển nào!"}}</span></p>
                            <div class="flex items-center gap-1"> <img src="storage{{$user->esport->icon??""}}" class="max-h-5 aspect-square" alt=""> <span>{{optional($user->esport)->esport_name??"Không có"}}</span> </div>
                            <div class="flex items-center gap-1"> <img src="storage{{$user->rank->icon??""}}" class="max-h-5 aspect-square" alt="{{optional($user->rank)->rank_name}}"> <span>{{$user->rank_points}} points</span> </div>
                           
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
                                        <button class="mb-2 text-lg " popovertarget="profile-{{$user->id}}" popovertargetaction="hide"><i class="fa-solid fa-square-xmark"></i></button>
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
                                                <button type="submit" class="btn btn-primary"> Gửi </button>
                                            </form>
                                        </div>  
                                        <a href="{{route('client.users.recruit',
                                        ['id' => $user->id,]
                                        )}}" class="flex gap-1 items-center justify-end btn btn-accent w-fit"> 
                                            
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
                                 {{optional($user->position)->description}}
                            </div>
                            <hr>
                            <div class="flex items-start gap-2 flex-col">
                                <i class="fa-solid fa-clipboard-user"></i>
                                 {{$user->bio ?? "Không có thông tin!"}}
                            </div>
                            <a href="{{route('client.my_profile_v2', $user->id)}}" class="btn btn-primary">Xem hồ sơ</a>
                        </div>
                        <div class="flex-1 border-l-2 border-l-slate-200 p-3">
                            <h1 class="uppercase text-lg text-center">Ưu điểm</h1>
                                <div class="">
                                        <div class="flex items-center my-2 ">
                                            <i class="fa-solid fa-star-half-stroke mr-2 text-red-400"></i> {{$user->advantage_1}}
                                        </div>
                                        <hr>
                                        <div class="flex items-center my-2 ">
                                            <i class="fa-solid fa-star-half-stroke mr-2 text-red-400"></i> {{$user->advantage_2}}
                                        </div>
                                        <hr>
                                        <div class="flex items-center my-2 ">
                                            <i class="fa-solid fa-star-half-stroke mr-2 text-red-400"></i> {{$user->advantage_3}}
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

