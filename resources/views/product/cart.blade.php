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
                                    <td>
                                        <input type="checkbox" id="check-all">
                                        <label for="check-all">Chọn sản phẩm</label>
                                    </td>
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
                                        <td>
                                            <input type="checkbox" class="product-checkbox" data-rowid="{{ $row->rowId }}"
                                                onchange="updateTotal()">
                                        </td>
                                        <td>
                                            <a href="" title="" class="thumb">
                                                <img src="{{ asset($row->options->image) }}" alt="">
                                            </a>
                                        </td>
                                        <td class="product-name">{{ $row->name }}</td>
                                        <td class="product-price">{{ number_format($row->price, 0, '', '.') }} đ</td>
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
                                                <span id="cart-subtotal">0 đ</span>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <div class="fl-right">
                                                <a href="javascript:void(0)" title="" id="delete-cart-all">Xoá đã
                                                    chọn</a>
                                                <a href="{{ route('cart.pay') }}" title="" id="checkout-cart">Thanh
                                                    toán</a>
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

        function updateTotal() {
            let total = 0;
            $('.product-checkbox:checked').each(function() {
                let row = $(this).closest('tr');
                let rowTotal = row.find('.row-total').text().replace(/[^0-9]/g, '');
                total += parseInt(rowTotal);
            });
            $('#cart-subtotal').text(total.toLocaleString() + ' đ');
        }

        // Xử lý sự kiện chọn tất cả
        $(document).on('change', '#check-all', function() {
            $('.product-checkbox').prop('checked', $(this).prop('checked'));
            updateTotal();
        });

        // Xử lý sự kiện click vào link Xoá đã chọn
        $(document).on('click', '#delete-cart-all', function() {
            if (confirm('Bạn có chắc chắn muốn xóa các sản phẩm đã chọn?')) {
                let selectedRows = $('.product-checkbox:checked').map(function() {
                    return $(this).data('rowid');
                }).get();
                if (selectedRows.length > 0) {
                    let url = "{{ route('cart.remove', ':ids') }}";
                    url = url.replace(':ids', selectedRows.join(','));
                    $.ajax({
                        url: url,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            window.location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr);
                            alert('Đã xảy ra lỗi! Vui lòng thử lại sau.');
                        }
                    });
                } else {
                    alert('Vui lòng chọn ít nhất một sản phẩm để xóa.');
                }
            }
        });
    </script>
@endpush
