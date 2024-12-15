@include('client.layouts.header-bar')

    {{-- gửi pdf - youtube hightlight --}}
    @include('notify::components.notify')
@yield('user-main-content')
@include('client.layouts.footer')