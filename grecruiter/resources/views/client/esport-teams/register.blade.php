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
            <h3>Đăng ký mới đội tuyển</h3>
            <h3><a href="">Back</a></h3>
          </div>
          <hr>
          <form class="form-write py-5" method="POST" action="{{route('client.esport_team.handle_register')}}" enctype="multipart/form-data">
            @csrf
           
         
            <div class="form-write-title grid-1-5">
                <label for="">Chuyên môn</label>
                <select name="esport_id" id="" class="span2-6" >
                    @foreach ($esports as $esport )
                        <option value="{{$esport->id}}">{{$esport->esport_name}}</option>
                    @endforeach
                    
                </select>
                <p class="text-red-500">*Bắt buộc</p>
            </div>
            <hr>
            <div class="form-write-title grid-1-5">
                <label for="">Tên đội tuyển</label>
                <input type="text" name="name"  class="out-line-input  span2-6 title">
                <p class="text-red-500">*Bắt buộc</p>
            </div>
       
          
          
            <div class="form-write-title grid-1-5">
                <label for="">Mô tả</label>
               <div class="span2-6">
                <textarea name="description" id="example" class="content span2-6" placeholder="Mô tả"></textarea>
               </div> 
               <p class="text-red-500">*Bắt buộc</p>
            </div>
            <hr>
            <div class="form-write-title grid-1-5">
                <label for="icon">Ảnh thu nhỏ</label>
                <label for="icon"><p class="btn btn-outline-primary">Mở thư viện</p></label> 
                <input hidden type="file" name="icon" accept="image/*" id="icon" required onchange="document.getElementById('output-icon').src = window.URL.createObjectURL(this.files[0])">
                <p class="text-red-500">*Bắt buộc</p>
            </div>
            <div class="form-write-title grid-1-5 ">
                <p for="" class="text-lg">Icon:</p>
                <div class="w-10 h-10 rounded-full">
                    <img src="" id="output-icon" alt="" accept="image/*" class="span2-6">
                </div>
                
            </div>
            <div class="form-write-title grid-1-5">
                <label for="avatar">Ảnh đại diện</label>
                <label for="avatar"><p class="btn btn-outline-primary">Mở thư viện</p></label> 
                <input hidden type="file" name="avatar" id="avatar" required onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])">
                <p class="text-red-500">*Bắt buộc</p>
            </div>
            <div class="form-write-title grid-1-5">
                <p for="" class="text-lg">Avatar:</p>
                <img src="" id="output" alt="" class="span2-6">
            </div>
            <div class="form-write-title grid-1-5">
                <button type="submit" class="text-red-500 write-post-submit">Đăng ký</button>
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

