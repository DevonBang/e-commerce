<div class="sidebar border border-right col-md-3 col-lg-2 d-md-block bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Saudagar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
            <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link  {{ Request:: is('dashboard') ? 'active' : '' }}" aria-current="page" href="{{ route('admin.index') }}">
                        <svg class="bi"><use xlink:href="#house-fill"/></svg>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.products') }}">
                        <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                            All Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.order') }}">
                        <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                            All Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.products') }}">
                        <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                            History
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.products') }}">
                        <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                            Laporan Pembayaran
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>