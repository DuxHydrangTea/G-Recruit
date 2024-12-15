@extends('client.page')
@section('user-main-content')
    

    <div class="container">
      <div class="container-1-4">
        <!-- menu left side -->
       @include('client.layouts.side-bar')
            {{-- side bar --}}
        <!-- main content -->
        <div class="main-content">
            <ul class="list-user w-1/2">
                @forelse ($teams as  $team)
                <li class="detail-parent list-user-item flex gap-3 my-3 p-2 border rounded shadow-sm relative">
                    @if($team->is_recruiting) <p class=" block absolute -top-4 -left-4 p-1 text-sm bg-red-400 shadow-md text-white rounded-sm z-10"> Đang tuyển dụng </p>
                        @if(Auth::user()->canBeApply())
                                @if(Auth::user()->isApply($team->id))
                                    <a href="{{route('client.esport_teams.apply', $team->id)}}" class="	 block absolute bottom-2 right-2 btn btn-dark">Huỷ ứng tuyển</a>
                                @else
                                    <button popovertarget="team-profile-{{$team->id}}" class="	 block absolute bottom-2 right-2 btn btn-primary">Ứng tuyển</button>
                                    <div id="team-profile-{{$team->id}}" class="rounded max-w-2xl p-3" popover>
                                        <button popovertarget="team-profile-{{$team->id}}" popovertargetaction="hide" class="btn btn-danger">Thoát</button>
                                        <form action="{{route('client.esport_teams.apply_with_form', $team->id)}}" method="POST" class="flex flex-col gap-2" enctype="multipart/form-data">
                                            @csrf
                                            <h1 class="text-lg uppercase text-center">Biểu mẫu xin ứng tuyển</h1>
                                            <hr>
                                            <p>CV PDF đi kèm:</p>
                                            <input type="file" name="pdf_cv" accept=".pdf">
                                            <hr>
                                            <p>Tin nhắn:</p>
                                            <textarea name="message"  id="example" rows="10" placeholder="Tin nhắn đi kèm..." class="p-1 outline-none"></textarea>
                                            <button type="submit" class="btn btn-primary text-blue-500">Gửi</button>
                                        </form>
                                    </div>
                                @endif
                            @endif
                    @endif

                        
                    <div class="list-user-item-avatar h-32 relative">
                        
                        <img src="storage{{$team->avatar}}" class="h-full aspect-square object-cover rounded" alt="">
                    </div>
                    <div class="list-user-item-abstract w-full">
                      <button popovertarget="team-profile-{{$team->id}}"><h2 class=" font-weight-bold my-1 text-lg"> <span class="font-weight-bold uppercase">{{$team->name}}</h2></button>  
                      <hr>
                      <div class="my-1">
                            {{-- <p class="block py-1 px-3  rounded-sm text-white w-fit my-2"  >{{$team->name}}</p> --}}
                            <p class="flex items-center gap-2"> <img src="storage/images/{{$team->esport->icon}}" class="max-w-7 max-h-7 rounded-full" alt=""> {{$team->esport->esport_name}} </p>
                            <p><i class="fa-solid fa-people-group"></i> - {{count($team->members)}} thành viên </p>
                            <div class="flex justify-end">
                                
                           </div>
                            
                        </div>
                        
                    </div>

                    <div class="detail-child flex rounded bg-white absolute left-full w-full top-0 z-10  border shadow-sm p-2">
                        <div class="flex-1 p-3 flex flex-col gap-2">
                            <h1 class="uppercase text-lg text-center">trạng thái tuyển dụng</h1>
                            <div class=" line-clamp-5">
                                {!!$team->recruiting_status?? "Chưa có thông tin thêm!"!!}
                            </div>
                            <hr>
                            <h1 class="uppercase text-lg text-center">giới thiệu</h1>
                            <div class="flex items-center gap-2 ">
                                <div class="line-clamp-5">
                                    {!!$team->description!!}
                                </div>
                               
                            </div>
                            <a href="{{route('client.esport.info', $team->id)}}" class="btn btn-primary">Xem thông tin</a>
                        </div>
                        <div class="flex-1 border-l-2 border-l-slate-200 p-3 ">
                            <h1 class="uppercase text-lg text-center">Bài viết gần đây</h1>
                                @php
                                    $post = $team->getRelatestPost();
                                   
                                @endphp
                              @if($post)
                                <div class="relatest-post border p-1">
                                    <div class="">
                                        <img src="/storage{{$post->thumbnail}}" class="w-full rounded " alt="">
                                    </div>
                                    <div class="relatest-post-heading flex gap-1 items-center my-1">
                                        <img src="storage{{$team->avatar}}" class="max-h-5 max-w-5 rounded-full" alt="">
                                        <div class="">
                                            <h3 class="line-clamp-1">{{$post->title}}</h3>
                                            
                                        </div>
                                       
                                    </div>  
                                    <hr>
                                    <p class="line-clamp-3 text-xs my-1">{{$post->abstract}}</p>
                                   
                                    <div class="flex justify-end">
                                        <a href="{{route('client.post.show', $post->slug)}}" class="link link-secondary"> Xem thêm</a>
                                    </div>
                                </div>
                                @else
                                    <h2>Chưa đăng bài viết nào!</h2>
                                @endif
                        </div>
                 
                    </div>
                </li>
                @empty
                  <h1>Chưa có đội tuyển nào thuộc chuyên môn bạn cần tìm!</h1>
                @endforelse
               
            </ul>
        </div>
        </div>
      </div>
    </div>
    <hr>
    <script type="text/javascript" src="{{asset('assets/user')}}/assets/froala_editor_4.2.2/js/froala_editor.pkgd.min.js"></script>
    <script>
        var editor = new FroalaEditor('#example');
    </script>
  @endsection
{{-- 
    footer --}}

