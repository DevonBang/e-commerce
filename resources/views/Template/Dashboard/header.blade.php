<header class="navbar sticky-top bg-dark flex-md-nowrap p-0 shadow" data-bs-theme="light">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6 text-white" href="/">Saudagar</a>

        <ul class="navbar-nav  px-4">
            <li class="nav-item text-nowrap">
                <form action="/logout" method="post">
                @csrf
                    <button type="submit" class="btn btn-warning"><i class="bi bi-box-arrow-right"></i> Logout</button>
                </form>
            </li>
        </ul>

    <ul class="navbar-nav flex-row d-md-none">

        <li class="nav-item text-nowrap">
        <button class="nav-link px-3 text-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <svg class="bi"><use xlink:href="#list"/></svg>
        </button>
        </li>
    </ul>
</header>