<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />

    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>@yield('title', 'Dashboard Admin')</title>
    <meta name="description"
        content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave | This is the demo of OneUI! You need to purchase a license for legal use! | DEMO" />
    <meta name="author" content="pixelcave" />
    <meta name="robots" content="index, follow" />
    <meta property="og:title" content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework | DEMO" />
    <meta property="og:site_name" content="OneUI" />
    <meta property="og:description"
        content="OneUI - Bootstrap 5 Admin Template &amp; UI Framework created by pixelcave | This is the demo of OneUI! You need to purchase a license for legal use! | DEMO" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <link rel="shortcut icon" href="assets/media/favicons/favicon.png" />
    <link rel="icon" type="image/png" sizes="192x192" href="assets/media/favicons/favicon-192x192.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="assets/media/favicons/apple-touch-icon-180x180.png" />
    <link rel="stylesheet" id="css-main" href="{{ asset('admins/assets/css/oneui.min-5.9.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

</head>

<body>
    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-boxed">
       
        <nav id="sidebar" aria-label="Main Navigation">
            <div class="content-header">
                <a class="fw-semibold text-dual" href="index.html">
                    <span class="smini-visible">
                        <i class="fa fa-circle-notch text-primary"></i>
                    </span>
                    <span class="smini-hide fs-5 tracking-wider">OneUI</span>
                </a>
                <div>
                    <button type="button" class="btn btn-sm btn-alt-secondary" data-toggle="layout"
                        data-action="dark_mode_toggle">
                        <i class="far fa-moon"></i>
                    </button>
                    
                    <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout"
                        data-action="sidebar_close" href="javascript:void(0)">
                        <i class="fa fa-fw fa-times"></i>
                    </a>
                </div>
            </div>
            
            <div class="js-sidebar-scroll">
                <div class="content-side">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/admin/dashboard">
                                <i class="nav-main-link-icon fa fa-tachometer"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                        </li>
                       
                        <li class="nav-main-heading">User Interface</li>
                        <li class="nav-main-item open">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                                aria-expanded="true" href="#">
                                <i class="nav-main-link-icon fa fa-cubes"></i>
                                <span class="nav-main-link-name">Manajemen Data</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item open">
                                   
                                    <ul class="nav-main-submenu">
                                        <li class="nav-main-item">
                                            <a class="nav-main-link active" href="/admin/category">
                                                <span class="nav-main-link-name">Category</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="/admin/product">
                                                <span class="nav-main-link-name">Product</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="be_pages_ecom_order.html">
                                                <span class="nav-main-link-name">Keranjgan</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="be_pages_ecom_products.html">
                                                <span class="nav-main-link-name">Products</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="be_pages_ecom_product_edit.html">
                                                <span class="nav-main-link-name">Product Edit</span>
                                            </a>
                                        </li>
                                        <li class="nav-main-item">
                                            <a class="nav-main-link" href="be_pages_ecom_customer.html">
                                                <span class="nav-main-link-name">Customer</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                               
                            </ul>
                        </li>
                        
                    </ul>
                </div>
            </div>
        </nav>
        <header id="page-header">
            <div class="content-header">
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-alt-secondary d-md-none" data-toggle="layout"
                        data-action="header_search_on">
                        <i class="fa fa-fw fa-search"></i>
                    </button>
                    <form class="d-none d-md-inline-block" action="be_pages_generic_search.html" method="POST">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control form-control-alt" placeholder="Search.."
                                id="page-header-search-input2" name="page-header-search-input2" />
                            <span class="input-group-text border-0">
                                <i class="fa fa-fw fa-search"></i>
                            </span>
                        </div>
                    </form>
                </div>
                <div class="d-flex align-items-center">
                    <div class="dropdown d-inline-block ms-2">
                        <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle" src="{{ asset('admins/assets/images/avatar11.jpg') }}" alt="Header Avatar"
                                style="width: 21px" />
                            <span class="d-none d-sm-inline-block ms-2">admin</span>
                            <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block opacity-50 ms-1 mt-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0"
                            aria-labelledby="page-header-user-dropdown">
                            <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                                <img class="img-avatar img-avatar48 img-avatar-thumb"
                                    src="{{ asset('admins/assets/images/avatar11.jpg') }}" alt="" />
                                <p class="mt-2 mb-0 fw-medium">{{ Auth::guard('admin')->user()->name }}</p>
                                <p class="mb-0 text-muted fs-sm fw-medium">Admin Toko Online</p>
                            </div>
                            <div class="p-2">
                               
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                    href="{{ route('admin.profile.edit') }}">
                                    <span class="fs-sm fw-medium">Settings</span>
                                </a>
                                <a class="dropdown-item d-flex align-items-center justify-content-between"
                                href="op_auth_lock.html">
                                <span class="fs-sm fw-medium">Lock Account</span>
                            </a>
                            
                           
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('admin.logout') }}"
                                onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">  <span class="fs-sm fw-medium">Log Out</span> </a>
                            </div>
                           
                        </div>
                    </div>
                   
                    
                </div>
            </div>
            <div id="page-header-search" class="overlay-header bg-body-extra-light">
                <div class="content-header">
                    <form class="w-100" action="be_pages_generic_search.html" method="POST">
                        <div class="input-group">
                            <button type="button" class="btn btn-alt-danger" data-toggle="layout"
                                data-action="header_search_off">
                                <i class="fa fa-fw fa-times-circle"></i>
                            </button>
                            <input type="text" class="form-control" placeholder="Search or hit ESC.."
                                id="page-header-search-input" name="page-header-search-input" />
                        </div>
                    </form>
                </div>
            </div>
            <div id="page-header-loader" class="overlay-header bg-body-extra-light">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                    </div>
                </div>
            </div>
        </header>

        @yield('content')

        <footer id="page-footer" class="bg-body-light">
            <div class="content py-3">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                        Crafted with <i class="fa fa-heart text-danger"></i> by
                        <a class="fw-semibold" href="https://pixelcave.com" target="_blank">pixelcave</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <a class="fw-semibold" href="https://pixelcave.com/products/oneui" target="_blank">OneUI 5.9</a>
                        &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="{{ asset('admins/assets/js/oneui.app.min-5.9.js') }}"></script>
    <script src="{{ asset('admins/assets/js/chart.umd.js') }}"></script>
    <script src="{{ asset('admins/assets/js/be_pages_ecom_dashboard.min.js') }}"></script>

</body>

</html>