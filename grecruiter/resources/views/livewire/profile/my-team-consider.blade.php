<ul class="list-user w-full" >
    @forelse ($considerUsers as  $considerUser)
    <li class="detail-parent list-user-item flex gap-3 my-3 p-2 border rounded shadow-sm relative">
        <div class="list-user-item-avatar h-32 flex flex-col gap-2">
            <img src="/storage{{$considerUser->user->avatar}}" class="h-full aspect-square object-cover rounded " alt="">
            <div class="p-1 border">
                <p class="text-center">Ứng tuyển</p>
                <p class="text-center bg-cyan-700 text-white p-1">{{$considerUser->position->position_name}}</p>
            </div>
        </div>
        <div class="list-user-item-abstract w-full">
          <a href="{{route('client.my_profile_v2', $considerUser->user->id)}}" data-tippy-content="Xem hồ sơ" id="watch-profile"><h2 class=" font-weight-bold text-lg px-2"> <span class="font-weight-bold text-white uppercase "></span> {{$considerUser->user->name}}</h2></a>  
          
          <div class="">
                <p class="block rounded-sm  w-fit my-1 font-bold bg-red-200 p-1 text-white"  style="background-color: {{$considerUser->user->color}}">{{$considerUser->user->nickname}}</p>
                <div class="flex items-center gap-1"> <img src="/storage{{$considerUser->user->esport->icon}}" class="max-h-5 aspect-square" alt=""> <span>{{$considerUser->user->esport->esport_name??"Không có"}}</span> </div>
                <div class="flex items-center gap-1"> <img src="/storage{{$considerUser->user->rank->icon}}" class="max-h-5 aspect-square" alt="$user->rank->rank_name"> <span>{{$considerUser->user->rank_points }} điểm</span> </div>
                <div class="">Xem <a href="{{route('client.other_profile', $applyUser->user->id)}}" target="_blank" class="link link-success">hồ sơ</a> hoặc qua <a target="_blank" href="/storage{{$applyUser->pdf_cv}}" class="link link-info">CV PDF</a></div>
                <div class="message bg-slate-200 p-1">
                    <p class="text-sm italic">Apply {{$considerUser->created_at->diffForHumans()}}</p>
                    <hr>
                    {!!$considerUser->message ?? "Không kèm lời nhắn !"!!}
                </div>
              
            </div>
        </div>
        <div class="flex flex-col gap-2 min-w-32">
            
            <button popovertarget="action-apply-1"  class="btn btn-primary">Đồng ý</button>
            <button popovertarget="action-apply-2"   class="btn btn-danger">Từ chối</button>
           
            <div class="p-3 w-96" id="action-apply-1" popover>
                
                <form method="POST" action="{{route('client.my_team.accept', $considerUser)}}">
                    @csrf
                    <h1 class="text-center uppercase my-2">Xác nhận đồng ý duyệt</h1>
                    <textarea name="message_reply" class="outline-none p-2" rows="10" id="" placeholder="Tin nhắn..."></textarea>
                   <div class="flex justify-between">
                    
                    <button type="submit" class="btn btn-info">Gửi</button>    
                </div> 
                  
                </form>
                <button popovertarget="action-apply-1" popovertargetaction="hide"  class="btn btn-warning my-2">Thoát</button>
            </div>
            <div class="p-3 w-96" id="action-apply-2" popover>
                
                <form method="POST" action="{{route('client.my_team.deny', $considerUser)}}">
                    @csrf
                    <h1 class="text-center uppercase my-2">Xác nhận từ chối</h1>
                    <textarea name="message" class="outline-none p-2" rows="10" id="" placeholder="Tin nhắn..."></textarea>
                   <div class="flex justify-between">
                    
                    <button type="submit" class="btn btn-info">Gửi</button>    
                </div> 
                  
                </form>
                <button popovertarget="action-apply-2" popovertargetaction="hide"  class="btn btn-warning my-2">Thoát</button>
            </div>

            
        </div>
       
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