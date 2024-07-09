@extends('layouts.home')
@section('title', 'ISMART STORE')
@section('content')
    <div id="main-content-wp" class="home-page clearfix">
        <div class="wp-inner">
            <div class="main-content fl-right">
                <div class="section" id="slider-wp">
                    <div class="section-detail">
                        <div class="item">
                            <img src="{{ asset('product/public/images/slider-01.png') }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('product/public/images/slider-02.png') }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('product/public/images/slider-03.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="section" id="support-wp">
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <li>
                                <div class="thumb">
                                    <img src="{{ asset('product/public/images/icon-1.png') }}">
                                </div>
                                <h3 class="title">Miễn phí vận chuyển</h3>
                                <p class="desc">Tới tận tay khách hàng</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{ asset('product/public/images/icon-2.png') }}">
                                </div>
                                <h3 class="title">Tư vấn 24/7</h3>
                                <p class="desc">1900.9999</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{ asset('product/public/images/icon-3.png') }}">
                                </div>
                                <h3 class="title">Tiết kiệm hơn</h3>
                                <p class="desc">Với nhiều ưu đãi cực lớn</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{ asset('product/public/images/icon-4.png') }}">
                                </div>
                                <h3 class="title">Thanh toán nhanh</h3>
                                <p class="desc">Hỗ trợ nhiều hình thức</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{ asset('product/public/images/icon-5.png') }}">
                                </div>
                                <h3 class="title">Đặt hàng online</h3>
                                <p class="desc">Thao tác đơn giản</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="section" id="feature-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm nổi bật</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">


                            @foreach ($products as  $product)

                            <li>
                                <a href="{{ route('detailProduct',$product->id) }}" title="" class="thumb">
                                    <img src="{{asset($product->images[0]->image_name )}}">
                                <a href="{{ route('detailProduct',$product->id) }}" title="" class="product-name">{{ $product->name }}
                                    </a>
                                <div class="price">

                                    @if ($product->sale_price >0)
                                    <span class="new">{{  number_format($product->sale_price, 0, '', '.')  }} đ</span>
                                    <span class="old">{{  number_format($product->price, 0, '', '.')  }} đ</span>
                                    @else
                                    <span class="new"> {{ number_format($product->price, 0, '', '.') }} đ</span>
                                    @endif



                                </div>
                                <div class="action clearfix">
                                    <a href="{{ route('cart.add',$product->id) }}" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            @endforeach


                            <li>
                                <a href="?page=detail_product" title="" class="thumb">
                                    <img src="{{ asset('product/public/images/img-pro-05.png') }}">
                                </a>
                                <a href="?page=detail_product" title="" class="product-name">Laptop Lenovo IdeaPad
                                    120S</a>
                                <div class="price">
                                    <span class="new">5.190.000đ</span>
                                    <span class="old">6.190.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?page=cart" title="" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="section" id="list-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Điện thoại</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <li>
                                <a href="?page=detail_product" title="" class="thumb">
                                    <img src="public/images/img-pro-16.png">
                                </a>
                                <a href="?page=detail_product" title="" class="product-name">Motorola Moto G5S
                                    Plus</a>
                                <div class="price">
                                    <span class="new">6.990.000đđ</span>
                                    <span class="old">8.990.000đđ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            <li>
                                <a href="?page=detail_product" title="" class="thumb">
                                    <img src="public/images/img-pro-15.png">
                                </a>
                                <a href="?page=detail_product" title="" class="product-name">Samsung Galaxy A5</a>
                                <div class="price">
                                    <span class="new">7.990.000đ</span>
                                    <span class="old">9.990.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            <li>
                                <a href="?page=detail_product" title="" class="thumb">
                                    <img src="public/images/img-pro-14.png">
                                </a>
                                <a href="?page=detail_product" title="" class="product-name">Sony Xperia XA
                                    Ultra</a>
                                <div class="price">
                                    <span class="new">6.990.000đ</span>
                                    <span class="old">7.990.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            <li>
                                <a href="?page=detail_product" title="" class="thumb">
                                    <img src="public/images/img-pro-13.png">
                                </a>
                                <a href="?page=detail_product" title="" class="product-name">Huawei Nova 2i</a>
                                <div class="price">
                                    <span class="new">5.990.000đ</span>
                                    <span class="old">8.990.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            <li>
                                <a href="?page=detail_product" title="" class="thumb">
                                    <img src="public/images/img-pro-12.png">
                                </a>
                                <a href="?page=detail_product" title="" class="product-name">Xiaomi Mi A1</a>
                                <div class="price">
                                    <span class="new">5.990.000đ</span>
                                    <span class="old">6.990.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            <li>
                                <a href="?page=detail_product" title="" class="thumb">
                                    <img src="public/images/img-pro-11.png">
                                </a>
                                <a href="?page=detail_product" title="" class="product-name">HTC U Ultra
                                    Sapphire</a>
                                <div class="price">
                                    <span class="new">16.490.000đ</span>
                                    <span class="old">18.490.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            <li>
                                <a href="?page=detail_product" title="" class="thumb">
                                    <img src="{{ asset('product/public/images/img-pro-08.png') }}">
                                </a>
                                <a href="?page=detail_product" title="" class="product-name">Sony Xperia XZ
                                    Dual</a>
                                <div class="price">
                                    <span class="new">9.990.000đ</span>
                                    <span class="old">10.990.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            <li>
                                <a href="?page=detail_product" title="" class="thumb">
                                    <img src="public/images/img-pro-10.png">
                                </a>
                                <a href="?page=detail_product" title="" class="product-name">Bphone 2017</a>
                                <div class="price">
                                    <span class="new">9.790.000đ</span>
                                    <span class="old">10.790.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="section" id="list-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Laptop</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <li>
                                <a href="" title="" class="thumb">
                                    <img src="public/images/img-pro-17.png">
                                </a>
                                <a href="" title="" class="product-name">Laptop Asus X441NA</a>
                                <div class="price">
                                    <span class="new">7.690.000đ</span>
                                    <span class="old">8.690.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            <li>
                                <a href="" title="" class="thumb">
                                    <img src="public/images/img-pro-18.png">
                                </a>
                                <a href="" title="" class="product-name">Laptop Lenovo IdeaPad 110</a>
                                <div class="price">
                                    <span class="new">9.490.000đ</span>
                                    <span class="old">10.490.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            <li>
                                <a href="" title="" class="thumb">
                                    <img src="public/images/img-pro-19.png">
                                </a>
                                <a href="" title="" class="product-name">Laptop Acer ES1 533</a>
                                <div class="price">
                                    <span class="new">7.490.000đ</span>
                                    <span class="old">9.490.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            <li>
                                <a href="" title="" class="thumb">
                                    <img src="public/images/img-pro-20.png">
                                </a>
                                <a href="" title="" class="product-name">Laptop Lenovo IdeaPad 110</a>
                                <div class="price">
                                    <span class="new">6.990.000đ</span>
                                    <span class="old">7.990.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            <li>
                                <a href="" title="" class="thumb">
                                    <img src="public/images/img-pro-21.png">
                                </a>
                                <a href="" title="" class="product-name">Laptop Asus X441NA</a>
                                <div class="price">
                                    <span class="new">6.490.000đ</span>
                                    <span class="old">8.490.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            <li>
                                <a href="" title="" class="thumb">
                                    <img src="public/images/img-pro-22.png">
                                </a>
                                <a href="" title="" class="product-name">Laptop Acer Aspire ES1</a>
                                <div class="price">
                                    <span class="new">6.390.000đ</span>
                                    <span class="old">7.390.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            <li>
                                <a href="" title="" class="thumb">
                                    <img src="{{ asset('product/public/images/img-pro-05.png') }}">
                                </a>
                                <a href="" title="" class="product-name">Laptop Lenovo IdeaPad 120S</a>
                                <div class="price">
                                    <span class="new">5.190.000đ</span>
                                    <span class="old">7.190.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                            <li>
                                <a href="" title="" class="thumb">
                                    <img
                                        src="data:image/webp;base64,UklGRs4KAABXRUJQVlA4IMIKAADwMQCdASqFAIUAPkkejUUioaESOL8wKASEs4Bo2mjWMC+O5JgB4d+Vn3d7g8z6JT2j/pvzF+OPcntnfqlxHoBOs21burf0U/9B61eJ76L7Af5j/2v94/KT5V/+n/S+nL6n/83uI/rR/zuyIgn0G69N9/8/bLg1gZESpbyCTxLOnNNCRz1n1ZeEwCzpT+xF4wfGhRsVDEcJMA5p5pTwNYXp1YT+MCGBsAbOBQrK/KURrzfP9KwJDMXaz35hN59+qTKWWewGFucmm05moKeDpUA6CYGaoIIiINiTNaaI/5Ui5z3IvpUTj1v5RZNX96BR4scwwFh8d0aRO20lbIXleGgnhj4Omj2Y1H7cJoTYLnaFUlMFlWow3IRrEO/40Qdq1ZW1xHE7Hzc3Ecf1J9H91MA8Dgp0avkxo1NwpT60PQfgO6FpMj7eQbo1iOlV1GHjA4frtxLiXG19BSGn1pqktLmfx02J+fBqza14L5H92B/5slU+5x8qe3FZd2+qP1LHghogZr87tltiBYfmPahvXd7omuBv9RIACAAA/v3Wu9OtfJuiQRsSzRD9MZ89c1aHtpI9DTUaqjLuq6/c2SldvMozCK43Ke9z+w8hdJtAUeM1ZTRoV8fiG2KE33l08++ROghWeVMfoduKuuRP4M3RXaBUOOrwPKEuhZJjhf93yvAaOHOXzvnfyrZGRtmPeKeKyR3cR+xz1GFSHtbLPP3X2uOCnC99dwCAbXr3BU/Ybh6X3G/Bh2ZCzeHxgCY0B8pvAC6+619Ra0fuEr4XxmmMobMwvZrdVmaQP/9iH5AGyn6Ml4nzrlSqUi9q9QWIYsPWdsL++nMt+lzXml3Jxorgv/gws0LuTwEF2y6HU2+rN/oE5cSuLuy6gbUnOxxHwX3Ev/tJhn5bulx3TZJWcNPRFSSSchJ9Fg7oEvgsCht38+NwQ36besh0aDl/PwSQAJopB7CFmoc99YQP8MGMp2DcQqdYfa7pUdY2oQWBZq9WqrI706Mu5B1byL1H1dOwA3cU+xcPRcYzHVwTxs4kYuir8pMcQV/Ipj9roSJWnFdrUNf2bErDOEF5PpazgrR2PL9ZpLW5NKZhIBcBrHRe+ovOyRMIiYozKPXx/3bQ3nIUAWRVdNWwSRMrmvNnVOS3/mV1Obk6A/7R4BfD5f67wJpTBxjtFTKliMRIjz7mQloP/C6H1QppE3iVdyxlIj1To0pJCwOP/PXGfaftRkk+DPxR6LNeeYC5KNBD/dA/k6q5NOEcVtwT9CfWWcuZTJcitn6UtfnuJE+t/1b6lFTi7D5FUKUlfz9AO1twFAnU6BE0Kxk7GZAiJZz9FuY5dQLsWwCAUPQU8dovbuiju9E8itqE4x2xF4vT4bl+bE8lpc+Ri5mqkAf2x2KdEL/MWMWUZ/SUOtB/ArFxdkD3palpnny8/MOuCdvESNeQWTJbRnox6PevDyjDgMP1IcYEQZCeAlzak7GYyZtsiTFapTxN9InBinLM9C4TwfoTNEd0StaecztUrU7JtbHfaLqJ63COFKbloxSqNcPwEp16xuhPAj5w109GCc8lLnuTfrgdPfJ2HigNwxvnYgw75p9pLDmUyETSbTMVxg8W+i9VT5W5bgp0K6mYOiJzZM8UUxvIj4TuscZOdOHgSI8R5FtrfvRnmgJFYdeYm/Qx+dfNcEQIwm4kitwabsg84neYHY751IU/N9SW1lTFCYMfb6fFMLgJ8QsHzWpzfwUnaxGg5MU6rezN/lLHKY0OFD2uIWKZ+6rC+TyhDaHZdInQiUusOv8Jy+FZhC//Bh9GF/LUAilRrzVP15Yda+bLwlFHZVWpPVDlBsVnaps2ybBU1SvmmjrervTYJijGhw+O15a6TOdngjN4EQSB/Sq990vW2dUoIj+DPL5q/IXv/zpN1GP5u+UIlI0FoLu8OMnVPw4F0vPmx9hfp0UIN2+U9chL4JgG08Kimb+vbz4ft73AIPKwDbjmxI1wYXjU8p2AR279yXivytZWPoqe65O/tffx9TDq+/Z298bVDBap2z6UiXuhx9V9f8h5wSk40r5YnmeVzujQ2E+zSWJ/7Qv+MxCA65Xy8VHTrREt90jzSIT4IS+toQAdpM09zT5DznJa6lXo/KNoVaWkm5FQbHGSyCYFuazPUKleRCdU+h4CIDDdEhzmwHsKYl8beuEntyun4Y7gyO13mIoDmu8f4v7/VB9BLGNrt2yc07sljKrlr29oDPsvPcsXMYWdKwOoeM5hUwWUJ7oXVIWIhAgEZ9aS6btxLyzV9ICLrk/BqvKcpx7Yn54e1dsX7YAfR5wpQfuGZ4rQSVrZTfykC/OE11QzLa90dOEjI0y0mufX/85LS5LrKeUb0Kh7I+PfmfeOFCFPrBFylXuFRKRBYPa8RMqYjfjFplUw1rrmzPzFtMu4PWI646YBujGIWb1zhlN5W/dDvT/rJ1qtnRdZrBjTMmOOhInNnFxtCiy5WX9/h41X/VMPEzvzcTb/KdMXF1PN16YWzl1FsAfsPAdBPAgVpXUu/7wXJv4YhR+C4EFsyNYVtkAQi7HiCT7OPUU2gQobt9aCs2LBJnUjBI6/BYu5O8s0Ro3QQBUH037y3am0Qa9/DKaqSDBOlf/hg9uX0MbmPfDv5hp/r0rfGqcJk7wVHS5qvHDPdM5aH1hr/H/pZ4NX0zSgfIEGGHkuYNq7Ck3z/ueOsQc4VkRDhKVtwLo3YDKhuUD81HwG2n2o2H2usk4QUOOj9mPrKsYD95dxEWFJzzTAzdmBzgOpHbzq2nTiZjXggITsG/2QhLO/KeUNuUOBpF3WVd7wlSWJd3gdtRZWva9JxlGdpCzXv/sEGLBcOJfJO6oGFUG5AtWpp3FyCz1gSIc4RWnMAAiZ9of8J3yYpgGldGFewtoiAnUfKOZwqXE2zuMXs7KWmNwQbbEEHgtIS5wFJW7GgSQfq+ZpeVc5HdunuiOTVkzW4/yJijkeMX91tC7eQnTXrRJpPCMwh3OA5SWb0yAt/KIURyOc8BrRgASkYZAo0tO0XI0+Ql7nggSWeZfJcsDJIwYbKdYJZtfQEQSmyW7R+hpJLntuBS7Yz5Ra/M7Q2mdSiLedb0gSwy6GN5BSQtC0fiW/TWxQ7NP8PPsGnU/Yf6ZfwcXxl/IN569O6zs1Nq85GwZjls064vemYpAWGraadAt3I0/i8GMPYLGbpQytVkja5RkEzTEE1iphVv6J5uynEtUKAUifJ8x9D92YujBF5ba+sjKg4wv8yghbVv6erOwETyyUzc+ZaX/Q3VFI9QeZMOgnNSQpXdGgvV4gkE/WZlkDzvdkzWw+riphy9jRnc8dVvXgNTZYR0nBrEp7v61BLLmrPaDw80edlFDVspubJLswWPL3AXXhc+UdnxG1y/6DCthTSkkXgfX1HelmW8wWP8GoDKAKgBLrFzRL5dwDkIfnBkgL/QLsVrJ3M6HbmJr+EVhN5G335PEMQpYBxwL/Pg829c9vX1VrbIB8e3ZWRXmwywB6ey95UzPawYrzCPVa3N0PL09ECXAX+am4fuxq7UI73L/ypm8Qop6uDUCa+HdJcV6nnfKwEtFlNkIC+jxrYQ3zq+lYUZIW7Blgd103f21iU+aZqPc/TgqBPJRgorIAG0nw7F5kPJsg/d9U0sVAzo3sZHqj9ZgJp/4t1FA3T3ZN8SJm5AA=">
                                </a>
                                <a href="" title="" class="product-name">Laptop Asus A540UP I5</a>
                                <div class="price">
                                    <span class="new">14.490.000đ</span>
                                    <span class="old">16.490.000đ</span>
                                </div>
                                <div class="action clearfix">
                                    <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                    <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="sidebar fl-left">
               {{-- !Category --}}
                @include('layouts.navbar')

              @include('layouts.selling')
                <div class="section" id="banner-wp">
                    <div class="section-detail">
                        <a href="" title="" class="thumb">
                            <img src="public/images/banner.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
