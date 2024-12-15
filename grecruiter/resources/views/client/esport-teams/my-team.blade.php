@extends('client.page')
@section('user-main-content')
<script>
    $(function() {
      $( "#tabs" ).tabs();
    } );
</script>
    <div class="container">
      <div class="container-1-4">
        <!-- menu left side -->
        @include('client.layouts.side-bar')
        <!-- main content -->
        <div class="main-content">
            <div class="container" id="tab-info-2" style=" margin-top: 20px">
                @if (!isset($team))
                    <h1>Anh bạn này chưa gia nhập đội tuyển nào!</h1>      
                @else
                
                <div class="team-info ">
                  <div class="w-[50%] border p-2 rounded">
                   <div  class="pb-2 change-profile relative">
                   
                    <label for="avatar_team">
                      <img
                      id="show_avatar_team"
                        class="side-1-avatar"
                        src="/storage{{$team->avatar}}"
                        alt=""
                        accept="image/*"
                      />
                     
                     </label>
                    <button onclick="change_avatar_team.showModal()" class="
                    inline-flex items-center rounded py-1 px-3 bg-purple-700 text-white hover:bg-purple-900
                    absolute top-0 left-2 translate-y-1/2
                    ">
                        Thay ảnh đại diện
                    </button>
                    <dialog id="change_avatar_team" class="modal">
                        <div class="modal-box">
                          <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                          </form>
                          <h3 class="text-lg font-bold">Tải hình ảnh lên</h3>
                          <form action="{{route('my_team.handle_avatar')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <img src="" id="avatar_preview" class="w-full my-3 rounded" alt="">
                            <input type="file" name="avatar" accept="image/*" class="file-input file-input-bordered" onchange="document.getElementById('avatar_preview').src = window.URL.createObjectURL(this.files[0])">
                            
                            <button type="submit" class="btn btn-primary w-full my-3">Upload</button>
                            </form>
                        </div>
                      </dialog>
                    </div>
                    
                    
                    <form class="py-2 change-profile flex items-center gap-2" method="post" action="{{route('client.update_name_team')}}">
                      @csrf
                      <input type="text" name="name" class="input input-bordered" value="{{$team->name}}"> 
                      <button type="submit" class="btn btn-info my-1">Đổi tên</button>
                    </form>
                    <div class=" justify-center"> 
                    
                      
                      <dialog id="status_recruit_modal" class="modal">
                        <div class="modal-box max-w-2xl">
                          <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                          </form>
                          <h3 class="text-lg font-bold my-2">Trạng thái tuyển dụng</h3>
                          <div role="tablist" class="tabs tabs-lifted ">
                              <form action="{{route('client.update_recruit_my_team')}}" class="w-full" method="POST">
                                @csrf
                                <textarea name="recruiting_status" class=" w-full textarea textarea-bordered" id="" rows="10">{{$team->recruiting_status}}</textarea>
                                <div class="flex justify-end">
                                  <button type="submit" class="btn btn-success my-2">Lưu</button>
                                </div>
                                
                              </form>
                          
                            
                          
                           
                          </div>
                        </div>
                      </dialog>
                    </div>
                    <hr />
                    <form action="{{route('client.update_esport_my_team')}}" class="side-1-esport change-profile" method="post" >
                      @csrf
                      <img
                        src="/storage{{$team->esport->icon}}"
                        height="30px"
                        width="30px"
                        alt=""
                      />
                      
                      <select name="esport_id" id="" class="select select-bordered">
                          @foreach ($esports as $eps )
                          <option value="{{$eps->id}}" {{$team->esport->id == $eps->id ? "selected" : ""}}>{{$eps->esport_name}}</option>
                          @endforeach    
                      </select>
                      <button type="submit" class="btn btn-primary">Chọn</button>
                      {{-- <h3><i>{{$team->esport->esport_name}}</i></h3> --}}
                    </form>
                    <p class="founder"><strong><i class="fa-solid fa-user-tie"></i> :</strong> 
                    @foreach ($team->users as $founder )
                            {{$founder->name." / "}}
                    @endforeach
                        
                    </p>
                    <i class="created_at"> <strong><i class="fa-solid fa-calendar-days"></i> : </strong> {{$team->created_at->format('Y-d-m')}} </i>
                    
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg border my-2">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                                <tr>
                                    <th scope="col" class="px-2 py-1">
                                        Tuyển thủ
                                    </th>
                                    <th scope="col" class="px-2 py-1">
                                       Vị trí
                                  </th>
                                    <th scope="col" class="px-2 py-1">
                                        Loại bỏ
                                    </th>
                                    
                                   
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($members as $member )
                              <tr class="odd:bg-white  even:bg-gray-50 ev border-b ">
                                <th scope="row" class="px-2 py-1 font-medium text-gray-900 whitespace-nowrap ">
                                    <strong>{{$member->name}}</strong>
                                    <br />
                                    <i>{{$member->nickname}}</i>
                                </th>
                                <td class="px-2 py-1">
                                    {{optional($member->position)->position_name}}
                                  </td>
                                <td class="px-2 py-1 text-center">
                                    {{-- <a href="{{route('client.kick_my_member', $member->id)}}"><svg xmlns="http://www.w3.org/2000/svg" width="1.2em" height="1.2em" viewBox="0 0 24 24">
                                        <g fill="none">
                                          <path d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z" />
                                          <path fill="currentColor" d="M16 14a5 5 0 0 1 5 5v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-1a5 5 0 0 1 5-5zM12 2a5 5 0 1 1 0 10a5 5 0 0 1 0-10m10 8a1 1 0 0 1 .117 1.993L22 12h-4a1 1 0 0 1-.117-1.993L18 10z" />
                                        </g>
                                      </svg>
                                    </a> --}}
                                    <form action="{{route('client.kick_my_member', $member->id)}}" method="GET">
                                        <button class="btn-xs bg-red-600 text-white rounded" type="submit" onclick="return confirm('Chắc chắn loại bỏ thành viên: {{$member->name}}')">Loại bỏ</button>
                                    </form>
                                </td>
                                
                                
                            </tr>
                              @endforeach
                                
                                </tbody>
                        </table>
                      </div>
                  </div>
                  <div class="team-info-side">
                    <div class="p-2 border shadow rounded my-2">
                        <h2 class="divider divider-start text-lg uppercase text-red-800 font-bold rounded">Trạng thái tuyển dụng</h2>
                        {{$team->recruiting_status}}
                        <span><button class="link link-accent" onclick="status_recruit_modal.showModal()">Chỉnh sửa</button></span>
                    </div>
                    <details class="border shadow p-2 rounded mb-2" open>
                      <summary>
                        <h2 class="divider divider-start text-lg uppercase text-red-800 font-bold rounded">
                          Giới thiệu
                          
                        </h2>
                      </summary>
                      <div class="p-2">
                        {{$team->description}} 
                        <span><button class="link link-accent" onclick="form_description_modal.showModal()">Chỉnh sửa</button></span>
                      
                      </div>
                     
                      <dialog id="form_description_modal" class="modal">
                        <div class="modal-box">
                          <form method="dialog">
                            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                          </form>
                          <h3 class="text-lg font-bold">Chỉnh sửa giới thiệu</h3>
                          <form class="team-introduce-content" method="POST" action="{{route('client.update_information_team')}}">
                            @csrf
                            <textarea name="description"  id="" rows="10" class="textarea textarea-bordered">{!!$team->description!!}</textarea>
                            <button type="submit" class="btn btn-success my-2">Lưu</button>
                          </form>
                        </div>
                      </dialog>
            
                      
                    </details>
                    <div class="" id="introduce-tab">
                      <div class="main-text-part" id="tabs">
                       <ul class="flex gap-2">
                        {{-- <button  class="tab-right btn  btn-info active" title="posts-of-team">Bài viết</button>
                        <button class="tab-right btn  btn-success" title="apply-of-team">Danh sách đăng ký gia nhập</button>
                        <button class="tab-right btn  btn-warning" title="consider-of-team">Danh sách xem sau</button>
                        <button class="tab-right btn  btn-error" title="recruit-of-team">Lời mời đã gửi</button> --}}
                        <li><a href="#tabs-1"   class="tab-right btn  btn-info active" title="posts-of-team">Bài viết</a></li>
                        <li><a href="#tabs-2" class="tab-right btn  btn-success" title="apply-of-team">Danh sách đăng ký gia nhập</a></li>
                        <li><a href="#tabs-3" class="tab-right btn  btn-warning" title="consider-of-team">Danh sách xem sau</a></li>
                        <li><a href="#tabs-4" class="tab-right btn  btn-error" title="recruit-of-team">Lời mời đã gửi</a></li>
                       </ul>
                      <div id="tabs-1">
                        <button class="btn-xs bg-slate-500 rounded text-white mt-3" onclick="create_post_team.showModal()">Đăng bài</button>
                        <dialog id="create_post_team" class="modal">
                          
                          <div class="modal-box w-11/12 max-w-5xl">
                            <form method="dialog">
                              <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                            </form>
                            <h3 class="text-lg font-bold">Đăng bài</h3>
                            <div class="modal-action flex flex-col">
                              <button class="" onclick="add_category.showModal()">Không có thể loại bạn cần? <span class="link">Thêm thể loại</span></button>
                              <dialog id="add_category" class="modal">
                                <div class="modal-box">
                                  <form method="dialog">
                                    <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                                  </form>
                                  <h3 class="text-lg font-bold">Thêm thể loại!</h3>
                                  <form action="{{route('client.my_topic.add')}}" method="POST" class="flex flex-col gap-3">
                                    @csrf
                                    <input type="hidden" name="esport_id" value="{{$team->esport->id}}">
                                    <input type="hidden" name="apply_type_id" value="1">
                                    <label class="input input-bordered flex items-center gap-2">
                                      Tên chủ đề
                                      <input type="text" class="grow" name="topic_name" placeholder="Ví dụ: Cần tuyển HLV" />
                                    </label>
                                      <textarea name="description" id="" rows="10" class="textarea textarea-bordered" placeholder="Mô tả..."></textarea>
                                      <button type="submit" class="btn btn-error">Xác nhận</button>
                                  </form>
                                </div>
                              </dialog>
                              <form action="{{ route('client.handle_write_by_esport', [
                                'esport_id' => $team->esport->id,
                              ]) }}" enctype="multipart/form-data" class="w-full flex flex-col gap-3" method="POST">
                                @csrf
                                <input type="hidden" name="esport_team_id" value="{{$team->id}}" >
                                <input type="hidden" name="apply_type_id" value="2" >
                                <label class="form-control w-full">
                                  <div class="label">
                                    <span class="label-text">Thể loại</span>
                                    
                                  </div>
                                  <select name="topic_id" class="select select-bordered">
                                    @foreach ($topics as $topic )
                                    <option value="{{$topic->id}}">{{$topic->topic_name}}</option>
                                    @endforeach
                                   
                                
                                  </select>
                                
                                </label>
            
                                <label class="form-control w-full">
                                  <div class="label">
                                    <span class="label-text">Vị trí</span>
                                    
                                  </div>
                                  <select name="position_id" class="select select-bordered">
                                    @foreach ($positions as $position )
                                    <option value="{{$position->id}}">{{$position->position_name}}</option>
                                    @endforeach
                                  </select>
                                
                                </label>
                                <hr class="my-4">
                                <label class="input input-bordered flex items-center gap-2">
                                  Tiêu đề:
                                  <input type="text" class="grow" name="title" placeholder="" />
                                </label>
                                <label class="form-control">
                                  <div class="label">
                                    <span class="label-text">Tóm lược</span>
                                    
                                  </div>
                                  <textarea name="abstract" class="textarea textarea-bordered h-24 " placeholder="Tóm tắt"></textarea>
                                  
                                </label>
                                <label class="form-control">
                                  <div class="label">
                                    <span class="label-text">Nội dung</span>
                                    
                                  </div>
                                  <textarea name="content" class="textarea textarea-bordered  allow-editor" placeholder="Nội dung"></textarea>
                                  
                                </label>
                                <label class="form-control w-full">
                                  <div class="label">
                                    <span class="label-text">Ảnh thu nhỏ</span>
                                   
                                  </div>
                                  <input type="file" name="thumbnail" class="file-input file-input-bordered w-full" onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])"/>
                                  <img src="" alt="" id="output" srcset="" class="my-3 rounded">
                                </label>
                                <button type="submit" class="right-3 bottom-0 btn w-full bg-purple-300">Đăng</button>
                              </form>
                              
                            </div>
                          </div>
                        </dialog>
                        @forelse ($team->posts as $post )
                        <div class="w-full border mx-auto bg-white rounded-xl shadow-md overflow-hidden my-3 ">
                            <div class="md:flex">
                                <div class="md:shrink-0">
                                    <img class="h-48 w-full object-cover md:h-full md:w-48" src="/storage{{$post->thumbnail}}">
                                </div>
                                <div class="p-8">
                                    <div class="flex gap-3 items-center uppercase tracking-wide text-sm text-indigo-500 font-semibold">
                                      <span>{{$post->topic->topic_name}}</span> 
                                      <span class="flex w-3 h-3  bg-blue-600 rounded-full"></span>
                                      <span>{{$post->created_at->diffForHumans()}}</span> 
                                    </div>
                                    <hr>
                                    <a href="{{route('client.post.show', $post->slug)}}" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{$post->title}}
                                    </a>
                                    <p class="mt-2 text-slate-500 line-clamp-2">
                                      {{$post->abstract}}
                                    </p>
                                </div>
                            </div>
                        </div>
                        @empty
                            <h1>Team chưa có bài viết nào!</h1>
                        @endforelse
                      </div>
                      <div id="tabs-2">
                           @livewire('profile.my-team-applies')
                      </div>
                      <div id="tabs-3">
                        @livewire('profile.my-team-consider')
                      </div>
                      <div id="tabs-4">
                        @livewire('profile.my-team-invite')
                      </div>
                     
                    </div>
                    <div id="approve-tab"></div>
                  </div>
                </div>
                @endif
                <script>
                    $(document).ready(function () {
                   
                      $('.tab-right').click(function(e) {
                        $('.tab-right').removeClass('active');
                        $(this).addClass('active');
                        $('.box').hide();
                        $('#' + $(this).attr('title')).fadeIn();    
                    });
                    });
                </script>
            
            <script type="text/javascript" src="{{asset('assets/user')}}/assets/froala_editor_4.2.2/js/froala_editor.pkgd.min.js"></script>
            <script>
                var editor = new FroalaEditor('.allow-editor');
            </script>
            </div>
        </div>
      </div>
    </div>

<script>
    // $(document).ready(function () {
    //     var formChanges = $('.change-profile')
    //     const btnSaves = formChanges.find('button[type=submit]')

    //     const formInputs = formChanges.find('input, select, textarea')
      
    //     formInputs.attr('disabled', 'on')
    //     btnSaves.hide()
    //     $("#btn-edited-enable").click(function (e) { 
    //         formInputs.prop('disabled', (i, val)=>{
               
    //             return !val
    //         })
            
    //         btnSaves.toggle()
    //        if($(this).attr('edit-enable')==="on")
    //           $(this).attr('edit-enable',"off")
    //         else $(this).attr('edit-enable', "on")
    //     });
    // });
   
    $(document).ready(function () {
       $('.poster-item').each(function(){
        $(this).children('.poster-item-button-options').hide()
         $(this).children('.poster-item-button').click(function(e){
               $(this).parent().children('.poster-item-button-options').toggle()
         })
       })


       $('#password, #confirm_password').on('keyup', function () {
            if ($('#password').val() == $('#confirm_password').val()) { 
              $('#message').html('Khớp').css('color', 'green');
            } else 
              $('#message').html('Không khớp').css('color', 'red');
            });
    });
    
</script>
<script>
  tippy('[data-tippy-content]');
</script>

@endsection