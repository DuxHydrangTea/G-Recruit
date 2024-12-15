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

    <title>Đăng nhập</title>
  </head>
  <body>
    <div
      class="background-login"
      style="background-image: url(/assets/user/assets/images/zed.jpg)"
    >
      <div class="login-box">
        <h2>Đăng nhập</h2>
        @session('errors')
            {{session('errors')}}
        @endsession
        <form action="{{route('client.handleLogin')}}" method="POST" class="w-[350px]">
            @csrf
          <div class="input-field">
            <p for="email"><strong>Email</strong></p>
            <input name="email" type="email" />
          </div>
          <div class="input-field">
            <p><strong>Password</strong></p>
            <input type="password"  name="password"/>
          </div>
          <div class="remember-field">
            <p><strong>Remember</strong></p>
            <input type="checkbox" name="remember" />
          </div>
          <button type="submit" class="btn-submit">Đăng nhập</button>
          <div class="forgot-password">
            <a href="">Forgot password?</a>
            <a href="{{route('client.register')}}">Register</a>
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
