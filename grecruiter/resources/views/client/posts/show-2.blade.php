@extends('client.page', [
    'title' => $p->title
])
@section('user-main-content')
<link rel="stylesheet" href="/assets/user/assets/css/listpost.css" />

<div class="container">
    <div class="container-1-4">
        @include('client.layouts.side-bar')
      <div class="main-content">
        <main class="bg-white pb-16 pt-8 lg:pb-24 lg:pt-16">
            <img src="/storage{{$p->thumbnail}}" class="w-full rounded max-h-[400px] object-cover border shadow mb-4" alt="">
            <div class="mx-auto flex max-w-screen-xl justify-between px-4">
              
                <article class="format flex format-sm sm:format-base lg:format-lg format-blue dark:format-invert mx-auto w-full max-w-6xl gap-4">
                
                    <div class="flex-[2]">
                        <header class="not-format mb-4 lg:mb-6">
                            
                            <address class="mb-6 flex items-center not-italic">
                            <div class="mr-3 inline-flex items-center text-sm text-gray-900 ">
                                <img class="mr-4 h-16 w-16 rounded-full" src="/storage{{$p->user->avatar}}" alt="Jese Leos" />
                                <div>
                                <a href="#" rel="author" class="text-xl font-bold text-gray-900 ">{{$p->user->name}}</a>
                                <p class="text-base text-gray-500 font-italic">Tác giả bài viết</p>
                                <p class="text-base text-gray-500 "><time pubdate datetime="2022-02-08" title="February 8th, 2022">{{$p->created_at->diffForHumans()}}</time></p>
                                </div>
                            </div>
                            </address>
                            <h1 class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl ">{{$p->title}}</h1>
                        </header>
                        <div class="content">
                            {!!$p->content!!}
                        </div>
                    </div>
                    
                    <section class="not-format flex-1">
                    <a title="Thích" href="{{route('client.interaction.like', $p->id)}}" class="flex items-center btn-xs  border {{ $p->isLiked() ? "bg-blue-500 text-white" : "bg-white-500" }} border-blue-500  w-fit px-3 rounded my-3 "> {{count($p->likes)}} lượt thích</a>
                    <form action="{{route('client.interaction.comment', $p->id)}}" method="POST" class="mb-6">
                        @csrf
                        <div class="mb-4 rounded-lg rounded-t-lg border border-gray-200 bg-white px-4 py-2 ">
                        <label for="comment" class="sr-only">Bình luận</label>
                        <textarea id="comment" name="comment_text" rows="6" class="w-full border-0 px-0 text-sm text-gray-900 focus:ring-0 outline-none " placeholder="Viết nội dung bình luận..." required></textarea>
                            @error('comment_text')
                                <p class="text-red-500">{{message}}</p>
                            @enderror
                    </div>
                        <button type="submit" class="btn btn-primary">Gửi bình luận</button>
                    </form>
                    @forelse ($p->comments->sortByDesc('id') as $comment )
                    <article class="mb-6 rounded-lg border p-2 bg-white text-base ">
                        <div class="mb-2 flex items-center justify-between mt-0">
                        <div class="flex items-center">
                            <p class="mr-3 inline-flex items-center text-sm font-semibold text-gray-900 "><img class="mr-2 h-6 w-6 rounded-full" src="/storage{{$comment->user->avatar}}" alt="Michael Gough" />{{$comment->user->name}}</p>
                            <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate datetime="2022-02-08" title="February 8th, 2022">- {{$comment->created_at->diffForHumans()}}</time></p>
                        </div>
                        <button id="dropdownComment1Button" data-dropdown-toggle="dropdownComment1" class="inline-flex items-center rounded-lg bg-white p-2 text-center text-sm font-medium text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-50  dark:text-gray-400 dark:hover:bg-gray-700 " type="button">
                            <svg class="h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
                            </svg>
                            <span class="sr-only">Comment settings</span>
                        </button>
                        <!-- Dropdown menu -->
                    
                        </div>
                        <p>{{$comment->comment_text}}</p>
                    </article>
                    @empty
                        <h3>Chưa có bình luận nào!</h3>
                    @endforelse
                    
            
                    </section>
              </article>
            </div>
          </main>
      </div>

      <!-- // -->
    </div>
  </div>
@endsection



