<nav class="navbar navbar-expand-lg bg-body-tertiary">
      <a class="navbar-brand" href="{{ route('home') }}" style="margin-left: 25px;">SAUDAGAR</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent" style="margin-left: 50px">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('home') }}" style="margin-right: 30px">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" style="margin-right: 30px">Shop</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" style="margin-right: 30px">About</a>
            </li>
        </ul>
          <ul class="navbar-nav ms-auto">
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <li class="nav-item">
              <div class="container">
                <a href="#" class="nav-link"><i class="bi bi-cart"></i>cart</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Welcome Back, {{ auth()->user()->name }}
              </a>
              <ul class="dropdown-menu">
              @auth  
                @if(Auth::user()->role === 'admin')
                    <li class="dropdown-item"><a class="text-decoration-none" href="{{ route('admin.index') }}">see dashboard</a></li>
                @else
                    <li class="dropdown-item"><a class="text-decoration-none" href="{{ route('user.index') }}">My profile</a></li>
                @endif
                    <li>
                        <form class="block-none" action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
               @endauth
              </ul>
            </li>
        </ul>
      </div>
</nav>