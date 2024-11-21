<div>
   <nav class="container-nav-bar" id="side-bar">
    <ul class="container-nav-bar-ul py-2">
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
            <a href="{{route('client.users.index')}}"><i class="fa-solid fa-pen-nib"></i>Viết bài mới</a> 
            <ul class="child-nav border shadow-md p-1">
                @foreach ($esports as  $esport)
                    <li><a href="{{route('client.write_by_esport',[
                        'esport_id' => $esport->id,
                    ])}}"><i class="fa-solid fa-pen-clip text-gray-900"></i> {{$esport->esport_name}}</a></li>
                @endforeach
                
              
            </ul>
        </li>
    </ul>
    {{-- //
    //
    // --}}
    <hr />
    
    <ul class="container-nav-bar-ul py-2">
        <li class=""><a href=""><i class="fa-solid fa-user"></i><span>{{Auth::user()->name}}</span></a> </li>
        @forelse ($menus['mType2'] as $menu)
            <li class=""><a href="{{$menu->route ? route($menu->route): ""}}"><i class="{{$menu->icon}}"></i><span>{{$menu->menu_name}}</span></a> </li>
        @empty
            
        @endforelse
    </ul>
  </nav>
</div>
