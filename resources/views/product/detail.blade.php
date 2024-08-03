@section('title', 'Chi Tiết Sản Phẩm')
@extends('layouts.home')
@push('style')
<style>
    .description {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 10; /* Hiển thị 3 dòng đầu tiên */
        -webkit-box-orient: vertical;
    }

    .description.expanded {
        -webkit-line-clamp: unset; /* Hiển thị toàn bộ nội dung khi mở rộng */
    }

    #show-more {
        cursor: pointer;
        color: blue;
        text-decoration: underline;
    }



</style>






@endpush
@section('content')
    <div id="main-content-wp" class="clearfix detail-product-page">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="{{ route('home') }}" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="{{ route('getProductByCategory', $product->category->slug) }}" title="">
                                {{ $product->category->name }}</a>
                        </li>
                        <li>
                            <a href="{{ route('detailProduct', $product->id) }}" title=""> {{ $product->name }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content fl-right">
                <div class="section" id="detail-product-wp">
                    <div class="section-detail clearfix">
                        <div class="thumb-wp fl-left">
                            <a href="" title="" id="main-thumb">
                                <img id="zoom" src="{{ asset($product->images[0]->image_name) }}" width="350px" height="350px" data-zoom-image="{{  $product->images[0]->image_name}}" />
                            </a>

                            <div id="list-thumb" class="zoom-gallery">

                                <a href=""
                                    data-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_ab1f47_350x350_maxb.jpg"
                                    data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_70aaf2_700x700_maxb.jpg">
                                    <img id="zoom"
                                        src="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_02d57e_50x50_maxb.jpg" />
                                </a>
                                <a href=""
                                    data-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_ab1f47_350x350_maxb.jpg"
                                    data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_70aaf2_700x700_maxb.jpg">
                                    <img id="zoom"
                                        src="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_02d57e_50x50_maxb.jpg" />
                                </a>
                                <a href=""
                                    data-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_ab1f47_350x350_maxb.jpg"
                                    data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_70aaf2_700x700_maxb.jpg">
                                    <img id="zoom"
                                        src="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_02d57e_50x50_maxb.jpg" />
                                </a>
                                <a href=""
                                    data-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_ab1f47_350x350_maxb.jpg"
                                    data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_70aaf2_700x700_maxb.jpg">
                                    <img id="zoom"
                                        src="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_02d57e_50x50_maxb.jpg" />
                                </a>
                                <a href=""
                                    data-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_ab1f47_350x350_maxb.jpg"
                                    data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_70aaf2_700x700_maxb.jpg">
                                    <img id="zoom"
                                        src="https://media3.scdn.vn/img2/2017/10_30/sxlpFs_simg_02d57e_50x50_maxb.jpg" />
                                </a>
                                <a href=""
                                    data-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_ab1f47_350x350_maxb.jpg"
                                    data-zoom-image="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_70aaf2_700x700_maxb.jpg">
                                    <img id="zoom"
                                        src="https://media3.scdn.vn/img2/2017/10_30/BlccRg_simg_02d57e_50x50_maxb.jpg" />
                                </a>
                            </div>
                        </div>
                        <div class="thumb-respon-wp fl-left">
                            <img src="{{ asset('public/images/img-pro-01.png') }}" alt="">
                        </div>
                        <div class="info fl-right">
                            <h3 class="product-name">{{ $product->name }}</h3>
                            <div class="desc">
                                {!! $product->description !!}
                            </div>
                            <div class="num-product">
                                <span class="title">Tình trạng: </span>
                                @if ($product->quantity == 0)
                                    <span class="status">Hết hàng</span>
                                @else
                                    <span class="status">Còn hàng</span>
                                @endif




                            </div>

                            @if ($product->sale_price > 0)
                                <p class="price">{{ number_format($product->sale_price, 0, '', '.') }}đ</p>
                            @else
                                <p class="price">{{ number_format($product->price, 0, '', '.') }}đ</p>
                            @endif
                            <form method="post" action="{{ route('cart.add', $product->id) }}" id="formCart">
                                @csrf
                                <div id="num-order-wp">
                                    <a title="" id="minus"><i class="fa fa-minus"></i></a>

                                    <input type="text" name="quantity" value="1" min="1" max="{{ $product->quantity }}"id="num-order">
                                    <a title="" id="plus"><i class="fa fa-plus"></i></a>
                                </div>
                                @if ($product->quantity > 0)
                                <a href="#" title="Thêm giỏ hàng" class="add-cart" onClick="submitForm(event)">Thêm
                                    giỏ hàng</a>
                                <a href="#" title="Thêm giỏ hàng" class="add-cart buy-now" onclick="submitForm2()">Mua
                                    ngay</a>
                                @else
                                    <h4 class="alert alert-danger text-center">Đã hết hàng</h4>
                                @endif

                            </form>

                        </div>
                    </div>
                </div>
                <div class="section" id="post-product-wp">
                    <div class="section-head">
                        <h3 class="section-title"  id="product-description2">Mô tả sản phẩm</h3>
                    </div>
                    <div class="section-detail description " id="product-description">
                        {!! $product->content !!}


                    </div>

                    <div id="show-more" class="show-more">Xem thêm</div>

                </div>

                <div class="section" id="same-category-wp">
                    <div class="section-head">
                        <h3 class="section-title">Cùng chuyên mục</h3>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item">

                            @foreach ($products_same as $product_same)
                                <li>
                                    <a href="" title="" class="thumb">
                                        <img src="{{ asset($product_same->images[0]->image_name) }}"
                                            style="width: 133px ; height: 133px; object-fit: cover;">
                                    </a>
                                    <a href="" title="" class="product-name">{{ $product_same->name }}</a>
                                    <div class="price">

                                        @if ($product->sale_price > 0)
                                            <span class="new">{{ number_format($product->sale_price, 0, '', '.') }}
                                                đ</span>
                                            <span class="old">{{ number_format($product->price, 0, '', '.') }}
                                                đ</span>
                                        @else
                                            <span class="new"> {{ number_format($product->price, 0, '', '.') }}
                                                đ</span>
                                        @endif



                                    </div>

                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="sidebar fl-left">
               @include('layouts.navbar')
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('num-order');
    const minValue = parseInt(input.min, 10);
    const maxValue = parseInt(input.max, 10);

    // Đặt sự kiện click cho nút giảm
    document.getElementById('minus').addEventListener('click', function() {
        let value = parseInt(input.value, 10);
        if (value > minValue) {
            input.value = value - 1;
        }
    });

    // Đặt sự kiện click cho nút tăng
    document.getElementById('plus').addEventListener('click', function() {
        let value = parseInt(input.value, 10);
        if (value < maxValue) {
            input.value = value + 1;
        }
    });

    // Theo dõi sự thay đổi của ô input để đảm bảo giá trị không vượt quá max
    input.addEventListener('input', function() {
        let value = parseInt(input.value, 10);
        if (value > maxValue) {
            input.value = maxValue;
        }
        if (value < minValue) {
            input.value = minValue;
        }
    });
});


    document.getElementById('plus').addEventListener('click', function() {
        const input = document.getElementById('num-order');
        let value = parseInt(input.value);
        if (value < parseInt(input.max)) {
            input.value = value + 1;
        }
    });
</script>
<script>

    document.getElementById('show-more').addEventListener('click', function() {
        const desc = document.getElementById('product-description');
        if (desc.classList.contains('expanded')) {
            desc.classList.remove('expanded');
            this.textContent = 'Xem thêm';
        } else {
            desc.classList.add('expanded');
            this.textContent = 'Thu gọn';
        }
    });
</script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('message'))
        <script>
            Swal.fire({
                title: "Thành công",
                text: "{{ session('message') }}",
                icon: "success",
                showConfirmButton: true,
                confirmButtonText: "OK",

            });
            @php
            session(['message' => null]);
         @endphp
        </script>
    @endif
    <script>
        function submitForm(event) {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ a
            event.target.closest('form').submit(); // Gọi hàm submit của form
        }
        function submitForm2() {
            event.preventDefault(); // Ngăn chặn hành vi mặc định của thẻ a
            const form = document.getElementById('formCart');
            form.action = "{{ route('cart.payOne',$product->id) }}";  // Đặt URL mới cho thuộc tính action

            form.submit(); // Gọi hàm submit của form
        }


    </script>
@endpush
