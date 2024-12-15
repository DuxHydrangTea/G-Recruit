<div>
    <div class="list-esport">
        <div class="title-list-bar">
          <h3 class="uppercase">Một số bài viết</h3>
          <h3>Xem thêm</h3>
        </div>
        <div class="list-post-main">
        @foreach ($posts as $p )
        @php
        $author = $p->user_id != 0 ? $p->user: $p->esportTeam 
        @endphp
                <div
                class="border-r border-b border-l border-gray-400 lg:border-t lg:border-gray-400 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
                <img src="/storage{{$p->thumbnail}}" class="w-full mb-3 h-[200px] object-cover">
                <div class="p-4 pt-2">
                    <div class="mb-8">
                        {{-- <p class="text-sm text-gray-600 flex items-center">
                            <svg class="fill-current text-gray-500 w-3 h-3 mr-2" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path
                                    d="M4 8V6a6 6 0 1 1 12 0v2h1a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-8c0-1.1.9-2 2-2h1zm5 6.73V17h2v-2.27a2 2 0 1 0-2 0zM7 6v2h6V6a3 3 0 0 0-6 0z">
                                </path>
                            </svg>
                            Members only
                        </p> --}}
                        <a href="{{route('client.post.show', $p->slug)}}" class="text-gray-900 font-bold text-lg mb-2 hover:text-indigo-600 inline-block">{{$p->title}}</a>
                        <p class="text-gray-700 text-sm line-clamp-3">{{$p->abstract}}</p>
                    </div>
                    <hr class="mb-3">
                    <div class="flex items-center">
                        <a
                            href="#"><img class="w-10 h-10 rounded-full mr-4 object-cover" src="/storage{{$p->user->avatar}}" alt="Avatar of Jonathan Reinink"></a>
                        <div class="text-sm">
                            <a href="#" class="text-gray-900 font-semibold leading-none hover:text-indigo-600">{{$p->user->name}}</a>
                            <p class="text-gray-600">{{$p->created_at->diffForHumans()}}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
           

        </div>
      </div>
</div>
