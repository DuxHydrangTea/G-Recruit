@extends('client.page')
@section('user-main-content')

    <div class="container">
      <div class="container-1-4">
        <!-- menu left side -->
        @include('client.layouts.side-bar')
        <!-- main content -->
        <div class="main-content">
            <div class="bg-gray-100">
                <div class="container mx-auto py-8">
                    <div class="grid grid-cols-4 sm:grid-cols-12 gap-6 px-4">
                        <div class="col-span-4 sm:col-span-3">
                            <div class="bg-white shadow rounded-lg p-6">
                                <div class="flex flex-col items-center">
                                    <div class="relative">
                                        <button onclick="uploadAvatar.showModal()" class="absolute h-6 bg-red-600 text-white rounded-full p-1 text-[10px] flex items-center justify-center border-double border-red-200">Upload</button>
                                        <img src="/storage{{$user->avatar}}" class="w-32 h-32 object-cover bg-gray-300 rounded-full mb-4 shrink-0">
                                        <dialog id="uploadAvatar" class="modal modal-bottom sm:modal-middle">
                                            <div class="modal-box">
                                              <h3 class="text-lg font-bold">Tải ảnh lên</h3>
                                                <div class="">
                                                    <form action="{{route('client.my_profile.change_avatar')}}" class="flex flex-col gap-3" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <input onchange="document.getElementById('output_avatar').src = window.URL.createObjectURL(this.files[0])" type="file" name="avatar" id="avatar" class="file-input file-input-border w-full">
                                                        <img src="" id="output_avatar" class="aspect-square rounded object-cover" alt="">
                                                        <button type="submit" class="btn bg-blue-500 text-white rounded-full px-4 w-fit">Upload</button>
                                                    </form>
                                                </div>
                                              <div class="modal-action">
                                                <form method="dialog">
                                                  <!-- if there is a button in form, it will close the modal -->
                                                  <button class="btn">Đóng</button>
                                                </form>
                                              </div>
                                            </div>
                                          </dialog>
                                    </div>
                                   
                                    <h1 class="text-xl font-bold">{{$user->name}}</h1>
                                    <p class="text-gray-700">
                                        @if($user->esport_team_id)
                                            Sở hữu đội tuyển <a href="" class="block link link-info">{{optional($user->esportTeam)->name}}</a>
                                        @endif
                                    </p>
                                    <div class="mt-6 flex flex-wrap gap-4 justify-center">
                                        @if(!$user->getTeamBelong())
                                        <a href="#" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Tuyển dụng tôi</a>
                                        @endif
                                        @if($user->id == auth()->user()->id)
                                        <a href="{{route('client.my_profile_change_ui')}}" class="bg-gray-300 hover:bg-gray-400 text-gray-700 py-2 px-4 rounded">Chỉnh sửa</a>
                                        @endif
                                    </div>
                                </div>
                                <hr class="my-6 border-t border-gray-300">
                                <div class="flex flex-col">
                                    <div class="">
                                        <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Bộ môn</span>
                                        <p class="mb-2 ml-2">{{optional($user->esport)->esport_name}}</p>
                                    </div>
                                    <div class="">
                                        <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Mức xếp hạng</span>
                                        <p class="mb-2 ml-2">{{optional($user->rank)->rank_name}}</p>
                                    </div>
                                    <div class="">
                                        <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Số điểm hạng</span>
                                        <p class="mb-2 ml-2">{{$user->points ?? 'Không có'}}</p>
                                    </div>
                                    <div class="">
                                        <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Vị trí</span>
                                        <p class="mb-2 ml-2">{{optional($user->position)->position_name ?? 'Không có'}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-4 sm:col-span-9">
                            <div class="bg-white shadow rounded-lg p-6 mb-6">
                                <div class="flex gap-[150px]">
                                    <div class="flex flex-col">
                                        <div class="">
                                            <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Thư điện tử</span>
                                            <p class="mb-2 ml-2">{{$user->email}}</p>
                                        </div>
                                        <div class="">
                                            <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Địa chỉ</span>
                                            <p class="mb-2 ml-2">{{$user->address}}</p>
                                        </div>
                                        <div class="">
                                            <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Số điện thoại</span>
                                            <p class="mb-2 ml-2">{{$user->phone}}</p>
                                        </div>
                                        <div class="">
                                            <span class="text-gray-700 uppercase font-bold tracking-wider mb-2">Ngày sinh</span>
                                            <p class="mb-2 ml-2">{{$user->birthday}}</p>
                                        </div>
                                    </div>
                                    <div class="flex flex-col">
                                        <div class="">
                                            <span class="text-gray-700 uppercase font-bold tracking-wider mb-3">Ưu điểm</span>
                                           <ul class="list-disc ml-5">
                                            <li class="mb-3"><p class="mb-2 ml-2">{{$user->advantage_1}}</p></li>
                                            <li class="mb-3"><p class="mb-2 ml-2">{{$user->advantage_2}}</p></li>
                                            <li class="mb-3"><p class="mb-2 ml-2">{{$user->advantage_3}}</p></li>
                                           </ul>
                                            
                                        </div>
                                       
                                    </div>
                                </div>
                                
                            </div>
                            <div class="bg-white shadow rounded-lg p-6 mb-6">
                                <h2 class="text-xl font-bold mb-4">Về tôi</h2>
                                <p class="text-gray-700">
                                    {{$user->bio}}
                                </p>
            
                                <h3 class="font-semibold text-center mt-3 -mb-2">
                                    Tìm tôi tại
                                </h3>
                                <div class="flex justify-center items-center gap-6 my-6">
                                    <a class="text-gray-700 hover:text-orange-600" aria-label="Visit TrendyMinds LinkedIn" href=""
                                        target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-6">
                                            <path fill="currentColor"
                                                d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="text-gray-700 hover:text-orange-600" aria-label="Visit TrendyMinds YouTube" href=""
                                        target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" class="h-6">
                                            <path fill="currentColor"
                                                d="M549.655 124.083c-6.281-23.65-24.787-42.276-48.284-48.597C458.781 64 288 64 288 64S117.22 64 74.629 75.486c-23.497 6.322-42.003 24.947-48.284 48.597-11.412 42.867-11.412 132.305-11.412 132.305s0 89.438 11.412 132.305c6.281 23.65 24.787 41.5 48.284 47.821C117.22 448 288 448 288 448s170.78 0 213.371-11.486c23.497-6.321 42.003-24.171 48.284-47.821 11.412-42.867 11.412-132.305 11.412-132.305s0-89.438-11.412-132.305zm-317.51 213.508V175.185l142.739 81.205-142.739 81.201z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="text-gray-700 hover:text-orange-600" aria-label="Visit TrendyMinds Facebook" href=""
                                        target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" class="h-6">
                                            <path fill="currentColor"
                                                d="m279.14 288 14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="text-gray-700 hover:text-orange-600" aria-label="Visit TrendyMinds Instagram" href=""
                                        target="_blank">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="h-6">
                                            <path fill="currentColor"
                                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                                            </path>
                                        </svg>
                                    </a>
                                    <a class="text-gray-700 hover:text-orange-600" aria-label="Visit TrendyMinds Twitter" href=""
                                        target="_blank">
                                        <svg class="h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                            <path fill="currentColor"
                                                d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                                <hr>
            
                                <h2 class="text-xl font-bold mt-6 mb-4">Thời gian hoạt động</h2>
                               <ul class="ml-6">
                               
                                    @forelse ($timelines as $timeline)
                                    <li class="list-disc">
                                    <div class="mb-6">
                                        <div class="flex justify-between flex-wrap gap-2 w-full">
                                            <span class="text-gray-700 font-bold">   Bắt đầu: {{$timeline->start_time}} - Kết thúc:  {{$timeline->end_time}}</span>
                                           
                                           
                                        </div>
                                        <p class="mt-2 ">
                                            {{$timeline->description}}
                                        </p>
                                    </div>
                                </li>
                                    @empty
                                        <h1>Chưa có hoạt động nào!</h1>
                                    @endforelse
                               
                               </ul>
                               
                               
                               
                            </div>
                            <div class="bg-white shadow rounded-lg p-6 mb-6">
                                <h1 class="text-gray-700 uppercase font-bold tracking-wider mb-2">Bài viết đã đăng</h1>
                               <ul>
                                @forelse ($user->posts->sortByDesc('id') as $post )
                                <li class="my-3 relative ">
                                    
                                    <div class="dropdown dropdown-bottom dropdown-end absolute top-0 right-0 ">
                                        <button class=" p-3 rounded shadown  border">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <ul tabindex="0" class="dropdown-content menu bg-base-100 border-black   rounded-box z-[1] w-52 p-2 shadow">
                                          <li class=""><a href="{{route('client.my_post.edit', $post->slug)}}" class="text-yellow-500 hover:bg-yellow-500"> Sửa</a></li>
                                          <li><a href="{{route('client.my_post.private', $post->slug)}}" class="text-blue-600 hover:bg-blue-500">Ẩn</a></li>
                                          <li><a href="{{route('client.my_post.force_delete', $post->slug)}}" class="text-red-600 hover:bg-red-500">Xoá</a></li>
                                        </ul>
                                      </div>
                                      @if($post->is_privated) <p class="absolute block p-1 bg-red-500 text-white rounded">Riêng tư</p> @endif
                                    <a href="{{route('client.post.show', $post->slug)}}" class="flex  items-center bg-white border border-gray-200 rounded-lg shadow w-full hover:bg-gray-100 ">
                                          <img class="object-cover m-2 aspect-video rounded h-44" src="/storage{{$post->thumbnail}}" alt="">
                                          <div class="flex flex-col justify-between p-4 leading-normal">
                                              <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">{{$post->title}}</h5>
                                              <p>- {{$post->created_at->diffForHumans()}}</p>
                                              <p class="mb-3 font-normal text-gray-700 line-clamp-3">{{$post->abstract}}</p>
                                          </div>
                                    </a>
                              </li>
                                @empty
                                    
                                @endforelse
                               
                               </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>


<script>
  tippy('[data-tippy-content]');
</script>
@endsection