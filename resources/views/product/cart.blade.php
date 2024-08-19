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

                    <form action="{{ route('cart.pay') }}" method="post" id="myForm">
                        @csrf
                        @if (Cart::count() > 0)
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="check-all" name="check-all">
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
                                                <input type="checkbox" class="product-checkbox"
                                                    name="products[{{ $loop->index }}][selected]" value="1"
                                                    onchange="updateTotal()">
                                                <input type="hidden" name="products[{{ $loop->index }}][rowId]"
                                                    value="{{ $row->rowId }}">
                                                <input type="hidden" name="products[{{ $loop->index }}][name]"
                                                    value="{{ $row->name }}">
                                                <input type="hidden" name="products[{{ $loop->index }}][quantity]"
                                                    value="{{ $row->qty }}">
                                                <input type="hidden" name="products[{{ $loop->index }}][price]"
                                                    value="{{ $row->price }}">
                                            </td>
                                            <td>
                                                <a href="{{ route('detailProduct',$row->id) }}" title="" class="thumb">
                                                    <img src="{{ asset($row->options->image) }}" alt="">
                                                </a>
                                            </td>
                                            <td class="product-name">

                                                <a href="{{ route('detailProduct',$row->id) }}" style="color: #000">

                                                {{ $row->name }}
                                                </a>
                                            </td>
                                            <td class="product-price">{{ number_format($row->price, 0, '', '.') }} đ</td>
                                            <td>
                                                <input type="number" name="Qty" min="1"
                                                    value="{{ $row->qty }}" data-rowid="{{ $row->rowId }}"
                                                    onchange="updateQuantity(this)" class="num-order qty">

                                            </td>
                                            <td class="row-total">{{ number_format($row->total, 0, '', '.') }} đ</td>
                                            <td>
                                                <a href="{{ route('cart.remove', $row->rowId) }}" title=""
                                                    class="del-product btn delete-link" onclick="deleteCategory(event)">
                                                    <i class="fa-solid fa-trash-can delete-link" style="color: #de1212;"></i>
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


                                                    <button id="checkout-cart">Thanh toán</button>
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
                    </form>
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
    $(document).ready(function() {
        // Gán sự kiện click cho thẻ i
        $('a.del-product i').on('click', function(event) {
            // Ngăn không cho sự kiện click trên thẻ i ảnh hưởng đến thẻ a
            event.stopPropagation();
        });

        // Gán sự kiện click cho thẻ a
        $('a.del-product').on('click', function() {
            // Xử lý sự kiện click cho thẻ a tại đây (nếu cần)
        });
    });
    </script>
    <script>
        const deleteLinks = document.querySelectorAll('.delete-link');

        deleteLinks.forEach(link => {
            link.addEventListener('click', function(event) {
                if (event.target.tagName === 'I') {
                    event.preventDefault();
                    event.stopPropagation();
                    this.parentNode.click();
                }
            });
        });

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
    </script>
    @if (session('error'))
        <script>
            Swal.fire({
                title: "Lỗi",
                text: "{{ session('error') }}",
                icon: "error",
                showConfirmButton: true,
                confirmButtonText: "OK",

            });
        </script>
    @endif


    @if (session('message'))
        <script>
            Swal.fire({
                title: "Thành công",
                text: "{{ session('message') }}",
                icon: "success",
                showConfirmButton: true,
                confirmButtonText: "OK",

            });
        </script>
    @endif

    <script>
        document.addEventListener('click', function(event) {
            if (event.target.classList.contains('delete-link')) {
                event.preventDefault(); // Ngăn chặn hành động mặc định của liên kết
                deletebrand(event.target);
            }
        });

        function deletebrand(link) {
            const url = link.href;


            Swal.fire({
                title: "Xác nhận xóa",
                text: `Bạn có chắc chắn muốn xóa sản phẩm?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xóa",
                cancelButtonText: "Hủy",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url; // Chỉ thực hiện khi đã xác nhận xóa
                }
            });
        }
    </script>
    <script>
         $(document).ready(function() {
    $('#delete-cart-all').on('click', function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

        Swal.fire({
            title: "Xác nhận",
            text: "Bạn có chắc chắn muốn xoá đơn hàng?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Chắc chắn",
            cancelButtonText: "Không",
        }).then((result) => {
            if (result.isConfirmed) {  // Chỉ submit form khi người dùng xác nhận
                // Đổi action của form
                $('#myForm').attr('action', '{{ route('cart.deleteSelected') }}');

                // Submit form
                $('#myForm').submit();
            }
        });
    });
});
    </script>
@endpush
