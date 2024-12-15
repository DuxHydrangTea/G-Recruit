<div class="grid  grid-cols-3 gap-4">
    @foreach ( $users as $user )  
    <a href="{{route('client.my_profile_v2', $user->id)}}" class=" block max-w-sm bg-white shadow-lg rounded-lg overflow-hidden my-4">
        <img class="w-full h-56 object-cover object-center" src="/storage{{$user->avatar}}" alt="avatar">
        <div class="flex items-center px-6 py-3 bg-gray-900">
           
            <h1 class="mx-3 text-white font-semibold text-lg">{{$user->nickname}}</h1>
        </div>
        <div class="py-4 px-6">
            <h1 class="text-2xl font-semibold text-gray-800">{{$user->name}}</h1>
            <p class=" text-lg text-gray-700 line-clamp-3">{{$user->bio ?? "Không có thông tin"}}</p>
            <div class="flex items-center mt-4 text-gray-700">
                <img src="/storage{{optional($user->esport)->icon}}" class="w-[20px] h-[20px]" alt="">
                <h1 class="px-2 text-sm">{{optional($user->esport)->esport_name}}</h1>
            </div>
            <div class="flex items-center mt-4 text-gray-700">
                <img src="/storage{{optional($user->rank)->icon}}" class="w-[20px] h-[20px]" alt="">
                <h1 class="px-2 text-sm">{{optional($user->rank)->rank_name}}</h1>
            </div>
            <div class="flex items-center mt-4 text-gray-700">
                <svg class="h-6 w-6 fill-current" viewBox="0 0 512 512">
                    <path d="M437.332 80H74.668C51.199 80 32 99.198 32 122.667v266.666C32 412.802 51.199 432 74.668 432h362.664C460.801 432 480 412.802 480 389.333V122.667C480 99.198 460.801 80 437.332 80zM432 170.667L256 288 80 170.667V128l176 117.333L432 128v42.667z"/>
                </svg>
                <h1 class="px-2 text-sm">{{$user->email}}</h1>
            </div>
        </div>
    </a>
    @endforeach
</div>