<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>

    <!-- Stylesheets -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{ asset('admin/css/styles.css') }}" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">


    <!-- Scripts -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    {{-- TinyCME --}}
    <script src="https://cdn.tiny.cloud/1/tvilg3hpnwujo4kchvbhw5j17e6g7cytu1y4fxqp7qwfachz/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->



</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="index.html">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                    aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                        class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                class="dropdown-item">
                                {{ __('Thoát') }}
                            </x-dropdown-link>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }} "
                            href="{{ url('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>
                        <div class="sb-sidenav-menu-heading">Interface</div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Layouts
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                            Pages
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseAuth" aria-expanded="false"
                                    aria-controls="pagesCollapseAuth">
                                    Authentication
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="login.html">Login</a>
                                        <a class="nav-link" href="register.html">Register</a>
                                        <a class="nav-link" href="password.html">Forgot Password</a>
                                    </nav>
                                </div>
                                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#pagesCollapseError" aria-expanded="false"
                                    aria-controls="pagesCollapseError">
                                    Error
                                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                                <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                                    data-bs-parent="#sidenavAccordionPages">
                                    <nav class="sb-sidenav-menu-nested nav">
                                        <a class="nav-link" href="401.html">401 Page</a>
                                        <a class="nav-link" href="404.html">404 Page</a>
                                        <a class="nav-link" href="500.html">500 Page</a>
                                    </nav>
                                </div>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Chức năng</div>
                        {{-- Product --}}

                        <a class="nav-link collapsed  {{ request()->routeIs('products') ? 'active' : '' }} || {{ request()->routeIs('products.*') ? 'active' : '' }}"
                            href="{{ url('products') }}" data-bs-toggle="collapse" data-bs-target="#collapseProducts"
                            aria-expanded="false" aria-controls="collapseProducts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Sản phẩm
                            <div class="sb-sidenav-collapse-arrow"><i
                                    class="fas fa-angle-{{ request()->routeIs('products') ? 'left' : 'down' }} ||  {{ request()->routeIs('products.*') ? 'left' : 'down' }} "></i>
                            </div>
                        </a>
                        <div class="collapse {{ request()->routeIs('products') ? 'show' : '' }} {{ request()->routeIs('products.*') ? 'show' : '' }} "
                            id="collapseProducts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ url('products') }}">Tất cả Sản phẩm</a>
                                <a class="nav-link {{ request()->routeIs('products.add') ? 'active' : '' }}"
                                    href="{{ url('products/add') }}">Thêm Sản phẩm</a>
                            </nav>
                        </div>

                        {{-- Category --}}
                        <a class="nav-link collapsed  {{ request()->routeIs('category') ? 'active' : '' }} || {{ request()->routeIs('category.*') ? 'active' : '' }}"
                            href="{{ url('category') }}" data-bs-toggle="collapse"
                            data-bs-target="#collapseCategories" aria-expanded="false"
                            aria-controls="collapseCategories">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Danh mục
                            <div class="sb-sidenav-collapse-arrow"><i
                                    class="fas fa-angle-{{ request()->routeIs('category') ? 'left' : 'down' }} ||  {{ request()->routeIs('category.*') ? 'left' : 'down' }} "></i>
                            </div>
                        </a>
                        <div class="collapse {{ request()->routeIs('category') ? 'show' : '' }} {{ request()->routeIs('category.*') ? 'show' : '' }} "
                            id="collapseCategories" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ url('category') }}">Tất cả danh mục</a>
                                <a class="nav-link {{ request()->routeIs('category.add') ? 'active' : '' }}"
                                    href="{{ url('category/add') }}">Thêm danh mục</a>
                            </nav>
                        </div>

                        {{-- Brand --}}
                        <a class="nav-link collapsed  {{ request()->routeIs('brand') ? 'active' : '' }}||  {{ request()->routeIs('brand.*') ? 'active' : '' }}"
                            href="{{ url('brand') }}" data-bs-toggle="collapse" data-bs-target="#collapseBrand"
                            aria-expanded="false" aria-controls="collapseBrand">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Thương hiệu
                            <div class="sb-sidenav-collapse-arrow"><i
                                    class="fas fa-angle-{{ request()->routeIs('brand') ? 'left' : 'down' }} || {{ request()->routeIs('brand.*') ? 'left' : 'down' }}"></i>
                            </div>
                        </a>
                        <div class="collapse {{ request()->routeIs('brand') ? 'show' : '' }} || {{ request()->routeIs('brand.*') ? 'show' : '' }} "
                            id="collapseBrand" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{ url('brand') }}">Tất cả thương hiệu</a>
                                <a class="nav-link {{ request()->routeIs('brand.add') ? 'active' : '' }}"
                                    href="{{ url('brand/add') }}">Thêm thương hiệu</a>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>

                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>

                @yield('content')
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('admin/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/assets/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('admin/assets/demo/chart-bar-demo.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>



    @stack('scripts')


</body>

</html>
