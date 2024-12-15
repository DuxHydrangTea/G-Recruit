<ul class="list-user w-full" >
    @forelse ($applyUsers as  $applyUser)
    
    <li class="detail-parent list-user-item flex gap-3 my-3 p-2 border rounded shadow-sm relative">
        <div class="list-user-item-avatar h-32 flex flex-col gap-2">
            <img src="/storage{{$applyUser->user->avatar}}" class="h-full aspect-square object-cover rounded " alt="">
            <div class="p-1 border">
                <p class="text-center">Ứng tuyển</p>
                <p class="text-center bg-cyan-700 text-white p-1">{{$applyUser->position->position_name}}</p>
            </div>
        </div>
        <div class="list-user-item-abstract w-full">
          <a href="{{route('client.my_profile_v2', $applyUser->user->id)}}" data-tippy-content="Xem hồ sơ" id="watch-profile"><h2 class=" font-weight-bold text-lg px-2"> <span class="font-weight-bold text-white uppercase "></span> {{$applyUser->user->name}}</h2></a>  
          
          <div class="">
                <p class="block rounded-sm  w-fit my-1 font-bold bg-red-200 p-1 text-white"  style="background-color: {{$applyUser->user->color}}">{{$applyUser->user->nickname}}</p>
                <div class="flex items-center gap-1"> <img src="/storage{{$applyUser->user->esport->icon}}" class="max-h-5 aspect-square" alt=""> <span>{{$applyUser->user->esport->esport_name??"Không có"}}</span> </div>
                <div class="flex items-center gap-1"> <img src="/storage{{$applyUser->user->rank->icon}}" class="max-h-5 aspect-square" alt="$user->rank->rank_name"> <span>{{$applyUser->user->rank_points }} điểm</span> </div>
                <div class="">Xem <a href="{{route('client.my_profile_v2', $applyUser->user->id)}}" target="_blank" class="link link-success">hồ sơ</a> hoặc qua <a target="_blank" href="/storage{{$applyUser->pdf_cv}}" class="link link-info">CV PDF</a></div>
                <div class="message bg-slate-200 p-1">
                    <p class="text-sm italic">Apply {{$applyUser->created_at->diffForHumans()}}</p>
                    <hr>
                    {!!$applyUser->message ?? "Không kèm lời nhắn !"!!}
                </div>
              
            </div>
        </div>
        <div class="flex flex-col gap-2 min-w-32">
            
            <button popovertarget="action-apply-1-{{$applyUser->id}}"  class="btn btn-primary">Đồng ý</button>
            <button popovertarget="action-apply-2-{{$applyUser->id}}"   class="btn btn-danger">Từ chối</button>
            <a href="{{route('client.my_team.consider', $applyUser)}}"   class="btn btn-warning">Xem sau</a>

            <div class="p-3 w-96" id="action-apply-1-{{$applyUser->id}}" popover>
                
                <form method="POST" action="{{route('client.my_team.accept', $applyUser)}}">
                    @csrf
                    <h1 class="text-center uppercase my-2">Xác nhận đồng ý duyệt</h1>
                    <textarea name="message_reply" class="outline-none p-2" rows="10" id="" placeholder="Tin nhắn..."></textarea>
                   <div class="flex justify-between">
                    
                    <button type="submit" class="btn btn-info">Gửi</button>    
                </div> 
                  
                </form>
                <button popovertarget="action-apply-1-{{$applyUser->id}}" popovertargetaction="hide"  class="btn btn-warning my-2">Thoát</button>
            </div>
            <div class="p-3 w-96 rounded" id="action-apply-2-{{$applyUser->id}}" popover>
                
                <form method="POST" action="{{route('client.my_team.deny', $applyUser)}}">
                    @csrf
                    <h1 class="text-center uppercase my-2">Xác nhận từ chối</h1>
                    <textarea name="message" class="outline-none p-2" rows="10" id="" placeholder="Tin nhắn..."></textarea>
                   <div class="flex justify-between">
                    
                    <button type="submit" class="btn btn-primary px-4">Gửi</button>    
                </div> 
                  
                </form>
               
            </div>

            
        </div>
        {{-- <div class="detail-child flex rounded absolute left-full w-full top-0  border shadow-sm p-2">
            <div class="flex-1 p-3 flex flex-col gap-2">
                <h1 class="uppercase text-lg text-center">Thông tin</h1>
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-location-arrow"></i>
                     $user->position->position_name
                </div>
                <hr>
                <div class="flex items-start gap-2 flex-col">
                    <i class="fa-solid fa-clipboard-user"></i>
                     {{$user->bio ?? "Không có thông tin!"}}
                </div>
                <a href="" class="btn btn-primary">View profile</a>
            </div>
            <div class="flex-1 border-l-2 border-l-slate-200 p-3">
                <h1 class="uppercase text-lg text-center">Ưu điểm</h1>
                    <div class="">
                            <div class="flex items-center my-2 ">
                                <i class="fa-solid fa-star-half-stroke mr-2 text-red-400"></i> $user->advantage_1
                            </div>
                            <hr>
                            <div class="flex items-center my-2 ">
                                <i class="fa-solid fa-star-half-stroke mr-2 text-red-400"></i> $user->advantage_1
                            </div>
                            <hr>
                            <div class="flex items-center my-2 ">
                                <i class="fa-solid fa-star-half-stroke mr-2 text-red-400"></i> user->advantage_1
                            </div>
                    </div>
                    
            </div>
     
        </div> --}}
    </li>
    @empty
        <h1 class="text-lg">Chưa có người dùng nào đăng ký!</h1>
        <p>Chuyển hướng đến <a class="text-red-400" href="">Danh sách tuyển thủ...</a></p>
    @endforelse
   
 
    <script>
      tippy('[data-tippy-content]',
       { theme: 'light',}
      );
      </script>
  
</ul>