<!DOCTYPE html>
<html lang="en" data-theme="light">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{$title ?? "G-Recruiter"}}</title>

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
    <link
  rel="stylesheet"
  href="https://unpkg.com/tippy.js@6/animations/scale.css"
/>
    @vite('resources/js/app.js')
    @notifyCss
    <script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
    <link rel="stylesheet" href="/assets/user/assets/css/root.css" />
    <link rel="stylesheet" href="/assets/user/assets/css/index.css" />
    <link rel="stylesheet" href="/assets/user/assets/css/header.css">
    <link rel="stylesheet" href="/assets/user/assets/css/footer.css">
    <link rel="stylesheet" href="/assets/user/assets/css/write.css">
    
    <link rel="stylesheet" href="/assets/user/assets/css/profile.css">
    <link rel="stylesheet" href="/assets/user/assets/css/list-users.css">
    {{-- <link rel="stylesheet" href="{{asset('assets/admin')}}/assets/css/bootstrap.css"> --}}

    <link href="/assets/user/assets/froala_editor_4.2.2/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/user/assets/css/listuser.css" />
    <link rel="icon" href="/assets/user/assets/images/logo.jpg" />
    {{-- <script src="{{asset('assets/jQuery/jquery.js')}}" ></script> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.14/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
    @livewireStyles
   
  </head>
  <body>
<header>


  <div id="loading-overlay" class="fixed inset-0 z-50  flex items-center justify-center bg-gray-900 bg-opacity-60">

    <svg class="animate-spin h-8 w-8 text-white mr-3" xmlns="http://www.w3.org/2000/svg" fill="none"
        viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor"
            d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
        </path>
    </svg>

    <span class="text-white text-3xl font-bold">Loading...</span>

</div>

  <div class="navbar bg-base-100">
    <div class="flex-1 flex gap-3">
      <img src="/assets/user/assets/images/logo.jpg" class="max-w-12 square" alt="">
      <a href="{{route('client.index')}}" class="text-xl uppercase text-red-500 font-bold hover:text-red-800">G-Recruiter</a>
    </div>
    <div class="flex-none gap-2">
      <div class="form-control">
        <input type="text" placeholder="Tìm kiếm bất kỳ..." class="input input-bordered w-24 md:w-auto" />
      </div>
      <div class="dropdown dropdown-end">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
          <div class="w-10 rounded-full">
            <img
              alt="Tailwind CSS Navbar component"
              src="/storage{{auth()->user()->avatar}}" />
          </div>
        </div>
        <ul
          tabindex="0"
          class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
          <li>
            <a class="justify-between" href="{{route('client.my_profile_v2', auth()->user()->id)}}">
              Hồ sơ
            </a>
          </li>
          <li>
            <a class="justify-between" href="{{route('client.my_applies.list')}}">
               Ứng tuyển
               <span class="badge badge-accent">Mới</span>
            </a>
          </li>
          @if(!Auth::user()->esport_team_id) 
           <li><a href="{{route('client.esport_team.register')}}" class="">Đăng ký đội tuyển</a></li>
          @endif
          <li ><a href="{{route('logout')}}">Đăng xuất</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>