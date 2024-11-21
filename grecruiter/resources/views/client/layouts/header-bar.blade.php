<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>G-Recruiter</title>

    <link rel="preconnect" href="https:/fonts.googleapis.com" />
    <link rel="preconnect" href="https:/fonts.gstatic.com" crossorigin />
    <link
      href="https:/fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap"
      rel="stylesheet"
    />
    <link
      href="https:/fonts.googleapis.com/css2?family=Bebas+Neue&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https:/cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
      integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="/assets/user/assets/css/root.css" />
    <link rel="stylesheet" href="/assets/user/assets/css/index.css" />
    <link rel="stylesheet" href="/assets/user/assets/css/header.css">
    <link rel="stylesheet" href="/assets/user/assets/css/footer.css">
    <link rel="stylesheet" href="/assets/user/assets/css/write.css">
    
    <link rel="stylesheet" href="/assets/user/assets/css/profile.css">
    <link rel="stylesheet" href="/assets/user/assets/css/list-users.css">
    <link rel="stylesheet" href="{{asset('assets/admin')}}/assets/css/bootstrap.css">

    <link href="/assets/user/assets/froala_editor_4.2.2/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/user/assets/css/listuser.css" />
    <link rel="icon" href="/assets/user/assets/images/logo.jpg" />
    <script src="{{asset('assets/jQuery/jquery.js')}}" ></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
    @notifyCss
  </head>
  <body>
<header>
<nav class="header-nav">
    <div class="header-nav-left">
      <button id="button-side-bar">
        <i class="fa-solid fa-bars"></i>
      </button>
      <a href="{{route('client.index')}}"><img src="/assets/user/assets/images/logo.jpg" alt="" /></a>
     <a href="{{route('client.index')}}"><span>G-Recruiter</span></a> 
    </div>
    <div class="header-nav-middle">
      <form action="" class="form-search">
        <input
          type="text"
          name="search"
          placeholder="Search by name of Players or name of Esports..."
        />
        <button type="submit">
          <i class="fa-solid fa-magnifying-glass"></i>
        </button>
      </form>
    </div>
    <a class="header-nav-right" href="{{route('client.my_profile')}}">
      <img src="/assets/user/assets/images/avatar.png" alt="" />
    </a>
  </nav>
</header>