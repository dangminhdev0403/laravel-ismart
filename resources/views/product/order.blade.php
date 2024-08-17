@extends('layouts.home')
@section('title', 'Quản lí đơn hàng')
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
                            <a href="" title="">Quản lí đơn hàng</a>
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
                        @if (!empty($orders))
                            <table class="table">

                                <thead>
                                    <tr>
                                        <td>
                                            <div style="display: flex; ">
                                                <input type="checkbox" id="check-all" name="check-all"
                                                    style="cursor: pointer;">
                                                <label for="check-all" style="cursor: pointer;">Chọn sản phẩm</label>

                                            </div>
                                        </td>
                                        <td>Ngày tạo đơn</td>
                                        <td>Ảnh sản phẩm</td>
                                        <td>Tên sản phẩm</td>
                                        <td>Giá sản phẩm</td>
                                        <td>Số lượng</td>
                                        <td>Thành tiền</td>
                                        <td>Trạng thái</td>
                                        <td colspan="2">Thao tác</td>
                                    </tr>

                                </thead>
                                <tbody>
                                    @foreach ($orders as $row)
                                        <tr data-row-id="{{ $row->rowId }}">
                                            @if ($row['status'] == 'pending')
                                                <td>
                                                    <input type="checkbox" class="product-checkbox"
                                                        name="products[{{ $row->id }}][selected]" value="1"
                                                        onchange="updateTotal()">
                                                </td>
                                            @else
                                                <td></td>
                                            @endif
                                            <td>
                                                {{ $row->formatted_date }}
                                            </td>
                                            <td>
                                                <a href="{{ route('detailProduct', $row->id) }}"
                                                    title=" {{ $row->name }}" class="thumb">


                                                    @foreach ($row->products as $product)
                                                        <img src="{{ asset($product->images[0]->image_name) }}"
                                                            alt="" style="max-width: 100%; height: auto;">
                                                    @endforeach



                                                </a>
                                            </td>
                                            <td class="product-name">

                                                <a href="{{ route('detailProduct', $row->id) }}" style="color: #000">
                                                    {{-- {{ $row->products[0]->name  }} --}}
                                                    @foreach ($row->products as $product)
                                                        {{ $product->name }}
                                                    @endforeach





                                                </a>
                                            </td>

                                            <td>
                                                <p>{{ $row->total_price }}</p>

                                            </td>
                                            <td>
                                                3
                                            </td>
                                            <td>
                                                <p>{{ $row->total_price }}</p>
                                            </td>
                                            <td>
                                                @if ($row['status'] == 'pending')
                                                    <p class="alert-warning"> chờ xử lí</p>
                                                @elseif ($row['status'] == 'cancel')
                                                    <p class="alert-danger"> đã hủy</p>
                                                @else
                                                    <p class="alert-primary"> thành công</p>
                                                @endif

                                            </td>
                                            @if ($row['status'] == 'pending')
                                                <td>
                                                    <a href="{{ route('order.cancel', $row->id) }}" title=""
                                                        class="del-product btn btn-danger delete-link "
                                                        onclick="deleteCategory()" style="color: white">
                                                        Hủy
                                                    </a>
                                                </td>
                                            @else
                                                <td></td>
                                            @endif


                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot class="mt-2">

                                    <tr>
                                        <td></td>
                                        <td colspan="7">
                                            <div class="clearfix" style="margin-bottom: 1px; margin-top: 17px;">
                                                <div class="fl-right">
                                                    <a href="javascript:void(0)" title="" id="delete-cart-all"
                                                       >Huỷ đơn hàng đã chọn
                                                        chọn</a>



                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        @else
                            <div class="alert alert-danger text-center " style="margin-top: 119px;">
                                Bạn chưa có đơn hàng nào
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
                title: "Xác nhận ",
                text: `Bạn có chắc chắn muốn hủy đơn hàng?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Chắc chắn",
                cancelButtonText: "Không",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url; // Chỉ thực hiện khi đã xác nhận xóa
                }
            });
        }$(document).ready(function() {
    $('#delete-cart-all').on('click', function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

        Swal.fire({
            title: "Xác nhận",
            text: "Bạn có chắc chắn muốn hủy đơn hàng?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Chắc chắn",
            cancelButtonText: "Không",
        }).then((result) => {
            if (result.isConfirmed) {  // Chỉ submit form khi người dùng xác nhận
                // Đổi action của form
                $('#myForm').attr('action', '{{ route('order.deleteSelected') }}');

                // Submit form
                $('#myForm').submit();
            }
        });
    });
});


        // $(document).ready(function() {
        //     $('#delete-cart-all').on('click', function(e) {
        //             e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>
        //             Swal.fire({
        //                 title: "Xác nhận ",
        //                 text: `Bạn có chắc chắn muốn hủy đơn hàng?`,
        //                 icon: "warning",
        //                 showCancelButton: true,
        //                 confirmButtonColor: "#3085d6",
        //                 cancelButtonColor: "#d33",
        //                 confirmButtonText: "Chắc chắn",
        //                 cancelButtonText: "Không",
        //             }).then((result) => {
        //                     // Đổi action của form
        //                     $('#myForm').attr('action', '{{ route('order.deleteSelected') }}');

        //                     // // Submit form
        //                     $('#myForm').submit();
        //                 }
        //             });

        //     });
        // });
    </script>
@endpush
