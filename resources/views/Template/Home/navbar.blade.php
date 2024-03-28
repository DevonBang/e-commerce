<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <a class="navbar-brand" href="{{ route('home') }}" style="margin-left: 25px;">SAUDAGAR</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 50px">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" aria-current="page"
                    href="{{ route('home') }}" style="margin-right: 30px">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('product') ? 'active' : '' }}" href="{{ route('product') }}"
                    style="margin-right: 30px">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" style="margin-right: 30px">About</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <div class="container">
                    <a href="{{ route('cart') }}" class="nav-link {{ Request::is('cart') ? 'active' : '' }}">
                        <i class="bi bi-cart"></i>cart
                        <span class="badge bg-danger">{{ count((array) session('cart')) }}</span>
                    </a>
                </div>
            </li>
            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welcome Back, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        @if (Auth::user()->role === 'admin')
                            <li class="dropdown-item">
                                <a class="text-decoration-none" style="font-size: 16px;"
                                    href="{{ route('admin.index') }}">See Dashboard</a>
                            </li>
                        @else
                            <li class="dropdown-item">
                                <a class="text-decoration-none" style="font-size: 16px;"
                                    href="{{ route('user.index') }}">My Profile</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                        @endif
                        <li>
                            <form class="block-none" action="{{ route('logout') }}" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i>
                                    Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" href="/login"><i
                                    class="bi bi-box-arrow-in-right"></i>
                                Login
                            </a>
                        </li>
                    </ul>
                </li>
            @endauth
    </div>
</nav>
