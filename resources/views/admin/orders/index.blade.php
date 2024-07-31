@extends('layouts.admin')
@section('title', 'Quản lí đơn hàng')
@section('content')
    <div class="container-fluid px-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quản lí đơn hàng</h6>
            </div>

            <div class="card-body">
                <a href="{{ url('admin/category/add') }}" class="btn btn-primary mb-3" style="margin-left: 13px">Thêm đơn hàng</a>
                <div class ="form-control d-flex" style="border: none">

                    <div id="form-select-users" class="d-flex">
                        <select name="" id="" class="form-select text-center mb-3"
                            style="display: inline;">
                            <option value="1" class="form-option">
                                Chọn
                            </option>
                        </select>
                        <button class="btn btn-success"
                            style="padding: 6px 12px; width: 209.953px; height: 38px; transform: translate(12px, 0px);">Áp
                            dụng</button>
                    </div>

                    <div id="form-search" style="margin-left: auto">
                        <input type="text">
                        <button class="btn btn-success">Tìm</button>
                    </div>
                </div>
                <div class="table-responsive">

                    <a href="{{ route('admin.orders') }}"
                        class="{{ request()->routeIs('admin.orders') ? 'text-danger' : '' }} text-decoration-none"
                        style="font-size:20px; margin:0px 13px 0px 0px">Tất cả <span>({{ $counts['All'] }})</span></a>|
                    <a href="{{ route('admin.orders.show', 'pending') }} " style="font-size:20px; margin:0px 13px 0px 0px"

                        id="pending-link" class="{{ $activeLink === 'pending' ? 'text-danger' : '' }} text-decoration-none">Chờ xử lí <span class="text-decoration-none">({{ $counts['Pending']}})</span></a>|
                    <a href="{{ route('admin.orders.show', 'success') }} " style="font-size:20px; margin:0px 13px 0px 0px"
                        id="success-link" class="{{ $activeLink === 'success' ? 'text-danger' : '' }} text-decoration-none">Hoàn tất ({{ $counts['Success']}})</a>|
                    <a href="{{ route('admin.orders.show', 'cancel') }} " style="font-size:20px; margin:0px 13px 0px 0px"
                        id="cancel-link" class="{{ $activeLink === 'cancel' ? 'text-danger' : '' }} text-decoration-none">Hủy ({{ $counts['Cancel']}})</a>


                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                @if ( $activeLink!= '')
                                <th><input type="checkbox" name="select-all" id=""></th>
                                @endif

                                <th>No</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>SDT</th>
                                <th>Địa chỉ</th>
                                <th>Ngày đặt</th>
                                <th>Ghi chú</th>
                                <th>Thanh toán</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @foreach ($orders as $row)
                                <tr>
                                    @if ( $activeLink!= '')
                                    <td><input type="checkbox" name="list-item" id=""></td>
                                    @endif

                                    <th>{{ $no++ }}</th>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ $row->address }}</td>
                                    <td>  {{ $row->formatted_date }}</td>
                                    <td>
                                        @if (!empty($row['note']))
                                            {{ $row['note'] }}
                                        @else
                                            <p>Không</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row['payment'] == 'transfer')
                                            <p>Chuyển khoản</p>
                                        @else
                                            <p>Tiền mặt</p>
                                        @endif
                                    </td>
                                    <td>

                                        <form id="statusForm{{ $row->id }}" class="statusForm2"
                                            action="{{ route('updateStatus', $row->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="form-select select-status"
                                                id="statusSelect{{ $row->id }}">
                                                @foreach (config('order.status') as $status)
                                                    <option value="{{ $status }}" class="text-center"
                                                        {{ $status == $row->status ? 'selected' : '' }}>
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

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script>
        $(document).ready(function() {


            @foreach ($orders as $row)
                $('#statusSelect{{ $row->id }}').change(function(e) {

                        $('#statusForm{{ $row->id }}').submit();
                    });
                    @endforeach





        });
    </script>

    <script>
        let $activeLink = ''; // Khai báo biến $activeLink

        const pendingLink = document.getElementById('pending-link');
        const successLink = document.getElementById('success-link');
        const cancelLink = document.getElementById('cancel-link');

        pendingLink.addEventListener('click', () => {
            updateActiveLink('pending');
        });

        successLink.addEventListener('click', () => {
            updateActiveLink('success');
        });

        cancelLink.addEventListener('click', () => {
            updateActiveLink('cancel');
        });

        function updateActiveLink(link) {
            $activeLink = link;
        }
    </script>

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
                deleteOrder(event.target);
            }
        });

        function deleteOrder(link) {
            const url = link.href;
            const name = link.dataset.name;

            Swal.fire({
                title: "Xác nhận xóa",
                text: `Bạn có chắc chắn muốn xóa đơn hàng ${name}?`,
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
@endpush
