@extends('layouts.admin')
@section('title', 'Quản lí đơn hàng')
@section('content')
    <div class="container-fluid px-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Quản lí đơn hàng</h6>
            </div>

            <div class="card-body">
                <a href="{{ url('admin/category/add') }}" class="btn btn-primary mb-3">Thêm đơn hàng</a>
                <div class="table-responsive">
                    <a href="{{ route('admin.oders') }}" class="{{ request()->routeIs('admin.oders')? 'text-danger':'' }} " style="font-size:20px ;margin:0px 13px 0px 0px">Tất cả</a>
                    <a href="{{ route('admin.show','pending') }}" style="font-size:20px ;margin:0px 13px 0px 0px" id="pending-link" class="{{ $activeLink === 'pending' ? 'text-danger' : '' }}">Chờ xử lí</a>
                    <a href="{{ route('admin.show','success') }}" style="font-size:20px ;margin:0px 13px 0px 0px" id="success-link" class="{{ $activeLink === 'success' ? 'text-danger' : '' }}">Hoàn tất</a>
                    <a href="{{ route('admin.show','cancel') }}" style="font-size:20px ;margin:0px 13px 0px 0px" id="cancel-link" class="{{ $activeLink === 'cancel' ? 'text-danger' : '' }}">Hủy</a>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>tên</th>
                                <th>Email</th>
                                <th>SDT</th>
                                <th>Địa chỉ</th>
                                <th>Ghi chú</th>
                                <th>Thanh toán</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @foreach ($orders as $row)
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <td>{{ $row->name }}</td>

                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>

                                        {{ $row->address }}


                                    </td>
                                    <td>
                                        @if (!empty($row['note']))
                                            {{ $row['note'] }}
                                            @else
                                            <p>Không</p>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($row['payment']=='transfer')
                                            <p>Chuyển khoản</p>
                                        @else
                                        <p>Tiền mặt</p>
                                        @endif
                                    </td>
                                        <td>
                                            {{ $row->status }}
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
                deletebrand(event.target);
            }
        });

        function deletebrand(link) {
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
