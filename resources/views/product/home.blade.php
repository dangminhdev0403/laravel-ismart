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
                        @if ($products->isEmpty())
                            <h3 class="text-danger  text-center">Không có sản phẩm nào trong danh mục này</h3>
                        @else
                            @php
                                $count1 = 0;
                            @endphp
                            <ul class="list-item">
                                @foreach ($products as $product)
                                    @if ($count1 >= 8)
                                    @break
                                @endif
                                @php
                                $count1++;
                                @endphp
                                <li style="  padding:   10px 10px 7px;">
                                    <a href="{{ route('detailProduct', $product->id) }}" title="" class="thumb">
                                        <img
                                            src="{{ asset($product->images[0]->image_name) }}"style="width: 133px ; height: 133px; object-fit: cover; padding:0px 0px 0px 23px;">
                                    </a>
                                    <a href="{{ route('detailProduct', $product->id) }}" title=""
                                        class="product-name">{{ $product->name }}  </a>

                                    <div class="price">
                                        @if ($product->sale_price > 0)
                                            <span
                                                class="new">{{ number_format($product->sale_price, 0, '', '.') }}</span>
                                            <span
                                                class="old">{{ number_format($product->price, 0, '', '.') }}</span>
                                        @else
                                            <span
                                                class="new">{{ number_format($product->price, 0, '', '.') }}</span>
                                        @endif
                                    </div>

                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            @foreach ($categories as $category)
                @unless ($category->products->Isempty())
                    <div class="section" id="list-product-wp">
                        <div class="section-head" style="display: flex  justify-content: space-between;">

                            <h3 class="section-title">{{ $category->name }}</h3>
                            <a href="{{ route('getProductByCategory', $category->slug) }}"
                                style="float: right; color: rgb(205, 10, 114) ;"> <u>xem thêm</u></a>


                        </div>
                        <div class="section-detail">
                            <ul class="list-item clearfix">

                                @foreach ($category->products as $product)
                                    <li style="  padding:   10px 10px 7px;">
                                        <a href="{{ route('detailProduct', $product->id) }}" title="" class="thumb">
                                            <img
                                                src="{{ asset($product->images[0]->image_name) }}"style="width: 133px ; height: 133px; object-fit: cover; padding:0px 0px 0px 23px;">
                                        </a>
                                        <a href="{{ route('detailProduct', $product->id) }}" title=""
                                            class="product-name">{{ $product->name }} </a>

                                        <div class="price">
                                            @if ($product->sale_price > 0)
                                                <span
                                                    class="new">{{ number_format($product->sale_price, 0, '', '.') }}</span>
                                                <span
                                                    class="old">{{ number_format($product->price, 0, '', '.') }}</span>
                                            @else
                                                <span
                                                    class="new">{{ number_format($product->price, 0, '', '.') }}</span>
                                            @endif
                                        </div>

                                    </li>
                                @endforeach


                            </ul>
                        </div>
                    </div>
                @endunless
            @endforeach

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
@push('scripts')
<script>
    @if (session('message'))
        <
        script >
            Swal.fire({
                title: "Thành công",
                text: "{{ session('message') }}",
                icon: "success",
                showConfirmButton: true,
                confirmButtonText: "OK",

            });
</script>
@endif
</script>
@endpush
