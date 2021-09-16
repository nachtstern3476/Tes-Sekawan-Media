<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/admin">
        <div class="sidebar-brand-text mx-3">Administartor</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::segment(2) == '' ? 'active' : '' }}">
        <a class="nav-link" href="/admin">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master
    </div>

    <li class="nav-item {{ Request::segment(2) == 'orders' ? 'active' : '' }}">
        <a class="nav-link" href="/admin/orders">
            <i class="fas fa-fw fa-file"></i>
            <span>Pemesanan Kendaraan</span>
        </a>
    </li>

    <li class="nav-item {{ Request::segment(2) == 'histories' ? 'active' : '' }}">
        <a class="nav-link" href="/admin/histories">
            <i class="fas fa-fw fa-clock"></i>
            <span>Riwayat Pemesanan</span>
        </a>
    </li>

    @if (auth()->user()->level == 1)
        
        <div class="sidebar-heading">
            Features
        </div>

        <li class="nav-item {{ Request::segment(2) == 'drivers' ? 'active' : '' }}">
            <a class="nav-link" href="/admin/drivers">
                <i class="fas fa-fw fa-user"></i>
                <span>Driver</span>
            </a>
        </li>

        <li class="nav-item {{ Request::segment(2) == 'vehicles' ? 'active' : '' }}">
            <a class="nav-link" href="/admin/vehicles">
                <i class="fas fa-fw fa-wrench"></i>
                <span>Kendaraan</span>
            </a>
        </li>
    
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>