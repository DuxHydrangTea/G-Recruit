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
            <h3><a href="">Back</a></h3>
          </div>
          <hr>
          <form class="form-write py-5" method="POST" action="{{ route('client.handle_write_by_esport', [
            'esport_id' => $esport_id,
          ]) }}" enctype="multipart/form-data">
            @csrf
            <div class="form-write-title grid-1-5" >
              <label for="">Chủ đề</label>
              <select  name="topic_id" id="topic_id" class="span2-6 out-line-input ">
                  <option value="0">--Không--</option>
                  @foreach ($topics as  $topic)
                    <option value="{{$topic->id}}" esport-id="{{$topic->esport->id??0}}">{{$topic->topic_name}}</option>
                  @endforeach
                 
              </select>
            </div>
            <div class="form-write-title grid-1-5" >
              <label for="">Vị trí</label>
              <select  name="position_id" id="position_id" class="span2-6 out-line-input ">
                  <option value="0">--Không--</option>
                  @foreach ($positions as  $p)
                    <option value="{{$p->id}}" esport-id="{{$p->esport->id??0}}">{{$p->position_name}}</option>
                  @endforeach
                 
              </select>
            </div>
            <hr>
            <div class="form-write-title grid-1-5">
                <label for="title">Tiêu đề</label>
                <input type="text" name="title" id="title" class="out-line-input  span2-6 title">
            </div>
       
            <div class="form-write-title grid-1-5">
              <label for="title">Tóm lược</label>
              <input type="text" name="abstract" id="title" class="out-line-input  span2-6 title">
          </div>
          
            <div class="form-write-title grid-1-5">
                <label for="">Nội dung</label>
               <div class="span2-6">
                <textarea name="content" id="example" class="content span2-6"></textarea>
               </div> 
            </div>
            <hr>
            <div class="form-write-title grid-1-5">
                <label for="">Ảnh thu nhỏ</label>
                <input type="file" name="thumbnail" id="" required onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
            </div>
            <div class="form-write-title grid-1-5">
                <label for="">Xem trước</label>
                <img src="" id="output" alt="" class="span2-6">
            </div>
            <div class="form-write-title grid-1-5">
                <button type="submit" class="text-red-500 write-post-submit">Submit</button>
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

