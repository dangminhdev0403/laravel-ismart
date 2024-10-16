@extends('layouts.home')
@section('title', 'Trang sản phẩm')
@push('ScrollReveal')
    <script>
        ScrollReveal({
            reset: true
        });
    </script>
@endpush
@section('content')
    <div id="main-content-wp" class="clearfix category-product-page">
        <div class="wp-inner">
            <div class="secion" id="breadcrumb-wp">
                <div class="secion-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">Trang chủ</a>
                        </li>

                        <li>
                            <a href="" title=""> {{ $category_name }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-content fl-right">
                <div class="section" id="list-product-wp">
                    <div class="section-head clearfix">
                        <h3 class="section-title fl-left headline">{{ $category_name }}</h3>

                    </div>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            @if ($products->isEmpty())
                                <p class="alert alert-danger text-center">Không có sản phẩm nào trong danh mục này</p>
                            @else
                                @foreach ($products as $product)
                                    <li style="height: 274px; width: 239.133px;" class="widget2">
                                        <a href="{{ route('detailProduct', $product->id) }}" title="" class="thumb">
                                            <img src="{{ asset($product->images[0]->image_name) }}"
                                                style="width: 139px; height: 145px; ">
                                        </a>
                                        <a href="{{ route('detailProduct', $product->id) }}" title=""
                                            class="product-name">{{ $product->name }}
                                        </a>
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
                            @endif


                        </ul>
                    </div>
                </div>
                {{-- <div class="section" id="paging-wp">
                    <div class="section-detail">

                    </div>
                </div> --}}
            </div>
            <div class="sidebar fl-left">
                @include('layouts.navbar')
                <div class="section" id="filter-product-wp">
                    <div class="section-head">
                        <h3 class="section-title">Bộ lọc</h3>
                    </div>
                    <div class="section-detail">
                        <form method="get" action="{{ url()->current() }}">
                            <!-- Sắp Xếp -->
                            <table>
                                <thead>
                                    <tr>
                                        <td colspan="2">Sắp Xếp</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="radio" name="sort" value="1" {{ $select == 1 ? 'checked' : '' }} {{ $select == null ? 'checked' : '' }}></td>
                                        <td>Từ A-Z</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="sort" value="2" {{ $select == 2 ? 'checked' : '' }}></td>
                                        <td>Từ Z-A</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="sort" value="3" {{ $select == 3 ? 'checked' : '' }}></td>
                                        <td>Giá cao xuống thấp</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="sort" value="4" {{ $select == 4 ? 'checked' : '' }}></td>
                                        <td>Thấp lên cao</td>
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Giá -->
                            <table>
                                <thead>
                                    <tr>
                                        <td colspan="2">Giá</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="radio" name="price" value="null" {{ $status == "null" ? 'checked' : '' }}></td>
                                        <td>không</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="price" value="t1-0-500" {{ $status == "t1" ? 'checked' : '' }}></td>
                                        <td>Dưới 500.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="price" value="t2-500-1000"  {{ $status == "t2" ? 'checked' : '' }}></td>
                                        <td>500.000đ - 1.000.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="price" value="t3-1000-5000"  {{ $status == "t3" ? 'checked' : '' }}></td>
                                        <td>1.000.000đ - 5.000.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="price" value="t4-5000-10000"  {{ $status == "t4" ? 'checked' : '' }}></td>
                                        <td>5.000.000đ - 10.000.000đ</td>
                                    </tr>
                                    <tr>
                                        <td><input type="radio" name="price" value="t5-10000-PHP_INT_MAX"  {{ $status == "t5" ? 'checked' : '' }}></td>
                                        <td>Trên 10.000.000đ</td>
                                    </tr>
                                </tbody>
                            </table>

                            <button type="submit" class="btn btn-outline-secondary text-black">Lọc</button>
                        </form>

                    </div>
                </div>
                <div class="section" id="banner-wp">
                    <div class="section-detail">
                        <a href="?page=detail_product" title="" class="thumb">
                            <img src="public/images/banner.png" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script></script>
@endpush
