<ul class="list-user w-full" >
    @forelse ($inviteUsers as  $inviteUser)
    <li class="detail-parent list-user-item flex gap-3 my-3 p-2 border rounded shadow-sm relative">
        <div class="list-user-item-avatar h-32 flex flex-col gap-2">
            <img src="/storage{{$inviteUser->user->avatar}}" class="h-full aspect-square object-cover rounded " alt="">
            <div class="p-1 border">
                <p class="text-center">Mời vào</p>
                <p class="text-center bg-cyan-700 text-white p-1">{{$inviteUser->position->position_name}}</p>
            </div>
        </div>
        <div class="list-user-item-abstract w-full">
          <a href="{{route('client.my_profile_v2', $inviteUser->user->id)}}" data-tippy-content="Xem hồ sơ" id="watch-profile"><h2 class=" font-weight-bold text-lg px-2"> <span class="font-weight-bold text-white uppercase "></span> {{$inviteUser->user->name}}</h2></a>  
          
          <div class="">
                <p class="block rounded-sm  w-fit my-1 font-bold bg-red-200 p-1 text-white"  style="background-color: {{$inviteUser->user->color}}">{{$inviteUser->user->nickname}}</p>
                <div class="flex items-center gap-1"> <img src="/storage{{$inviteUser->user->esport->icon}}" class="max-h-5 aspect-square" alt=""> <span>{{$inviteUser->user->esport->esport_name??"Không có"}}</span> </div>
                <div class="flex items-center gap-1"> <img src="/storage{{$inviteUser->user->rank->icon}}" class="max-h-5 aspect-square" alt="$user->rank->rank_name"> <span>{{$inviteUser->user->rank_points }} điểm</span> </div>
                <div class="message bg-slate-200 p-1">
                    <p class="text-sm italic">Gửi lời mời vào lúc {{$inviteUser->created_at->diffForHumans()}}</p>
                    <hr>
                    {!!$inviteUser->message ?? "Không kèm lời nhắn !"!!}
                </div>
              
            </div>
        </div>
        <div class="flex flex-col gap-2 min-w-32">
            
            <a  href="{{route('client.my_team.un_invite',$inviteUser)}}" class="btn btn-danger">Huỷ lời mời</a>
            <button popovertarget="action-apply-3"   class="btn btn-primary">Sửa lời nhắn</button>
           
            <div class="p-3 w-96" id="action-apply-3" popover>
                <form method="POST" action="{{route('client.my_team.change_message_invite', $inviteUser)}}">
                    @csrf
                    <h1 class="text-center uppercase my-2">Chỉnh sửa lời nhắn</h1>
                    <select name="position_id" id="" class="my-2">
                            @foreach ($positions as $position )
                                    <option value="{{$position->id}}" {{$position->id == $inviteUser->position_id? "select" : ""}}>{{$position->position_name}}</option>
                            @endforeach
                    </select>
                    <textarea name="message" class="outline-none p-2" rows="10" id="" placeholder="Tin nhắn...">{{$inviteUser->message}}</textarea>
                   <div class="flex justify-between">
                    
                    <button type="submit" class="btn btn-info w-full">Xác nhận</button>    
                </div> 
                  
                </form>
              
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