@extends('layouts.admin')
@section('title', 'Chi tiết đơn hàng')
@section('content')
    <form action="" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Chi tiết đơn hàng</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Người mua</label>
                            <input type="text" class="form-control " id="name" name="name"
                                value="{{ $order->name }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Địa chi</label>
                            <input type="text" class="form-control " id="address" name="address"
                                value="{{ $order->address }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Số điện thoại</label>
                            <input type="text" class="form-control " id="phone" name="phone"
                                value="{{ $order->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control " id="email" name="email"
                                value="{{ $order->email }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Sản phẩm đặt</label>

                            <input type="text" class="form-control " id="phone" name="phone"
                                value="  {{ $order->products[0]->name }}">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Số lượng</label>

                            <input type="text" class="form-control " id="quantity" name="quantity"
                                value="  {{ $order->products[0]->pivot->quantity}}">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Tổng tiền</label>

                            <input type="text" class="form-control " id="quantity" name="quantity"
                                value="  {{ $order->total_price}}">
                        </div>
                        <div class="form-group">
                            <label for="created_at">Ngày đặt mua:</label>

                            <input type="text" class="form-control " id="created_at" name="created_at"
                                value="  {{ $order->created_at->format('d-m-Y') }}">
                        </div>
                        <div class="form-group">

                            <label for="note">Ghi chú</label>

                            <input type="text" class="form-control " id="note" name="note"
                                value="  {{$order->note}}">
                        </div>
                        <div class="form-group">

                            <label for="note">Trạng thái</label>

                            <select name="status" class="form-select select-status"
                            id="statusSelect{{ $order->id }}">
                            @foreach (config('order.status') as $status)
                                <option value="{{ $status }}" class="text-center"
                                    {{ $status == $order->status ? 'selected' : '' }}>
                                    @if ($status == 'pending')
                                        Đang xử lí
                                    @elseif ($status == 'success')
                                        Hoàn tất
                                    @else
                                        Hủy
                                    @endif

                                </option>
                            @endforeach

                        </select>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Trở về</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
