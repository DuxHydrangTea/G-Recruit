<div class="list-esport-main">
    @foreach ( $users as $user )  
        <div class="list-player-main-item">
            <img src="{{asset('storage/images').'/'.$user->avatar}}" alt="" >
            <div class="player-item-details">
                <p class="player-nickname">
                    {{$user->nickname}}
                </p>
                <h2>{{$user->name}}</h2>
                <a href="{{route('client.other_profile', $user->id)}}">View Profile</a>
                <div class="advantage">
                    <p> <i class="fa-solid fa-thumbs-up"></i>{{$user->advantage_1}}</p>
                    <p> <i class="fa-solid fa-thumbs-up"></i>{{$user->advantage_2}}</p>
                    <p> <i class="fa-solid fa-thumbs-up"></i>{{$user->advantage_3}}</p>
                </div>
            </div>
        </div>
    @endforeach
</div>