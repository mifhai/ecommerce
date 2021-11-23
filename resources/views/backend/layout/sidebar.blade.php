<div id="wrapper">
   <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href=" {{ route('dashboard') }} ">
            <div class="sidebar-brand-icon">
                <img src=" {{ asset('images/parko.png') }} " alt="" style="background:white; border-radius:100%; margin-right:15px">
            </div>
            <div class="sidebar-brand-text">Paradisestore</div>
        </a>
        <hr class="sidebar-divider my-0">
        <li class="nav-item active">
            <a class="nav-link" href=" {{ route('dashboard') }} ">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Features
        </div>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"
                aria-expanded="true" aria-controls="collapseBootstrap">
                <i class="fas fa-database"></i>
                <span>Catalog</span>
            </a>
            <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Catalog</h6>
                    <a class="collapse-item" href=" {{ route('product') }} ">Product</a>
                    <a class="collapse-item" href="{{ route('banner') }}">Banner</a>
                    <a class="collapse-item" href="{{ route('coupon') }}">Coupon</a>
                    <a class="collapse-item" href="{{ route('promotion') }}">Promotion</a>
                </div>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
                aria-controls="collapseTable">
                <i class="fab fa-buffer"></i>
                <span>Attribute</span>
            </a>
            <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Attribute</h6>
                    <a class="collapse-item" href=" {{ route('brands') }} ">Brands</a>
                    <a class="collapse-item" href=" {{ route('category') }} ">Category</a>
                    <a class="collapse-item" href=" {{ route('processor') }} ">Processor</a>
                    <a class="collapse-item" href=" {{ route('disk') }} ">Storage</a>
                    <a class="collapse-item" href=" {{ route('layar') }} ">Ukuran Layar</a>
                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable1" aria-expanded="true"
                aria-controls="collapseTable">
                <i class="fab fa-opencart"></i>
                <span>Transaction</span>
            </a>
            <div id="collapseTable1" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Daftar Transaction</h6>
                    <a class="collapse-item" href=" {{ route('transaction') }} ">Order Transaction</a>
                </div>
            </div>
        </li>

        <hr class="sidebar-divider">
    </ul>
