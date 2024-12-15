<div>
   <nav class="container-nav-bar" id="side-bar">
    {{-- <ul class="container-nav-bar-ul py-2">
        @forelse ($menus['mType1'] as $menu)
            <li wire:click="updateSeletion({{$menu->id}})" class="{{$menu->id == $orderSelect ? 'active' : ''}}" ><a href="{{$menu->route ? route($menu->route): ""}}"><i class="{{$menu->icon}}"></i>{{$menu->menu_name}}</a> </li>
        @empty
            
        @endforelse
        <li>
            <a href="{{route('client.users.index')}}"><i class="fa-solid fa-user-group"></i>Người dùng</a> 
            <ul class="child-nav border shadow-md p-1">
                @foreach ($esports as  $esport)
                    <li><a href="{{route('client.users.index')}}?esport={{$esport->id}}"><i class="fa-solid fa-users"></i> {{$esport->esport_name}}</a></li>
                @endforeach
                
              
            </ul>
        </li>

        <li>
            <a href="#"><i class="fa-solid fa-pen-nib"></i>Viết bài mới</a> 
            <ul class="child-nav border shadow-md p-1">
                @foreach ($esports as  $esport)
                    <li><a href="{{route('client.write_by_esport',[
                        'esport_id' => $esport->id,
                    ])}}"><i class="fa-solid fa-pen-clip text-gray-900"></i> {{$esport->esport_name}}</a></li>
                @endforeach
                
              
            </ul>
        </li>

        <li>
            <a href="{{route('client.esport_teams.index')}}"><i class="fa-solid fa-people-group"></i>Các đội tuyển</a> 
            <ul class="child-nav border shadow-md p-1">
                @foreach ($esports as  $esport)
                    <li><a href="{{route('client.esport_teams.index')}}?esport={{$esport->id}}"><i class="fa-solid fa-people-group"></i> {{$esport->esport_name}}</a></li>
                @endforeach
                
              
            </ul>
        </li>

    </ul> --}}
    {{-- //
    //
    // --}}
    {{-- <hr /> --}}
{{--     
    <ul class="container-nav-bar-ul py-2">
        <li class=""><a href=""><i class="fa-solid fa-user"></i><span>{{Auth::user()->name}}</span></a> </li>
        @forelse ($menus['mType2'] as $menu)
            <li class=""><a href="{{$menu->route ? route($menu->route): ""}}"><i class="{{$menu->icon}}"></i><span>{{$menu->menu_name}}</span></a> </li>
        @empty
            
        @endforelse
    </ul> --}}


    <ul class="menu bg-base-100 rounded-box w-56">
        @forelse ($menus['mType1'] as $menu)
            <li  class=" {{$menu->id == $orderSelect ? 'active' : ''}} " ><a href="{{$menu->route ? route($menu->route): ""}}" class="hover:bg-red-400"><i class="{{$menu->icon}}"></i>{{$menu->menu_name}}</a> </li>
        @empty
       @endforelse
       <li><a href="{{route('client.users.index')}}" class="hover:bg-red-400"><i class="fa-solid fa-users"></i> Người dùng</a> </li>
        
        <li>
            <details open>
                <summary><h2 class="menu-title"><i class="fa-solid fa-people-group"></i> Đội tuyển</h2></summary>

                <ul>
                    <li><a href="{{route('client.esport_teams.index')}}" class="hover:bg-red-400"> Tất cả</a></li>
                    @foreach ($esports as  $esport)
                    <li><a href="{{route('client.esport_teams.index')}}?esport={{$esport->id}}" class="hover:bg-red-400"> {{$esport->esport_name}}</a></li>
                @endforeach
                </ul>
              </details>
            </li>

       <hr>
       <li>
        <details open>
            <summary><h2 class="menu-title"><i class="fa-solid fa-pencil"></i> Viết bài</h2></summary>
            <ul>
               
                @foreach ($esports as  $esport)
                <li><a href="{{route('client.write_by_esport',[
                        'esport_id' => $esport->id,
                    ])}}" class="hover:bg-red-400"> {{$esport->esport_name}}</a></li>
                @endforeach
            </ul>
          </details>
        </li>

       @forelse ($menus['mType2'] as $menu)
       <li  class="{{$menu->id == $orderSelect ? 'active' : ''}}" ><a href="{{$menu->route ? route($menu->route): ""}}" class="hover:bg-red-400"><i class="{{$menu->icon}}"></i>{{$menu->menu_name}}</a> </li>
   @empty
  @endforelse
      </ul>
  </nav>
</div>
