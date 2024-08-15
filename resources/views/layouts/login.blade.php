<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('product/public/css/bootstrap/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('product/public/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('product/public/reset.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('product/public/css/carousel/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('product/public/css/carousel/owl.theme.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('product/public/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('product/public/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('product/public/responsive.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('product/public/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('product/public/js/elevatezoom-master/jquery.elevatezoom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('product/public/js/bootstrap/bootstrap.min.j') }}s" type="text/javascript"></script>
    <script src="{{ asset('product/public/js/carousel/owl.carousel.js') }}" type="text/javascript"></script>
    <script src="{{ asset('product/public/js/main.js') }}" type="text/javascript"></script>

    {{-- Login --}}

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('formlogin/css/style.css') }}">

</head>

<body>
    <div id="site">

        <div id="container">
            <div id="header-wp">
                <div id="head-top" class="clearfix">
                    <div class="wp-inner">

                        <a href="" title="" id="payment-link" class="fl-left">Hình thức thanh toán</a>
                        <div id="main-menu-wp" class="fl-right">
                            <ul id="main-menu" class="clearfix">
                                <li>
                                    <a href="{{ route('home') }}" title="">Trang chủ</a>
                                </li>
                                <li>
                                    <a href="{{ route('home.products') }}" title="">Sản phẩm</a>
                                </li>
                                <li>
                                    <a href="{{ route('blog') }}" title="">Blog</a>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}" title="">Giới thiệu</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}" title="">Liên hệ</a>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner">
                        <a href="{{ route('home') }}" title="" id="logo" class="fl-left"><img
                                src="{{ asset('product/public/images/logo.png') }}" /></a>
                        <div id="search-wp" class="fl-left">

                        </div>
                        <div id="action-wp" class="fl-right">
                            <div id="advisory-wp" class="fl-left">
                                <span class="title">Tư vấn</span>
                                <span class="phone">0987.654.321</span>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
            <div id="footer-wp">
                <div id="foot-body">
                    <div class="wp-inner clearfix">
                        <div class="block" id="info-company">
                            <h3 class="title">ISMART</h3>
                            <p class="desc">ISMART luôn cung cấp luôn là sản phẩm chính hãng có thông tin rõ ràng,
                                chính sách ưu đãi cực lớn cho khách hàng có thẻ thành viên.</p>
                            <div id="payment">
                                <div class="thumb">
                                    <img src="public/images/img-foot.png" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="block menu-ft" id="info-shop">
                            <h3 class="title">Thông tin cửa hàng</h3>
                            <ul class="list-item">
                                <li>
                                    <p>106 - Trần Bình - Cầu Giấy - Hà Nội</p>
                                </li>
                                <li>
                                    <p>0987.654.321 - 0989.989.989</p>
                                </li>
                                <li>
                                    <p>vshop@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                        <div class="block menu-ft policy" id="info-shop">
                            <h3 class="title">Chính sách mua hàng</h3>
                            <ul class="list-item">
                                <li>
                                    <a href="" title="">Quy định - chính sách</a>
                                </li>
                                <li>
                                    <a href="" title="">Chính sách bảo hành - đổi trả</a>
                                </li>
                                <li>
                                    <a href="" title="">Chính sách hội viện</a>
                                </li>
                                <li>
                                    <a href="" title="">Giao hàng - lắp đặt</a>
                                </li>
                            </ul>
                        </div>
                        <div class="block" id="newfeed">
                            <h3 class="title">Bảng tin</h3>
                            <p class="desc">Đăng ký với chung tôi để nhận được thông tin ưu đãi sớm nhất</p>
                            <div id="form-reg">
                                <form method="POST" action="">
                                    <input type="email" name="email" id="email"
                                        placeholder="Nhập email tại đây">
                                    <button type="submit" id="sm-reg">Đăng ký</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="foot-bot">
                    <div class="wp-inner">
                        <p id="copyright">© Bản quyền thuộc về laravel pro</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="menu-respon">
            <a href="?page=home" title="" class="logo">VSHOP</a>
            <div id="menu-respon-wp">
                <ul class="" id="main-menu-respon">
                    <li>
                        <a href="?page=home" title>Trang chủ</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Điện thoại</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="?page=category_product" title="">Iphone</a>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Samsung</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?page=category_product" title="">Iphone X</a>
                                    </li>
                                    <li>
                                        <a href="?page=category_product" title="">Iphone 8</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Nokia</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Máy tính bảng</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Laptop</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title>Đồ dùng sinh hoạt</a>
                    </li>
                    <li>
                        <a href="?page=blog" title>Blog</a>
                    </li>
                    <li>
                        <a href="#" title>Liên hệ</a>
                    </li>
                </ul>
            </div>
        </div>
        <div id="btn-top"><img src="{{ asset('product/public/images/icon-to-top.png') }}" alt="" /></div>
        <div id="fb-root"></div>

        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=849340975164592";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        	<script src="{{ asset('formlogin/js/jquery.min.js') }}"></script>
            <script src="{{ asset('formlogin/js/popper.js') }}"></script>
            <script src="{{ asset('formlogin/js/bootstrap.min.js') }}"></script>
                <script src="{{ asset('formlogin/js/main.js') }}"></script>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                @stack('script')

</html>
