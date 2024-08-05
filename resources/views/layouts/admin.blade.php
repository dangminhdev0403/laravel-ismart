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

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Scripts -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    {{-- TinyCME --}}
    <script src="https://cdn.tiny.cloud/1/tvilg3hpnwujo4kchvbhw5j17e6g7cytu1y4fxqp7qwfachz/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- Place the following <script> and <textarea> tags your HTML's <body> -->

<style>
    table th , td{
        text-align: center;
    }
</style>
@stack('style')
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="{{ route('dashboard') }}">Trang Dahboard</a>

        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
                class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

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
                    <div class="sb-sidenav-footer">

                        <h6 class="text-center">{{ Auth::user()->name }}</h6>

                    </div>
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Chính</div>
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }} "
                            href="{{ url('dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Dashboard
                        </a>

                        <div class="sb-sidenav-menu-heading">Quản lí</div>
                        {{-- ? User --}}
                        @if (Auth::user()->role == 1)
                        <a  class="nav-link collapsed {{ request()->routeIs(['admin.users.*','admin.users']) ? 'active':'' }}" href="{{ route('admin.users') }}">  <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>Người dùng</a>
                        @endif
                        {{-- Product --}}
                            <a  class="nav-link collapsed {{ request()->routeIs(['products.*','products']) ? 'active':'' }}" href="{{ route('products') }}">  <div class="sb-nav-link-icon"><i class="fa-solid fa-table-list"></i></div>Sản phẩm</a>


                        {{-- Category --}}

                        @if (Auth::user()->role == 1)
                        <a  class="nav-link collapsed {{ request()->routeIs(['category.*','category']) ? 'active':'' }}" href="{{ route('category') }}">  <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>Danh mục</a>

                        @endif




                        {{-- ? Order --}}
                        <a  class="nav-link collapsed {{ request()->routeIs(['admin.orders.*','admin.orders']) ? 'active':'' }}" href="{{ route('admin.orders') }}">  <div class="sb-nav-link-icon"><i class="fa-solid fa-cart-shopping"></i></div>Đơn hàng</a>



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
                        <div class="text-muted">Copyright &copy; Đặng Hoàng Minh</div>
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


<script>
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    });
</script>

    @stack('scripts')


</body>

</html>
