@extends('client.page')
@section('user-main-content')
    
    <div class="container">
      <div class="container-1-4">
        <!-- menu left side -->
       @include('client.layouts.side-bar')
            {{-- side bar --}}
        <!-- main content -->
        <div class="main-content">
          <div class="slide-header" style="background-image: url({{asset('assets/user')}}/assets/images/zed.jpg)">
            <h1>
              Welcome to G-Recruiter
              <br />
              Choose any player for your team
            </h1>
            <a href="">Browser More</a>
          </div>
          <div class="title-list-bar">
            <h3>Tạo mới bài viết</h3>
            <h3><a href="">Quay lại</a></h3>
          </div>
          <hr>
          <dialog id="add_category" class="modal">
            <div class="modal-box">
              <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
              </form>
              <h3 class="text-lg font-bold">Thêm thể loại!</h3>
              <form action="{{route('client.my_topic.add')}}" method="POST" class="flex flex-col gap-3">
                @csrf
                <input type="hidden" name="esport_id" value="{{$esport_id}}">
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
          <form class="form-write py-5" method="POST" action="{{ route('client.handle_write_by_esport', [
            'esport_id' => $esport_id,
          ]) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-write-title grid-1-5" >
              <label for="">Chủ đề</label>
              <select  name="topic_id" id="topic_id" class="span2-6 select select-bordered ">
                  <option value="0">--  Không  --</option>
                  @foreach ($topics as  $topic)
                    <option value="{{$topic->id}}" esport-id="{{$topic->esport->id??0}}">{{$topic->user_id == Auth::id() ? "  ♦  ":""}}{{$topic->topic_name}}</option>
                  @endforeach
                 
              </select>
              
            </div>
            <div class="form-write-title grid-1-5" >
              <span class="col-span-6 text-cyan-600" >Không có thể loại bạn cần? Thêm thể loại <button type="button" class="link link-ghost " onclick="add_category.showModal()">Tại đây!</button></span> 
              </div>
            <div class="form-write-title grid-1-5" >
              <label for="">Vị trí</label>
              <select  name="position_id" id="position_id" class="span2-6 select select-bordered ">
                  <option value="0">--  Không  --</option>
                  @foreach ($positions as  $p)
                    <option value="{{$p->id}}" esport-id="{{$p->esport->id??0}}">{{$p->position_name}}</option>
                  @endforeach
                 
              </select>
            </div>
            <hr>
            <div class="form-write-title grid-1-5">
                <label for="title">Tiêu đề</label>
                <input type="text" name="title" id="title" class="input input-bordered  span2-6 title">
            </div>
       
            <div class="form-write-title grid-1-5">
              <label for="title">Tóm lược</label>
              <input type="text" name="abstract" id="title" class="input input-bordered  span2-6 title">
          </div>
          
            <div class="form-write-title grid-1-5">
                <label for="">Nội dung</label>
               <div class="span2-6">
                <textarea name="content" id="example" class="textarea textarea-bordered span2-6"></textarea>
               </div> 
            </div>
            <hr>
            <div class="form-write-title grid-1-5">
                <label for="">Ảnh thu nhỏ</label>
                <input class="file-input file-input-bordered w-full col-span-4" accept="image/*" type="file" name="thumbnail" id="" required onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
            </div>
            <div class="form-write-title grid-1-5">
                <label for="">Xem trước</label>
                <img src="" id="output" alt="" class="span2-6 rounded">
            </div>
            <div class="form-write-title flex justify-end gap-12">
              <button type="reset" class="btn btn-outline-dark w-32">Reset</button>
              <button type="submit" class="btn btn-error w-32">Đăng</button>
            </div>
           
            </div>
          </form>
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

