<!-- sidebar menu area start -->
    <div class="sidebar-menu">
        <div class="sidebar-header">
            <div class="logo">
                <h1 class="text-center" style="font-size:25px;"><a href="{{ route('home') }}">Saudagar</a></h1>
            </div>
        </div>
        <div class="main-menu">
            <div class="menu-inner">
                <nav>
                    @if(Auth::user()->role === 'admin')
                        <ul class="metismenu" id="menu">
                            <li class="nav-link {{ Request:: is('admin') ? 'active' : '' }}">
                                <a href="{{ route('admin.index') }}" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                            </li>
                            <li class="nav-link {{ Request:: is('admin/product') ? 'active' : '' }}">
                                <a href="{{ route('admin.products') }}" aria-expanded="true"><i class="bi bi-box"></i><span>Product</span></a>
                            </li>
                            <li class="nav-link {{ Request:: is('admin/order') ? 'active' : '' }}">
                                <a href="{{ route('admin.order') }}" aria-expanded="true"><i class="bi bi-cart"></i><span>Orders</span></a>
                            </li>
                            <li class="nav-link {{ Request:: is('admin/order') ? 'active' : '' }}">
                                <a href="{{ route('admin.order') }}" aria-expanded="true"><i class="bi bi-file-earmark-break"></i><span>Payment Report</span></a>
                            </li>
                        </ul>
                    @else
                        <ul class="metismenu" id="menu">
                            <li class="nav-link {{ Request:: is('my-account') ? 'active' : '' }}">
                                <a href="{{ route('user.index') }}" aria-expanded="true"><i class="ti-dashboard"></i><span>Dashboard</span></a>
                            </li>
                            <li class="nav-link {{ Request:: is('user/pesanans') ? 'active' : '' }}">
                                <a href="{{ route('user.pesanans') }}" aria-expanded="true"><i class="bi bi-cart"></i><span>Orders</span></a>
                            </li>
                            <li class="nav-link {{ Request:: is('user/history') ? 'active' : '' }}">
                                <a href="{{ route('user.history') }}" aria-expanded="true"><i class="bi bi-file-earmark-break"></i><span>History</span></a>
                            </li>
                        </ul>
                    @endif    
                </nav>
            </div>
        </div>
    </div>
<!-- sidebar menu area end -->

<!-- main content area start -->
    <div class="main-content">
        <!-- header area start -->
        <div class="header-area">
            <div class="row align-items-center">
                <!-- nav and search button -->
                <div class="col-md-6 col-sm-8 clearfix">
                    <div class="nav-btn pull-left">
                       <span></span>
                        <span></span>
                         <span></span>
                    </div>
                </div>
                <!-- profile info & task notification -->
                <div class="col-md-6 col-sm-4 clearfix">
                    <ul class="notification-area pull-right">
                        <li id="full-view"><i class="ti-fullscreen"></i></li>
                        <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- header area end -->
        
        <!-- page title area start -->
        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">Dashboard</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="{{ route('home') }}">Home</a></li>
                            </ul>
                        </div>
                    </div>
                <div class="col-sm-6 clearfix">
                    <div class="user-profile pull-right">
                        @if($profile->image)
                            <img class="avatar user-thumb" src="{{ asset('storage/foto-user/'.$profile->image) }}" alt="avatar">                        
                        @else 
                        <img class="avatar user-thumb" src="{{asset('/assets/img/user/avatar.png')}}" >
                        @endif
                        <h4 class="user-name dropdown-toggle text-capitalize" data-toggle="dropdown">{{ auth()->user()->name }}<i class="fa fa-angle-down"></i></h4>
                        <div class="dropdown-menu">
                            @if(Auth::user()->role === 'user')
                                <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                                @else
                                <a class="dropdown-item" href="{{ route('user.profile') }}">Profile</a>
                            @endif
                            <form class="block-none" action="{{ route('logout') }}" method="post">
                                @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- page title area end -->
           @yield('content') 
    </div>
        <!-- main content area end -->