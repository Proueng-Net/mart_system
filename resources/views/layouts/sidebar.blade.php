<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('dashboard')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Controller</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" id="nav_id" data-target="#collapsePages" aria-expanded="true" aria-controls="collapseTables">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages">
            <!-- category -->
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSlideshow" aria-expanded="true" aria-controls="collapseSlideshow">
                    <i class="fa-solid fa-list-ul"></i>
                    <span>Slideshows</span></a>
                </a>
                <div id="collapseSlideshow" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('slideshow.create')}}">Add New Slide</a>
                        <a class="collapse-item" href="{{route('slideshow.index')}}">Show All Slide</a>
                    </div>
                </div>
            </div>

            <!-- category -->
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fa-solid fa-list-ul"></i>
                    <span>Categories</span></a>
                </a>
                <div id="collapseCategory" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('category.create')}}">Add New Category</a>
                        <a class="collapse-item" href="{{route('category.index')}}">Show All Categories</a>
                    </div>
                </div>
            </div>

            <!-- product  -->
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseProduct" aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fa-solid fa-list-ol"></i>
                    <span>Products</span></a>
                </a>
                <div id="collapseProduct" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('product.create')}}">Add New Product</a>
                        <a class="collapse-item" href="{{route('product.index')}}">Show All Product</a>
                    </div>
                </div>
            </div>

            <!-- invoice  -->
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOrder" aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fa-solid fa-list-ol"></i>
                    <span>Orders</span></a>
                </a>
                <div id="collapseOrder" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('order.order')}}">Buying</a>
                        <a class="collapse-item" href="{{route('invoice.index')}}">Invoice</a>
                    </div>
                </div>
            </div>

            <!-- user -->
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Users</span></a>
                </a>
                <div id="collapseUsers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('user.create')}}">Add User</a>
                        <a class="collapse-item" href="{{route('user.index')}}">Show All Users</a>
                    </div>
                </div>
            </div>

        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>