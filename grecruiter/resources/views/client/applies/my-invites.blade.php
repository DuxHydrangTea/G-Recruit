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
                <a href="{{route('client.my_applies.list')}}" class="btn btn-outline btn-success">Đội tuyển bạn đã đăng ký</a>
                <a href="{{route('client.my_invites.list')}}" class="btn  btn-success">Lời mời từ nhà tuyển dụng</a>
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
                        @forelse ($recruits as $recruit )
                        <tr>
                          
                            <td>
                              <div class="flex items-center gap-3">
                                <div class="avatar">
                                  <div class="mask mask-squircle h-12 w-12">
                                    <img
                                      src="/storage{{$recruit->esportTeam->avatar}}"
                                      alt="Avatar Tailwind CSS Component" />
                                  </div>
                                </div>
                                <div>
                                  <div class="font-bold">{{$recruit->esportTeam->name}}</div>
                                  <div class="text-sm opacity-50">Mời lúc: {{$recruit->created_at}}</div>
                                </div>
                              </div>
                            </td>
                            <td class="max-w-96">
                              <span class="badge badge-accent badge-sm">{{$recruit->position->position_name??"Không có"}}</span>
                              <br />
                              {!!$recruit->message!!}
                              <div class="bg-slate-300 p-2 rounded">
                               <span><strong>Phản hồi của bạn:</strong></span> 
                               
                                {!!$recruit->message_reply!!}
                              </div>
                            </td>
                            <td><span class="badge badge-ghost badge-sm">{{$recruit->status}}</span></td>
                            <th>
                              <div class="flex flex-col gap-2">
                               
                                  <a href="{{route('client.my_invites.accept', $recruit->id)}}" class="btn btn-success btn-xs">Đồng ý</a>
                                  <button class="btn btn-warning btn-xs" onclick="my_modal_{{$recruit->id}}.showModal()" >Từ chối</button>
                              </div>
                              
                            </th>
                          </tr>

                          <dialog id="my_modal_{{$recruit->id}}" class="modal">
                            <div class="modal-box">
                              <form method="dialog">
                                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
                              </form>
                              <h3 class="text-lg font-bold">Từ chối</h3>
                              <form action="{{route('client.my_invites.deny', $recruit->id)}}" class="w-full my-2" method="POST"
                                
                                >
                                @method('PUT')
                                @csrf
                                
                                <textarea class="textarea textarea-bordered" id="example" name="message_reply" placeholder="Bio"></textarea>
                                <button type="submit" class="btn btn-info">Xác nhận</button>
                              </form>
                            </div>
                          </dialog>
                        @empty
                            <h1>Bạn chưa nhận được lời mời tham gia đội tuyển nào!</h1>
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

