@extends('layouts.home')
@section('title', 'Thanh toán')
@section('content')

    <div id="main-content-wp" class="checkout-page">
        <div class="section" id="breadcrumb-wp">
            <div class="wp-inner">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="{{ route('home') }}" title="">Trang chủ</a>
                        </li>
                        <li>
                            <a href="#" title="">Thanh toán</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="wrapper" class="wp-inner clearfix">
            <div class="section" id="customer-info-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin khách hàng</h1>
                </div>
                <form method="post" action="{{ route('cart.checkout') }}" name="form-checkout" id="myForm">
                    @csrf

                    <div class="section-detail">
                        <div class="form-row clearfix">
                            <div class="form-col fl-left">
                                <label for="name">Họ tên</label>
                                <input type="text" name="name" id="name">
                                <span class="text-danger" id="fullnameError"></span>
                            </div>
                            <div class="form-col fl-right">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email">
                                <span class="text-danger" id="emailError"></span>

                            </div>
                        </div>
                        <div class="form-row clearfix">
                            <div class="form-col fl-left">
                                <label for="address">Địa chỉ</label>
                                <input type="text" name="address" id="address">
                                <span class="text-danger" id="addressError"></span>

                            </div>
                            <div class="form-col fl-right">
                                <label for="phone">Số điện thoại</label>
                                <input type="tel" name="phone" id="phone">
                                <span class="text-danger" id="phoneError"></span>

                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-col">
                                <label for="notes">Ghi chú</label>
                                <textarea name="note" style="width: 556px; height: 150px;"></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="section" id="order-review-wp">
                <div class="section-head">
                    <h1 class="section-title">Thông tin đơn hàng</h1>
                </div>
                <div class="section-detail">
                    <table class="shop-table">
                        <thead>
                            <tr>
                                <td>Sản phẩm</td>
                                <td>Tổng</td>
                            </tr>
                        </thead>
                        <tbody>

                            @php $total = 0; @endphp
                            @if (isset($product))
                                <tr class="cart-item">
                                    <td class="product-name">{{ $product['name'] }}<strong class="product-quantity">x
                                            {{ $quantity }}</strong></td>
                                    <td class="product-total">
                                        {{ number_format($product['price'] * $quantity, 0, '', '.') }} đ</td>
                                        <td>  <input type="hidden" name="qty" value="{{ $quantity}}" style="visibility: hidden;"></td>
                                        <td>  <input type="hidden" name="product_id" value="{{ $product->id}}" style="visibility: hidden;"></td>
                                </tr>

                                @php $total += $product['price'] * $quantity; @endphp
                            @else
                                @foreach ($selectedProducts as $row)
                                    <input type="hidden" name="rowId[]" value="{{ $row['rowId'] }}">
                                    <tr class="cart-item">
                                        <td class="product-name">{{ $row['name'] }}<strong class="product-quantity">x
                                                {{ $row['quantity'] }}</strong></td>
                                        <td class="product-total">
                                            {{ number_format($row['price'] * $row['quantity'], 0, '', '.') }} đ</td>
                                    </tr>
                                    @php $total += $row['price'] * $row['quantity']; @endphp
                                @endforeach
                            @endif

                        </tbody>
                        <tfoot>
                            <tr class="order-total">
                                <td>Tổng đơn hàng:</td>
                                <td><strong class="total-price">{{ number_format($total, 0, '', '.') }} đ</strong>
                                    <input type="hidden" name="total_price" value="{{ $total }}">
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    <div id="payment-checkout-wp">
                        <h3>Hình thức thanh toán:</h3>
                        <ul id="payment_methods">
                            <li>
                                <input type="radio" id="direct-payment" name="payment" value="cash">
                                <label for="direct-payment">Thanh toán tiền mặt</label>
                            </li>
                            <li>
                                <input type="radio" id="payment-home" name="payment" value="transfer">
                                <label for="payment-home">Thanh toán chuyển khoản</label>
                            </li>
                            <span class="text-danger" id="paymentError"></span>

                        </ul>
                    </div>
                    <div class="place-order-wp clearfix">

                        <input type="submit" id="order-now1" value="Đặt hàng" class="delete-link"
                            onclick="confirmOrder(event)">

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection




@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function showError(input, message) {
            let errorElement = input.next('.text-danger');
            input.addClass('is-invalid');
            errorElement.text(message);
            console.log(input.parent());
        }

        function validateForm() {
            var name = $('#name');
            var email = $('#email');
            var address = $('#address');
            var phone = $('#phone');
            var payment = $('input[name="payment"]:checked');
            var isValid = true;

            $('.is-invalid').removeClass('is-invalid');
            $('.text-danger').text('');

            if (name.val().trim() === '') {
                showError(name, 'Họ tên không được để trống');
                isValid = false;
            }

            if (email.val().trim() === '') {
                showError(email, 'Email không được để trống');
                isValid = false;
            }

            if (address.val().trim() === '') {
                showError(address, 'Địa chỉ không được để trống');
                isValid = false;
            }

            if (phone.val().trim() === '') {
                showError(phone, 'Số điện thoại không được để trống');
                isValid = false;
            } else if (!/^\d{10}$/.test(phone.val().trim())) {
                showError(phone, 'Số điện thoại phải có đúng 10 chữ số');
                isValid = false;
            }


            if (!payment.length) {
                $('#paymentError').text('Vui lòng chọn hình thức thanh toán');
                isValid = false;
            }

            return isValid;
        }

        function confirmOrder(event) {
            if (!validateForm()) {
                event.preventDefault();
            }
        }

        $(document).ready(function() {
            $('#order-now1').click(confirmOrder);

            // Giữ lại các giá trị đã nhập khi form bị submit lỗi
            var name = localStorage.getItem('name');
            var email = localStorage.getItem('email');
            var address = localStorage.getItem('address');
            var phone = localStorage.getItem('phone');
            var payment = localStorage.getItem('payment');

            if (name) $('#name').val(name);
            if (email) $('#email').val(email);
            if (address) $('#address').val(address);
            if (phone) $('#phone').val(phone);
            if (payment) $('input[name="payment"][value="' + payment + '"]').prop('checked', true);

            // Lưu giá trị vào localStorage khi người dùng nhập liệu
            $('#name, #email, #address, #phone').on('input', function() {
                localStorage.setItem($(this).attr('id'), $(this).val());
            });

            $('input[name="payment"]').on('change', function() {
                localStorage.setItem('payment', $(this).val());
            });

            // Xóa giá trị trong localStorage khi form được submit thành công
            $('#myForm').on('submit', function() {
                if (validateForm()) {
                    localStorage.removeItem('name');
                    localStorage.removeItem('email');
                    localStorage.removeItem('address');
                    localStorage.removeItem('phone');
                    localStorage.removeItem('payment');
                }
            });
        });
    </script>
@endpush
