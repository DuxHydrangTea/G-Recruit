<div id="app">
    <div id="sidebar" class='active'>
        <div class="sidebar-wrapper active">
<div class="sidebar-header">
    <img src="{{asset('assets/admin')}}/assets/images/logo.svg" alt="" srcset="">
</div>
<div class="sidebar-menu">
    <ul class="menu">
        
        
            <li class='sidebar-title'>GRecruiter</li>
        
        
        
            <li class="sidebar-item active ">
                <a href="{{route('admin.index')}}" class='sidebar-link'>
                    <i data-feather="home" width="20"></i> 
                    <span>Dashboard</span>
                </a>
                
            </li>

        
        
            <li class="sidebar-item active ">
                <a href="{{route('esport.index')}}" class='sidebar-link'>
                    <i data-feather="triangle" width="20"></i> 
                    <span>Esport Game</span>
                </a>
                
            </li>

        
            <li class="sidebar-item active ">
                <a href="{{route('menu.index')}}" class='sidebar-link'>
                    <i data-feather="menu" width="20"></i> 
                    <span>Menu</span>
                </a>
                
            </li>

            <li class="sidebar-item active ">
                <a href="{{route('rank.index')}}" class='sidebar-link'>
                    <i data-feather="layout" width="20"></i> 
                    <span>Rank Elements</span>
                </a>
                
            </li>
        
            <li class="sidebar-item active ">
                <a href="{{ route('position.index') }}" class='sidebar-link'>
                    <i data-feather="user" width="20"></i> 
                    <span>Positions</span>
                </a>
                
            </li>
      
            <li class="sidebar-item active ">
                <a href="{{ route('user.index') }}" class='sidebar-link'>
                    <i data-feather="user" width="20"></i> 
                    <span>User</span>
                </a>
                
            </li>
        
            <li class="sidebar-item active ">
                <a href="{{ route('esport-team.index') }}" class='sidebar-link'>
                    <i data-feather="user" width="20"></i> 
                    <span>Esport Team</span>
                </a>
                
            </li>
            <li class="sidebar-item active ">
                <a href="{{ route('menu.index') }}" class='sidebar-link'>
                    <i data-feather="user" width="20"></i> 
                    <span>Menu</span>
                </a>
                
            </li>


            <li class="sidebar-item active ">
                <a href="{{ route('topic.index') }}" class='sidebar-link'>
                    <i data-feather="user" width="20"></i> 
                    <span>Topic</span>
                </a>
                
            </li>

            <li class="sidebar-item active ">
                <a href="{{ route('post.index') }}" class='sidebar-link'>
                    <i data-feather="user" width="20"></i> 
                    <span>Post</span>
                </a>
                
            </li>


    </ul>
</div>
<button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
    </div>
<div id="main">


<nav class="navbar navbar-header navbar-expand navbar-light">
    <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
    <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
            <li class="dropdown nav-icon">
                <a href="#" data-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                    <div class="d-lg-inline-block">
                        <i data-feather="bell"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-large">
                    <h6 class='py-2 px-4'>Notifications</h6>
                    <ul class="list-group rounded-none">
                        <li class="list-group-item border-0 align-items-start">
                            <div class="avatar bg-success mr-3">
                                <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                            </div>
                            <div>
                                <h6 class='text-bold'>New Order</h6>
                                <p class='text-xs'>
                                    An order made by Ahmad Saugi for product Samsung Galaxy S69
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="dropdown nav-icon mr-2">
                <a href="#" data-toggle="dropdown" class="nav-link  dropdown-toggle nav-link-lg nav-link-user">
                    <div class="d-lg-inline-block">
                        <i data-feather="mail"></i>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                    <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                    <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                    <div class="avatar mr-1">
                        <img src="{{asset('assets/admin')}}/assets/images/avatar/avatar-s-1.png" alt="" srcset="">
                    </div>
                    <div class="d-none d-md-block d-lg-inline-block">{{Auth::user()->name}}</div>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#"><i data-feather="user"></i> Account</a>
                    <a class="dropdown-item active" href="#"><i data-feather="mail"></i> Messages</a>
                    <a class="dropdown-item" href="#"><i data-feather="settings"></i> Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#"><i data-feather="log-out"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
