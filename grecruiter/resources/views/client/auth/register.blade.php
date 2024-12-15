<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="/assets/user/assets/css/root.css" />
    <link rel="stylesheet" href="/assets/user/assets/css/login.css" />
    <script src="https://cdn.tailwindcss.com"></script>

    <title>Đăng ký</title>
  </head>
  <body>
    <div
      class="background-login"
      style="background-image: url(/assets/user/assets/images/zed.jpg)"
    >
      <div class="login-box m-4">
        <h2 class="uppercase text-lg font-bold">Đăng ký</h2>
       
      @session('message')
        <p class="my-3 block p-2 bg-red-600 text-white rounded">{{$message}}</p>
      @endsession
        <form action="{{route('client.handle_register')}}" method="POST" class="w-[500px]" enctype="multipart/form-data">
            @csrf
          <div class="input-field">
            <p for="email" ><strong >Email</strong></p>
            <input name="email" type="email" />
            @error('email')
                <p class="my-3 block p-2 bg-red-600 text-white rounded">{{$message}}</p>
            @enderror 
          </div>
          <div class="input-field">
            <p><strong>Password</strong></p>
            <input type="password"  name="password"/>
            @error('password')
            <p class="my-3 block p-2 bg-red-600 text-white rounded">{{$message}}</p>
        @enderror
          </div>
          <div class="input-field">
            <p ><strong>Tên đầy đủ</strong></p>
            <input name="name" type="text" />
            @error('name')
            <p class="my-3 block p-2 bg-red-600 text-white rounded">{{$message}}</p>
        @enderror
          </div>
          <div class="input-field">
            <p for="text"><strong>Biệt danh</strong></p>
            <input name="nickname" type="text" />
            @error('nickname')
            <p class="my-3 block p-2 bg-red-600 text-white rounded">{{$message}}</p>
        @enderror
          </div>
          <div class="input-field">
            <p for="text"><strong>Chuyên môn</strong></p>
            <select name="esport_id" id="" class="w-full text-white p-1 rounded bg-transparent border border-white outline-white focus:border-dashed ">
                <option value="">Không</option>
                @foreach ($esports as  $esport)
                <option value="{{$esport->id}}" class="text-black">{{$esport->esport_name}}</option>
               
                @endforeach
                
            </select>
          </div>
         

         <input name="avatar" class="block w-full text-sm text-gray-900 border border-white rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                    @error('avatar')
                    <p class="my-3 block p-2 bg-red-600 text-white rounded">{{$message}}</p>
                @enderror
          <button type="submit" class="btn-submit">Đăng nhập</button>
          <div class="forgot-password">
            <a href="">Forgot password?</a>
            <a href="">Register</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
