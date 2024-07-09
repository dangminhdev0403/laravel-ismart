@extends('layouts.home')
@section('title', 'Giỏ hàng của bạn')
@section('content')
    <div id="main-content-wp" class="cart-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="?page=home" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="" title="">Giỏ hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="wrapper" class="wp-inner clearfix">
            <div class="section" id="info-cart-wp">
                <div class="section-detail table-responsive">
                    @if (Cart::count() > 0)
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Mã sản phẩm</td>
                                    <td>Ảnh sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Giá sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td>Thành tiền</td>
                                    <td colspan="2">Thao tác</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (Cart::content() as $row)
                                    <tr data-row-id="{{ $row->rowId }}">
                                        <td>{{ $row->rowId }}</td>
                                        <td>
                                            <a href="" title="" class="thumb">
                                                <img src="{{ asset($row->options->image) }}" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="" title="" class="name-product">{{ $row->name }}</a>
                                        </td>
                                        <td>{{ number_format($row->price, 0, '', '.') }} đ</td>
                                        <td>
                                            <input type="number" name="quantity" min="1" value="{{ $row->qty }}"
                                                data-rowid="{{ $row->rowId }}" onchange="updateQuantity(this)"
                                                class="num-order qty">
                                        </td>
                                        <td class="row-total">{{ number_format($row->total, 0, '', '.') }} đ</td>
                                        <td>
                                            <a href="{{ route('cart.remove', $row->rowId) }}" title=""
                                                class="del-product">
                                                <i class="fa-solid fa-trash-can" style="color: #de1212;"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7" style="border: none">
                                        <div class="clearfix">
                                            <p id="total-price" class="fl-right">Tổng giá:
                                                <span id="cart-subtotal">{{ Cart::subtotal() }} đ</span>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <div class="fl-right">
                                                <a href="{{ route('cart.destroy') }}" title="" id="delete-cart-all">Xoá tât cả </a>
                                                <a href="?page=checkout" title="" id="checkout-cart">Thanh toán</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                    @else
                        <div class="alert alert-danger text-center " style="margin-top: 119px;">
                            Bạn chưa có sản phẩm nào trong giỏ hàng
                        </div>
                    @endif
                    <div class="section" id="action-cart-wp">
                        <div class="section-detail" style="height: 200px">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form id="updateQty" action="{{ route('cart.update') }}" method="POST">
        @csrf
        @method('put')
        <input type="hidden" id="rowId" name="rowId">
        <input type="hidden" id="quantity" name="quantity">
    </form>
@endsection

@push('scripts')
    <script>
        function updateQuantity(qty) {
            $('#rowId').val($(qty).data('rowid'));
            $('#quantity').val($(qty).val());
            $('#updateQty').submit();
        }
    </script>
@endpush
