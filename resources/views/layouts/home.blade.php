<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/smoothness/jquery-ui.css">
    <link href="{{ asset('product/public/css/bootstrap/bootstrap-theme.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('product/public/css/bootstrap/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('product/public/reset.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('product/public/css/carousel/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('product/public/css/carousel/owl.theme.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('product/public/css/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"type="text/css" />
    <link href="{{ asset('product/public/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('product/public/responsive.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script src="{{ asset('product/public/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('product/public/js/elevatezoom-master/jquery.elevatezoom.js') }}" type="text/javascript"></script>
    <script src="{{ asset('product/public/js/bootstrap/bootstrap.min.j') }}s" type="text/javascript"></script>
    <script src="{{ asset('product/public/js/carousel/owl.carousel.js') }}" type="text/javascript"></script>
    <script src="{{ asset('product/public/js/main.js') }}" type="text/javascript"></script>

    {{-- bs5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/scrollreveal@4"></script>
    <script>
        ScrollReveal({ reset: true });
    </script>
    <style>
        .list-item {
            padding: 0;
        }

        #delete-cart-all {
            display: inline-block;
            padding: 12px 25px;
            color: #fff;
            text-transform: uppercase;
            font-size: 13px;
            border-radius: 3px;
            background: #c62626;
            margin-right: 5px;
            border: 1px solid #d6d6d6;
            font-family: 'Roboto Bold';
            font-weight: normal;
        }

        #info-cart-wp table tbody tr td .num-order {
            width: 61px;
        }

        /* Tweak to change the look and feel */
        /* Root variables */
        :root {
            --button-background: dodgerblue;
            --button-color: white;

            --dropdown-highlight: dodgerblue;
            --dropdown-width: 160px;
            --dropdown-background: white;
            --dropdown-color: black;
        }

        /* Dropdown styles */
        .dropdown {
            position: relative;
            padding: 0;
            margin-right: 1em;
            border: none;
            display: inline-block;
            /* Để có thể hover được ngay lập tức */
        }

        .dropdown summary {
            list-style: none;
            list-style-type: none;
            cursor: pointer;
            display: flex;
            /* Hiển thị summary dưới dạng flexbox */
            justify-content: center;
            /* Căn giữa nội dung theo chiều ngang */
            align-items: center;
            /* Căn giữa nội dung theo chiều dọc */
        }

        .dropdown>summary::-webkit-details-marker {
            display: none;
        }

        .dropdown summary:focus {
            outline: none;
        }

        .dropdown ul {
            display: none;
            position: absolute;
            top: calc(100% + 5px);
            /* Hiển thị dropdown dưới phần tử summary */
            left: 0;
            margin: 5px 0 0 0;
            /* Điều chỉnh khoảng cách */
            padding: 10px 0;
            /* Điều chỉnh khoảng cách nội dung */
            width: var(--dropdown-width);
            box-sizing: border-box;
            z-index: 2;
            background: var(--dropdown-background);
            border-radius: 6px;
            list-style: none;
            white-space: nowrap;
            /* Để các mục trong dropdown không xuống dòng */
        }

        .dropdown ul li {
            padding: 0;
            margin: 0;
            text-align: center;
            /* Căn giữa nội dung văn bản trong mỗi mục */
        }

        .dropdown ul li a:link,
        .dropdown ul li a:visited {
            display: block;
            /* Để mỗi mục là một khối */
            padding: 10px 0.8rem;
            box-sizing: border-box;
            color: var(--dropdown-color);
            text-decoration: none;
        }

        .dropdown ul li a:hover {
            background-color: var(--dropdown-highlight);
            color: var(--dropdown-background);
        }

        /* Dropdown triangle */
        .dropdown ul::before {
            content: ' ';
            position: absolute;
            width: 0;
            height: 0;
            top: -10px;
            left: 50%;
            margin-left: -10px;
            border-style: solid;
            border-width: 0 10px 10px 10px;
            border-color: transparent transparent var(--dropdown-background) transparent;
        }

        /* Show dropdown on hover */
        .dropdown:hover ul {
            display: block;
        }

        /* Close the dropdown with outside clicks */
        .dropdown>summary::before {
            display: none;
        }

        .dropdown[open]>summary::before {
            content: ' ';
            display: block;
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            bottom: 0;
            z-index: 1;
        }

        /* Additional styling for dropdown items */
        #head-top #main-menu details.dropdown li a {
            margin: 2px;
            display: block;
            color: #000;
            padding: 10px 15px;
        }

        .dropdown ul li a:hover {
            background-color: unset;
            /* Bỏ background mặc định khi hover */

        }

        #head-top #main-menu details.dropdown li a:hover {


            color: #de9c9c;

        }

        #advisory-wp:after {
            width: 0px;
        }



#search-form {

  position: relative;
}

#search-form a:nth-child(3) {
  position: absolute;
  top: -5px;
  right: 90px;
  bottom: 0;
  background-color: transparent;
  outline: none;
  border: none;
  width: 3rem;
  text-align: center;
  font-size: 1.75rem;
  cursor: pointer;
  color: #333;
}
    </style>

    @stack('style')

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
                                    <a href="{{ route('about') }}" title="">Giới thiệu</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact') }}" title="">Liên hệ</a>
                                </li>

                                @if (Route::has('login'))

                                    @auth

                                        <li>
                                            <a href="{{ route('order.show') }}" title="">Đơn hàng</a>
                                        </li>

                                        <li>
                                            <details class="dropdown ">
                                                <summary role="button">
                                                    <a class="button dropdown-toggle">{{ Auth::user()->name }}</a>
                                                </summary>
                                                <ul>
                                                    <li class="">
                                                        <x-responsive-nav-link :href="route('profile.edit')">
                                                            {{ __('Profile') }}
                                                        </x-responsive-nav-link>
                                                    </li>
                                                    <li>
                                                        <form method="POST" action="{{ route('logout') }}">
                                                            @csrf

                                                            <x-dropdown-link :href="route('logout')"
                                                                onclick="event.preventDefault();
                                                                                this.closest('form').submit();">
                                                                {{ __('Đăng xuất') }}
                                                            </x-dropdown-link>
                                                </ul>
                                            </details>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ route('login') }}"
                                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                                Đăng nhập
                                            </a>
                                        </li>

                                        @if (Route::has('register'))
                                            <li>
                                                <a href="{{ route('register') }}"
                                                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
                                                    Đăng kí
                                                </a>
                                            </li>
                                        @endif
                                    @endauth

                                @endif


                            </ul>
                        </div>
                    </div>
                </div>
                <div id="head-body" class="clearfix">
                    <div class="wp-inner">
                        <a href="{{ route('home') }}" title="" id="logo" class="fl-left"><img src="{{ asset('product/public/images/logo.png') }}" /></a>


                          <div id="search-wp" class="fl-left">
                            @if (Route::has('login'))
                            @auth
                            <div id="search-form" >
                                <form action="#"  >

                                    <input type="text" name="keyword1" id="s" class="btn-search123" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                    <a id="sm-s"  onclick="document.getElementById('search-form').submit(); return false;" style="cursor: pointer" class="btn-search23">Tìm kiếm</a>

                                </form>

                           </div>



                            @else

                            <form action="#" id="search-form"  >

                                <input type="text" name="keyword1" id="s" placeholder="Nhập từ khóa tìm kiếm tại đây!">
                                <a id="sm-s"  onclick="document.getElementById('search-form').submit(); return false;" style="cursor: pointer" class="btn-search23">Tìm kiếm</a>

                                  </form>
                                  @endauth
                            @endif


                        </div>


                        <div id="action-wp" class="fl-right">
                            <div id="advisory-wp" class="fl-left">
                                <span class="title">Tư vấn</span>
                                <span class="phone">0987.654.321</span>
                            </div>


                            @if (Route::has('login'))



                                @auth
                                    <div id="btn-respon" class="fl-right"><i class="fa fa-bars" aria-hidden="true"></i>
                                    </div>
                                    <a href="?page=cart" title="giỏ hàng" id="cart-respon-wp" class="fl-right">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span id="num">3</span>
                                    </a>

                                    @if (Route::is('cart.show'))
                                        <div> </div>
                                    @else
                                        <div id="cart-wp" class="fl-right">
                                            <a id="btn-cart" href="{{ route('cart.show') }}" class="text-white">
                                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                                <span id="num">{{ Cart::count() }}</span>
                                            </a>
                                            <div id="dropdown">

                                                @if (Cart::count() > 0)
                                                    <ul class="list-cart">
                                                        @php
                                                            $count = 0;
                                                        @endphp
                                                        @foreach (Cart::content() as $cart)
                                                            @if ($count < 5)
                                                                <li style="display: none">
                                                                    <form action="{{ route('cart.pay') }}" method="post"id="myForm">

                                                                        @csrf
                                                                        <input type="hidden" class="product-checkbox"
                                                                            name="products[{{ $loop->index }}][selected]"
                                                                            value="1" onchange="updateTotal()">
                                                                        <input type="hidden"
                                                                            name="products[{{ $loop->index }}][rowId]"
                                                                            value="{{ $cart->rowId }}">
                                                                        <input type="hidden"
                                                                            name="products[{{ $loop->index }}][name]"
                                                                            value="{{ $cart->name }}">
                                                                        <input type="hidden"
                                                                            name="products[{{ $loop->index }}][quantity]"
                                                                            value="{{ $cart->qty }}">
                                                                        <input type="hidden"
                                                                            name="products[{{ $loop->index }}][price]"
                                                                            value="{{ $cart->price }}">


                                                                </li>
                                                                <li class="clearfix">


                                                                    <a href="" title=""
                                                                        class="thumb fl-left">
                                                                        <img src="{{ asset($cart->options->image) }}"
                                                                            alt="">
                                                                    </a>
                                                                    <div class="info fl-right">
                                                                        <a href="" title=""
                                                                            class="product-name">{{ $cart->name }}</a>
                                                                        <p class="price">
                                                                            {{ number_format($cart->price, 0, '', '.') }}
                                                                            đ
                                                                        </p>
                                                                        <p class="qty">Số lượng: <span>
                                                                                {{ $cart->qty }}</span></p>
                                                                    </div>
                                                                    @php
                                                                        $count++;
                                                                    @endphp
                                                                </li>
                                                            @else
                                                            @break
                                                        @endif
                                                    @endforeach


                                                </ul>
                                                <p class="desc text-center">
                                                    Hiện<span>{{ $count }}/{{ Cart::content()->count() }}</span>
                                                    sản phẩm trong giỏ </p>
                                                <div class="total-price clearfix">
                                                    <p class="title fl-left">Tổng:</p>
                                                    <p class="price fl-right"
                                                        style="font-size: 14px; margin:12px 0 16px">
                                                        {{ Cart::subtotal() }} đ</p>
                                                </div>
                                                <div class="action-cart clearfix">
                                                    <a href="{{ route('cart.show') }}" title="Giỏ hàng"
                                                        class="view-cart fl-left">Xem thêm
                                                    </a>
                                                    <a type="submit" title="Thanh toán" href="#"
                                                        class="checkout fl-right"
                                                        onclick="document.getElementById('myForm').submit();">Thanh
                                                        toán</a>
                                                </div>
                                            @else
                                                <p class="desc text-center mt-5"><span>  </span>
                                                </p>
                                            @endif
                                         </form>
                                        </div>
                                    </div>
                                @endif
                                       


                            @endauth


                        @endif
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
                            <form action="">
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Thất bại',
                text: "{{ session('error') }}",
                icon: 'error',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Xóa dữ liệu trong sessionStorage sau khi người dùng nhấn OK
                    sessionStorage.clear();
                    location.reload();

                    // Nếu cần xóa cookie hoặc localStorage, bạn có thể thêm mã tương tự ở đây
                    // document.cookie = 'cookieName=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/';
                    // localStorage.clear();
                }
            });
        </script>
    @endif

    @if (session('message'))
        <script>
            Swal.fire({
                title: 'Thành công',
                text: "{{ session('message') }}",
                icon: 'success',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Xóa dữ liệu trong sessionStorage sau khi người dùng nhấn OK
                    sessionStorage.clear();
                    location.reload();

                    // Nếu cần xóa cookie hoặc localStorage, bạn có thể thêm mã tương tự ở đây
                    // document.cookie = 'cookieName=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/';
                    // localStorage.clear();
                }
            });
        </script>
    @endif





    <script>


        const searchForm = document.querySelector("#search-form");
        const searchFormInput = searchForm.querySelector("input");
        const info = document.querySelector(".info");

        const searchButton = document.querySelector('.btn-search23')
        searchFormInput.addEventListener('focus', function() {
    // Tạo thẻ form mới
    const form = document.createElement('form');
    form.id = 'search-form';
    form.action = '#'; // Đặt action theo yêu cầu
    form.method = 'GET'; // Hoặc POST tùy vào yêu cầu

    // Di chuyển các phần tử con từ thẻ div vào thẻ form
    while (searchForm.firstChild) {
        form.appendChild(searchForm.firstChild);
    }

    // Thay thế thẻ div bằng thẻ form
    searchForm.parentNode.replaceChild(form, searchForm);

    // Tự động submit form khi nhấn vào nút search
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Ngăn form submit mặc định nếu muốn xử lý đặc biệt
        form.submit(); // Submit form
    });

    // Nếu có nút tìm kiếm, bạn có thể gán sự kiện submit vào nút
    searchButton.addEventListener('click', function() {
        form.submit();
    });
    });


        // Kiểm tra xem trình duyệt có hỗ trợ SpeechRecognition không
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

        if (SpeechRecognition) {
            console.log("Trình duyệt của bạn hỗ trợ nhận diện giọng nói");

            const recognition = new SpeechRecognition();
            recognition.continuous = true;
            recognition.interimResults = true; // Cho phép nhận diện kết quả tạm thời

            searchForm.insertAdjacentHTML("beforeend", '<a type="button"><i class="fas fa-microphone"></i></a>');
            searchFormInput.style.paddingRight = "50px";

            const micBtn = searchForm.querySelector("#search-form a:nth-child(3)");
            const micIcon = micBtn.firstElementChild;

            micBtn.addEventListener("click", () => {
                if (micIcon.classList.contains("fa-microphone")) {
                    recognition.start(); // Bắt đầu nhận diện giọng nói
                } else {
                    recognition.stop(); // Dừng nhận diện giọng nói
                }
            });

            recognition.addEventListener("start", () => {
                micIcon.classList.remove("fa-microphone");
                micIcon.classList.add("fa-microphone-slash");
                searchFormInput.focus();
                console.log("Nhận diện giọng nói đã kích hoạt, NÓI");
            });

            recognition.addEventListener("end", () => {
                micIcon.classList.remove("fa-microphone-slash");
                micIcon.classList.add("fa-microphone");
                searchFormInput.focus();
                console.log("Dịch vụ nhận diện giọng nói đã ngắt kết nối");
            });

            recognition.addEventListener("result", (event) => {
                let transcript = '';
                for (let i = event.resultIndex; i < event.results.length; i++) {
                    transcript += event.results[i][0].transcript;
                }
                searchFormInput.value = transcript; // Cập nhật giá trị trường nhập liệu với kết quả
            });


        } else {
            console.log("Trình duyệt của bạn không hỗ trợ nhận diện giọng nói");
            info.textContent = "Trình duyệt của bạn không hỗ trợ nhận diện giọng nói";
        }
    </script>
    <script>

ScrollReveal().reveal('.headline', { duration: 2000,container: '#list-product-wp' });
        ScrollReveal().reveal('.headline', { duration: 2000 });
        ScrollReveal().reveal('.widget1', { interval: 100 });
        ScrollReveal().reveal('.widget', { interval: 100 });
        ScrollReveal().reveal('#list-product-wp .widget1', {container: '#list-product-wp'});


      </script>
     <script src="https://code.jquery.com/ui/1.13.3/jquery-ui.js"></script>
    <script>
    $(function() {
    $(".btn-search123").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "{{ route('autocomplete') }}",
                data: {
                    query: request.term
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            label: item.name,
                            value: item.name,
                            id: item.id
                        };
                    }));
                }
            });
        },
        minLength: 2,
        select: function(event, ui) {
            // Có thể xử lý thêm khi người dùng chọn sản phẩm từ danh sách gợi ý
            console.log("Selected product ID: " + ui.item.id);
        }
    });
});

</script>
    </script>
    @stack('scripts')
</body>

</html>
