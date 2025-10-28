<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('assets/img/dashboard.png') }}" alt="Logo" style="width: 40px; height: 40px;">
        </div>
        <div class="sidebar-brand-text mx-3">My Store</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-cart-shopping"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item  {{ Request::is('categories*') || Request::is('products*') ? 'active' : '' }}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-tags"></i>
            <span>Product</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ Request::routeIs('categories.index') ? 'active' : '' }}" href="{{ route('categories.index') }}">Categories List</a>
                <h6 class="collapse-header">Product:</h6>
                <a class="collapse-item {{ Request::routeIs('products.index') ? 'active' : '' }}" href="{{ route('products.index') }}">Product List</a>
                <a class="collapse-item {{ Request::routeIs('products.create') ? 'active' : '' }}" href="{{ route('products.create') }}">Add Product</a>
            </div>
        </div>
    </li>

    <hr class="sidebar-divider">

    
    <li class="nav-item">
        <a class="nav-link" href="{{ route('index') }}">
            <i class="fab fa-fw fa-chrome"></i>
            <span>Landing Page</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
