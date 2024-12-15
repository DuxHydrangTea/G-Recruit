@extends('client.page')
@section('user-main-content')
    <div class="container">
      <div class="container-1-4">
        <!-- menu left side -->
        @include('client.layouts.side-bar')
        <!-- main content -->
        <div class="main-content">
          <div class="cover-image border shadow">
            <img src="/assets/user/assets/images/Frame 7.png" width="100%" alt="" />
            <div class="infor-inner">
              <div class="infor-basic">
                <img
                  src="/storage{{$user->avatar}}"
                  width="100px"
                  height="100px"
                  alt=""
                />
                <div class="infor-name">
                  <h2 class="text-2xl">{{$user->name}}</h2>
                  <p class="" style="">
                    {{$user->nickname}}
                    
                  </p>
                </div>
               
                <a href="" class="btn bg-yellow-50 "
                  ><svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="1.2em"
                    height="1.2em"
                    viewBox="0 0 24 24"
                  >
                    <g fill="none" fill-rule="evenodd">
                      <path
                        d="m12.593 23.258l-.011.002l-.071.035l-.02.004l-.014-.004l-.071-.035q-.016-.005-.024.005l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.017-.018m.265-.113l-.013.002l-.185.093l-.01.01l-.003.011l.018.43l.005.012l.008.007l.201.093q.019.005.029-.008l.004-.014l-.034-.614q-.005-.018-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.004-.011l.017-.43l-.003-.012l-.01-.01z"
                      />
                      <path
                        fill="currentColor"
                        d="M4 3a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2zm4.625 5.63a1.235 1.235 0 0 1 1.715-.992c.504.216 1.568.702 2.916 1.48a28 28 0 0 1 2.74 1.786a1.234 1.234 0 0 1 0 1.98a28 28 0 0 1-2.74 1.784a28 28 0 0 1-2.916 1.482a1.234 1.234 0 0 1-1.715-.992a29 29 0 0 1-.176-3.264c0-1.551.112-2.719.176-3.264"
                      />
                    </g>
                  </svg>
                  Highlight Video</a
                >
              </div>
             
            </div>
          </div>
          <div class="heading-all-tab">
           
           
            <button id="btn-tab-info-1" class="heading-all-tab-button active my-btn">
              Cá nhân</button
            ><button id="btn-tab-info-2" class="heading-all-tab-button my-btn">
              Đội tuyển tham gia
            </button>
          </div>
          <div class="container" id="tab-info-1">
            <div class="main-info">
              <div class="main-info-part">
                <h3>Thông tin cá nhân</h3>
                <form action="{{route('client.my_profile_change')}}" class="change-profile" method="post">
                    @csrf
                    <table>
                        <tr>
                          <td>
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="1.2em"
                              height="1.2em"
                              viewBox="0 0 24 24"
                              {...$$props}
                            >
                              <path
                                fill="currentColor"
                                d="M4.616 19q-.691 0-1.153-.462T3 17.384V6.616q0-.691.463-1.153T4.615 5h14.77q.69 0 1.152.463T21 6.616v10.769q0 .69-.463 1.153T19.385 19zM12 12.116l8-5.231L19.692 6L12 11L4.308 6L4 6.885z"
                              />
                            </svg>
                          </td>
                          <td> {{$user->email}}</td>
                        </tr>
                        <tr>
                          <td>
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="1.2em"
                              height="1.2em"
                              viewBox="0 0 24 24"
                              {...$$props}
                            >
                              <path
                                fill="currentColor"
                                d="M12 11.5A2.5 2.5 0 0 1 9.5 9A2.5 2.5 0 0 1 12 6.5A2.5 2.5 0 0 1 14.5 9a2.5 2.5 0 0 1-2.5 2.5M12 2a7 7 0 0 0-7 7c0 5.25 7 13 7 13s7-7.75 7-13a7 7 0 0 0-7-7"
                              />
                            </svg>
                          </td>
                          <td><textarea type="text" name="address">{{$user->address}}</textarea></td>
                        </tr>
                        <tr>
                          <td>
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="1.2em"
                              height="1.2em"
                              viewBox="0 0 24 24"
                              {...$$props}
                            >
                              <path
                                fill="currentColor"
                                d="m16.556 12.906l-.455.453s-1.083 1.076-4.038-1.862s-1.872-4.014-1.872-4.014l.286-.286c.707-.702.774-1.83.157-2.654L9.374 2.86C8.61 1.84 7.135 1.705 6.26 2.575l-1.57 1.56c-.433.432-.723.99-.688 1.61c.09 1.587.808 5 4.812 8.982c4.247 4.222 8.232 4.39 9.861 4.238c.516-.048.964-.31 1.325-.67l1.42-1.412c.96-.953.69-2.588-.538-3.255l-1.91-1.039c-.806-.437-1.787-.309-2.417.317"
                              />
                            </svg>
                          </td>
                          <td> <input type="text" name="phone" value="{{$user->phone}}"></td>
                        </tr>
                        <tr>
                          <td>
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="1.2em"
                              height="1.2em"
                              viewBox="0 0 256 256"
                              {...$$props}
                            >
                              <path
                                fill="currentColor"
                                d="M152 140a36 36 0 1 1-36-36a36 36 0 0 1 36 36m64-100v176a16 16 0 0 1-16 16H56a16 16 0 0 1-16-16V40a16 16 0 0 1 16-16h144a16 16 0 0 1 16 16m-24 32a8 8 0 0 0-8-8h-32a8 8 0 0 0 0 16h12.69l-18 18A52.08 52.08 0 1 0 158 109.35l18-18V104a8 8 0 0 0 16 0Z"
                              />
                            </svg>
                          </td>
                          <td>Male</td>
                        </tr>
                        <tr>
                          <td>
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="1.2em"
                              height="1.2em"
                              viewBox="0 0 24 24"
                              {...$$props}
                            >
                              <g fill="none">
                                <path
                                  d="m12.594 23.258l-.012.002l-.071.035l-.02.004l-.014-.004l-.071-.036q-.016-.004-.024.006l-.004.01l-.017.428l.005.02l.01.013l.104.074l.015.004l.012-.004l.104-.074l.012-.016l.004-.017l-.017-.427q-.004-.016-.016-.018m.264-.113l-.014.002l-.184.093l-.01.01l-.003.011l.018.43l.005.012l.008.008l.201.092q.019.005.029-.008l.004-.014l-.034-.614q-.005-.019-.02-.022m-.715.002a.02.02 0 0 0-.027.006l-.006.014l-.034.614q.001.018.017.024l.015-.002l.201-.093l.01-.008l.003-.011l.018-.43l-.003-.012l-.01-.01z"
                                />
                                <path
                                  fill="currentColor"
                                  d="M12.6 2.2a1 1 0 0 0-1.2 0a8 8 0 0 0-1.147 1.073C9.73 3.862 9 4.855 9 6a3 3 0 0 0 3 3H6a3 3 0 0 0-3 3v2c0 1.236 1.411 1.942 2.4 1.2l.667-.5a1 1 0 0 1 1.2 0l.266.2a3 3 0 0 0 3.6 0l.267-.2a1 1 0 0 1 1.2 0l.267.2a3 3 0 0 0 3.6 0l.266-.2a1 1 0 0 1 1.2 0l.667.5c.989.742 2.4.036 2.4-1.2v-2a3 3 0 0 0-3-3h-6a3 3 0 0 0 3-3c0-1.145-.73-2.138-1.253-2.727c-.346-.39-.73-.76-1.147-1.073M4 17.415V20a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2.585a1.48 1.48 0 0 1-1.4-.215l-.667-.5a1 1 0 0 0-1.2 0l-.266.2a3 3 0 0 1-3.6 0l-.267-.2a1 1 0 0 0-1.2 0l-.267.2a3 3 0 0 1-3.6 0l-.266-.2a1 1 0 0 0-1.2 0l-.667.5a1.48 1.48 0 0 1-1.4.215"
                                />
                              </g>
                            </svg>
                          </td>
                          <td> <input type="date" name="birthday" value="{{$user->birthday}}"> </td>
                        </tr>
                      </table>
                      <button type="submit" class="submit-outline" onclick="return confirm('Bạn có chắc là muốn thay đổi những thông tin này?')" >Save</button>
                </form>
               
              </div>
              <div class="main-info-part">
                <h3>Chuyên môn</h3>
                <form action="{{route('client.my_profile_change')}}" class="change-profile" method="POST">
                    @csrf
                    <table>
                        <tr>
                          <td><strong>Bộ môn</strong></td>
                          <td>
                         
                            <select name="esport_id" id="">
                                @foreach ($esports as $esport )
                                <option value="{{$esport->id}}" {{$user->esport_id == $esport->id ? "selected" : ""}}>{{$esport->esport_name}}</option>
                                @endforeach
                               
                            </select>
                            
                          </td>
                        </tr>
                        <tr>
                          <td><strong>Xếp hạng</strong></td>
                          <td>
                            <select name="rank_id" id="">
                                @foreach ($ranks as $rank )
                                <option value="{{$rank->id}}" {{$user->rank_id == $rank->id ? "selected" : ""}}>{{$rank->rank_name}}</option>
                            @endforeach
                            </select>
                            
                          </td>
                        </tr>
                        <tr>
                            <td><strong>Điểm</strong></td>
                            <td>
                                 <input type="text" value="{{$user->rank_points}}" name="rank_points"> 
                            </td>
                          </tr>
                        <tr>
                          <td><strong>Vị trí</strong></td>
                          <td>
                            <select name="position_id" id="">
                                @foreach ($positions as $position )
                                    <option value="{{$position->id}}" {{$user->position_id == $position->id ? "selected" : ""}}>{{$position->position_name}}</option>
                                @endforeach
                               
                            </select>
                            
                          </td>
                        </tr>
                        
                      </table>
                      <button type="submit" class="submit-outline" onclick="return confirm('Bạn có chắc là muốn thay đổi những thông tin này?')" >Save</button>
              
                </form>
               
              </div>
              <div class="main-info-part">
                <h3>Ưu điểm</h3>
                <form action="{{route('client.my_profile_change')}}" class="change-profile" method="post">
                    @csrf
                    <table>
                        <tr>
                          <td>
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="1.2em"
                              height="1.2em"
                              viewBox="0 0 24 24"
                              {...$$props}
                            >
                              <path
                                fill="currentColor"
                                d="M18.483 16.767A8.5 8.5 0 0 1 8.118 7.081a1 1 0 0 1-.113.097c-.28.213-.63.292-1.33.45l-.635.144c-2.46.557-3.69.835-3.983 1.776c-.292.94.546 1.921 2.223 3.882l.434.507c.476.557.715.836.822 1.18c.107.345.071.717-.001 1.46l-.066.677c-.253 2.617-.38 3.925.386 4.506s1.918.052 4.22-1.009l.597-.274c.654-.302.981-.452 1.328-.452s.674.15 1.329.452l.595.274c2.303 1.06 3.455 1.59 4.22 1.01c.767-.582.64-1.89.387-4.507z"
                              />
                              <path
                                fill="currentColor"
                                d="m9.153 5.408l-.328.588c-.36.646-.54.969-.82 1.182q.06-.045.113-.097a8.5 8.5 0 0 0 10.366 9.686l-.02-.19c-.071-.743-.107-1.115 0-1.46c.107-.344.345-.623.822-1.18l.434-.507c1.677-1.96 2.515-2.941 2.222-3.882c-.292-.941-1.522-1.22-3.982-1.776l-.636-.144c-.699-.158-1.049-.237-1.33-.45c-.28-.213-.46-.536-.82-1.182l-.327-.588C13.58 3.136 12.947 2 12 2s-1.58 1.136-2.847 3.408"
                                opacity="0.5"
                              />
                            </svg>
                          </td>
                          <td>
                            <textarea name="advantage_1" id="" >{{$user->advantage_1}}</textarea>
                           
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="1.2em"
                              height="1.2em"
                              viewBox="0 0 24 24"
                              {...$$props}
                            >
                              <path
                                fill="currentColor"
                                d="M18.483 16.767A8.5 8.5 0 0 1 8.118 7.081a1 1 0 0 1-.113.097c-.28.213-.63.292-1.33.45l-.635.144c-2.46.557-3.69.835-3.983 1.776c-.292.94.546 1.921 2.223 3.882l.434.507c.476.557.715.836.822 1.18c.107.345.071.717-.001 1.46l-.066.677c-.253 2.617-.38 3.925.386 4.506s1.918.052 4.22-1.009l.597-.274c.654-.302.981-.452 1.328-.452s.674.15 1.329.452l.595.274c2.303 1.06 3.455 1.59 4.22 1.01c.767-.582.64-1.89.387-4.507z"
                              />
                              <path
                                fill="currentColor"
                                d="m9.153 5.408l-.328.588c-.36.646-.54.969-.82 1.182q.06-.045.113-.097a8.5 8.5 0 0 0 10.366 9.686l-.02-.19c-.071-.743-.107-1.115 0-1.46c.107-.344.345-.623.822-1.18l.434-.507c1.677-1.96 2.515-2.941 2.222-3.882c-.292-.941-1.522-1.22-3.982-1.776l-.636-.144c-.699-.158-1.049-.237-1.33-.45c-.28-.213-.46-.536-.82-1.182l-.327-.588C13.58 3.136 12.947 2 12 2s-1.58 1.136-2.847 3.408"
                                opacity="0.5"
                              />
                            </svg>
                          </td>
                          <td>
                            <textarea name="advantage_2" id="" >{{$user->advantage_2}}</textarea>
                           
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <svg
                              xmlns="http://www.w3.org/2000/svg"
                              width="1.2em"
                              height="1.2em"
                              viewBox="0 0 24 24"
                              {...$$props}
                            >
                              <path
                                fill="currentColor"
                                d="M18.483 16.767A8.5 8.5 0 0 1 8.118 7.081a1 1 0 0 1-.113.097c-.28.213-.63.292-1.33.45l-.635.144c-2.46.557-3.69.835-3.983 1.776c-.292.94.546 1.921 2.223 3.882l.434.507c.476.557.715.836.822 1.18c.107.345.071.717-.001 1.46l-.066.677c-.253 2.617-.38 3.925.386 4.506s1.918.052 4.22-1.009l.597-.274c.654-.302.981-.452 1.328-.452s.674.15 1.329.452l.595.274c2.303 1.06 3.455 1.59 4.22 1.01c.767-.582.64-1.89.387-4.507z"
                              />
                              <path
                                fill="currentColor"
                                d="m9.153 5.408l-.328.588c-.36.646-.54.969-.82 1.182q.06-.045.113-.097a8.5 8.5 0 0 0 10.366 9.686l-.02-.19c-.071-.743-.107-1.115 0-1.46c.107-.344.345-.623.822-1.18l.434-.507c1.677-1.96 2.515-2.941 2.222-3.882c-.292-.941-1.522-1.22-3.982-1.776l-.636-.144c-.699-.158-1.049-.237-1.33-.45c-.28-.213-.46-.536-.82-1.182l-.327-.588C13.58 3.136 12.947 2 12 2s-1.58 1.136-2.847 3.408"
                                opacity="0.5"
                              />
                            </svg>
                          </td>
                          <td>
                            <textarea name="advantage_3" id="" >{{$user->advantage_3}}</textarea>
                           
                          </td>
                        </tr>
                      </table>
                      <button type="submit" class="submit-outline" onclick="return confirm('Bạn có chắc là muốn thay đổi những thông tin này?')">Save</button>
                </form>
               
              </div>
            </div>
            <div class="main-text">
              <div class="w-[600px]">
                <div class="main-text-part">
                  <h2 class="uppercase font-bold">Giới thiệu</h2>
                  <div class="main-text-part-bio">
                      <form action="{{route('client.my_profile_change')}}" method="POST" class="change-profile">
                          @csrf
                          <textarea name="bio" id="" cols="30" rows="10" placeholder="No information!" id="example">{{$user->bio}}</textarea>
                          <button type="submit" class="submit-outline" onclick="return confirm('Are you sure you want to make these changes? ')">Save</button>
                      </form>
                      
                  </div>
                </div>
                <div class="time-lines p-3 border shadow-sm mt-4 rounded">
                  <h2 class="uppercase font-bold btn bg-purple-700 text-white w-full">Hoạt động</h2>
                  <ul class="timeline timeline-vertical">
                  @forelse ( $timelines as $timeline )
                      <li>
                        <hr />
                        <div class="timeline-start">{{$timeline->start_time}} - {{$timeline->end_time}}</div>
                        <div class="timeline-middle">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                            class="h-5 w-5">
                            <path
                              fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                              clip-rule="evenodd" />
                          </svg>
                        </div>
                        <div class="timeline-end timeline-box">{{$timeline->description}} 
                          
                         
                         
                          
                        </div>
                        <hr />
                      </li>

                      
                  @empty
                  <li>
                    <hr />
                    <div class="timeline-start">Hiện tại</div>
                    <div class="timeline-middle">
                      <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                        class="h-5 w-5">
                        <path
                          fill-rule="evenodd"
                          d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.857-9.809a.75.75 0 00-1.214-.882l-3.483 4.79-1.88-1.88a.75.75 0 10-1.06 1.061l2.5 2.5a.75.75 0 001.137-.089l4-5.5z"
                          clip-rule="evenodd" />
                      </svg>
                    </div>
                    <div class="timeline-end timeline-box">Chưa có mốc thời gian nào</div>
                   
                  </li>
                  @endforelse
                  
                   
                  </ul>
                </div>
              </div>
              <div class="main-text-part">
                <h2>Bài viết</h2>
                @forelse ($user->posts as $post )
                <div class="poster-item bg-gray-50 border mb-3 shadow">
                    <div class="p-2">
                      <header class="poster-item-header pb-1">
                        <img
                          src="/storage{{$post->thumbnail}}"
                          class="poster-item-header-img rounded"
                        />
                        <div class="poster-name">
                          <p class="hover:underline font-bold text-rose-600">
                            {{$user->name}}
                          </p>
                          <span>{{$post->topic->topic_name}}</span>
                          <span class="esport-in-post"> - {{$post->esport->esport_name}}</span>
                          <span class="text-gray-400"> - {{$post->created_at->diffForHumans()}}</span>
                        </div>
                      </header>
                      <hr />
                      <p class="divider"> <a href="" class="link link-dark">{{$post->title}}</a></p>
                      <hr>
                     <div class="line-clamp-4">
                      {!!$post->content!!}</div> 
                    </div>
                    <hr>
                    <img
                      src="/assets/images/Virtus-Pro-.jpg"
                      alt=""
                      srcset=""
                      width="100%"
                    />
                    <p class="count-comment text-end">{{count($post->comments)}} bình luận - {{count($post->likes)}} lượt thích</p>
                  </div>
                 
                  @empty
                    <h1 class="my-5 text-center">Người dùng này chưa đăng bài viết nào!</h1>
                    @endforelse
              
              </div>
            </div>
          </div>
          @livewire('profile.other-team', [
            'id' => $user->id
          ])
        </div>
      </div>
    </div>

<script>
    $(document).ready(function () {
        var formChanges = $('.change-profile')
        const btnSaves = formChanges.find('button[type=submit]')

        const formInputs = formChanges.find('input, select, textarea')
      
        formInputs.attr('disabled', 'on')
        btnSaves.hide()
        $("#btn-edited-enable").click(function (e) { 
            formInputs.prop('disabled', (i, val)=>{ 
                return !val
            })
            btnSaves.toggle()
           if($(this).attr('edit-enable')==="on")
              $(this).attr('edit-enable',"off")
            else $(this).attr('edit-enable', "on")
        });
    });
</script>
@endsection