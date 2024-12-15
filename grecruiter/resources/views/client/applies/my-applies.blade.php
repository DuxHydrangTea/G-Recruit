@extends('client.page')
@section('user-main-content')
    

    <div class="container">
      <div class="container-1-4">
        <!-- menu left side -->
       @include('client.layouts.side-bar')
            {{-- side bar --}}
        <!-- main content -->
        <div class="main-content">
            <div class="flex gap-3">
                <a href="" class="btn btn-success">Đội tuyển bạn đã đăng ký</a>
                <a href="{{route('client.my_invites.list')}}" class="btn btn-outline btn-success">Lời mời từ nhà tuyển dụng</a>
            </div>
            <div class="">
                <div class="overflow-x-auto">
                    <table class="table">
                      <!-- head -->
                      <thead>
                        <tr>
                          
                          <th>Tên đội tuyển</th>
                          <th>Thông tin</th>
                          <th>Trạng thái</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <!-- row 1 -->
                        @forelse ($applies as $apply )
                        <tr>
                          
                            <td>
                              <div class="flex items-center gap-3">
                                <div class="avatar">
                                  <div class="mask mask-squircle h-12 w-12">
                                    <img
                                      src="/storage{{$apply->esportTeam->avatar}}"
                                      alt="Avatar Tailwind CSS Component" />
                                  </div>
                                </div>
                                <div>
                                  <div class="font-bold">{{$apply->esportTeam->name}}</div>
                                  <div class="text-sm opacity-50">Đăng ký: {{$apply->created_at}}</div>
                                </div>
                              </div>
                            </td>
                            <td class="max-w-96">
                              <span class="badge badge-accent badge-sm">{{$apply->position->position_name??"Không có"}}</span>
                              <br />
                              {!!$apply->message!!}
                              @if($apply->message_reply)
                              <div class="bg-slate-300 p-2 rounded">
                                <span><strong>Phản hồi của nhà tuyển dụng:</strong></span> 
                                
                                 {!!$apply->message_reply!!}
                               </div>
                               @endif
                            </td>
                            <td><span class="badge badge-ghost badge-sm">{{$apply->status}}</span></td>
                            <th>
                              <div class="flex flex-col gap-2">
                                <form action="{{route('client.my_applies.remove_apply', $apply->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-error btn-xs w-full" type="submit">Huỷ đăng ký</button>
                                </form>
                                  
                                  <button class="btn btn-warning btn-xs" onclick="my_modal_{{$apply->id}}.showModal()" >Chỉnh sửa lời nhắn</button>
                              </div>
                              
                            </th>
                          </tr>

                          <dialog id="my_modal_{{$apply->id}}" class="modal">
                            <div class="modal-box">
                              <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                              </form>
                              <h3 class="text-lg font-bold">Chỉnh sửa đơn đăng ký</h3>
                              <form action="{{route('client.my_applies.handle_update', $apply->id)}}" class="w-full my-2" method="POST"
                                enctype="multipart/form-data"
                                >
                                @method('PUT')
                                @csrf
                                @if($apply->pdf_cv)
                                    <a href="/storage{{$apply->pdf_cv}}" target="_blank" class="link link-info">CV PDF hiện tại</a>
                                @endif
                                <input type="file" class="file-input file-input-bordered w-full my-2" name="pdf_cv" accept="application/pdf" />
                                <textarea class="textarea textarea-bordered" id="example" name="message" placeholder="Bio">{!!$apply->message!!}</textarea>
                                <button type="submit" class="btn btn-info">Xác nhận</button>
                              </form>
                            </div>
                          </dialog>
                        @empty
                            <h1>Bạn chưa đăng ký tham gia đội tuyển nào!</h1>
                        @endforelse
                       
                      
                      </tbody>
                      <!-- foot -->
                     
                    </table>
                  </div>


            </div>
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

