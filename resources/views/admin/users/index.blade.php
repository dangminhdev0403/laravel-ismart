@extends('layouts.admin')
@section('title', 'Quản lí người dùng')
@push('style')
    <style>



    </style>
@endpush
@section('content')
    <div class="container-fluid px-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tất cả người dùng</h6>
            </div>

            <div class="card-body">
                <a href="{{ route('admin.users.add') }}" class="btn btn-primary mb-3" style="margin-left: 13px;">Thêm người
                    dùng</a>

                <div class="table-responsive">


                    <a href="{{ route('admin.users') }} " style="font-size:20px; margin:0px 13px 0px 0px" id="success-link"
                        class=" text-decoration-none {{ isset($status) ? ($status == 'active' ? 'text-danger' : '') : '' }} {{ empty($status) ? 'text-danger' : '' }}  ">Kích
                        hoạt({{ isset($count['countActive']) ? $count['countActive'] : '' }})</a> <span
                        style="margin-right: 20px">|</span>

                    <a href="{{ request()->fullUrlWithQuery(['status' => 'trash']) }} "
                        style="font-size:20px; margin:0px 13px 0px 0px" id="cancel-link"
                        class=" text-decoration-none {{ isset($status) ? ($status == 'trash' ? 'text-danger' : '') : '' }} ">Vô
                        hiệu hóa ({{ isset($count['countTrash']) ? $count['countTrash'] : '' }})</a>

                    <div class ="form-control d-flex" style="border: none">

                        <form action="{{ url('admin/users/action') }}" id="main-form">
                            @csrf
                            <div id="form-select-users" class="d-flex">
                                <select name="act" id="" class="form-select text-center mb-3"
                                    style="display: inline;">
                                    @if(isset($status))
                                    @if ($status == 'trash')
                                    <option class="form-option">
                                        Chọn
                                    </option>
                                    <option value="restore" class="form-option">
                                        Khôi phục
                                    </option>
                                    <option value="forceDelete" class="form-option">
                                       Xóa vĩnh viễn
                                    </option>

                                    @endif
                                    @else
                                    <option class="form-option">
                                        Chọn
                                    </option>
                                    <option value="delete" class="form-option">
                                        Vô hiệu hóa
                                    </option>
                                    <option value="forceDelete" class="form-option">
                                       Xóa vĩnh viễn
                                    </option>
                                    @endif




                                </select>
                                <button class="btn btn-success"
                                    style="padding: 6px 12px; width: 209.953px; height: 38px; transform: translate(12px, 0px);">Áp
                                    dụng</button>
                            </div>
                        </form>

                        <div id="form-search" style="margin-left: auto">
                            <form action="{{ url()->current() }}" id="search-form2">
                                @foreach (request()->except('keyword') as $key => $value)
                                    <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                                @endforeach
                                <input type="text" name="keyword" value="{{ request()->keyword }}"
                                    placeholder="Nhập tên để tìm">
                                <button type="submit" class="btn btn-success" id="btn-search2">Tìm</button>
                            </form>
                        </div>


                    </div>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="checkall" id="checkall"></th>
                                <th>No</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Ngày tạo</th>
                                <th>Quyền</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @if ($users->total() > 0)
                                @php
                                    $no = ($users->currentPage() - 1) * $users->perPage() + 1;
                                @endphp
                                @foreach ($users as $row)
                                    <tr>
                                        <td><input type="checkbox" name="list-checks[]" value="{{ $row->id }}" class="outside-checkbox"></td>

                                        <th>{{ $no++ }}</th>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td> {{ $row->formatted_date }}</td>
                                        <td>
                                            <form method="POST" action="{{ route('admin.users.updateRole', $row->id) }}"
                                                id="roleForm{{ $row->id }}">
                                                @csrf
                                                <select name="role" class="form-select select-role"
                                                    id="roleSelect{{ $row->id }}">
                                                    @foreach (config('user.roles') as $roleId => $role)
                                                        <option value="{{ $roleId }}" class="text-center"
                                                            {{ $row->role == $roleId ? 'selected' : '' }}>
                                                            @if ($roleId == 1)
                                                                Admin
                                                            @elseif ($roleId == 3)
                                                                User
                                                            @else
                                                                Seller
                                                            @endif
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </form>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.users.edit', $row->id) }}"
                                                class="btn btn-warning">Sửa</a>
                                            <a href="" class="btn btn-danger delete-link" onclick="deleteCategory()"
                                                data-name="{{ $row->name }}">Xoá</a>



                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <h5 class="alert alert-danger text-center"><b>Không có dữ liệu </b></h5>
                            @endif

                        </tbody>



                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
      // Lắng nghe sự kiện click trên checkbox "checkall"
      document.getElementById('checkall').addEventListener('change', function(event) {
            // Lấy tất cả các checkbox có class "outside-checkbox"
            var checkboxes = document.querySelectorAll('.outside-checkbox');
            // Lặp qua tất cả các checkbox và thay đổi trạng thái checked dựa trên checkbox "checkall"
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = event.target.checked;
            });
        });
        //submit
    document.getElementById('main-form').addEventListener('submit', function(event) {
        // Xóa tất cả các input ẩn hiện có trong form
        document.querySelectorAll('input[name="list-check-hidden[]"]').forEach(function(element) {
            element.remove();
        });

        // Thêm giá trị từ các checkbox bên ngoài vào form dưới dạng các input ẩn
        document.querySelectorAll('.outside-checkbox:checked').forEach(function(checkbox) {
            var hiddenInput = document.createElement('input');
            hiddenInput.type = 'hidden';
            hiddenInput.name = 'list-check-hidden[]';
            hiddenInput.value = checkbox.value;
            document.getElementById('main-form').appendChild(hiddenInput);
        });
    });
</script>

    <script>
        $(document).ready(function() {
            @foreach ($users as $user)
                $('#roleSelect{{ $user->id }}').change(function(e) {

                    $('#roleForm{{ $user->id }}').submit();
                });
            @endforeach
        });
    </script>

    @if (session('message'))
        <script>
            Swal.fire({
                title: 'Thành công',
                text: "{{ session('message') }}",
                icon: 'success',
                showConfirmButton: true,
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Xóa dữ liệu trong sessionStorage sau khi người dùng nhấn OK
                    sessionStorage.clear();
                    location.reload();

                    // Nếu cần xóa cookie hoặc localStorage, bạn có thể thêm mã tương tự ở đây
                    // document.cookie = 'cookieName=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/';
                    // localStorage.clear();
                }
            });
        </script>
    @endif
    @if (session('error'))
    <script>
        Swal.fire({
            title: 'Thất bại',
            text: "{{ session('error') }}",
            icon: 'error',
            showConfirmButton: true,
            confirmButtonText: 'OK'
        }).then((result) => {
            if (result.isConfirmed) {
                // Xóa dữ liệu trong sessionStorage sau khi người dùng nhấn OK
                sessionStorage.clear();
                location.reload();

                // Nếu cần xóa cookie hoặc localStorage, bạn có thể thêm mã tương tự ở đây
                // document.cookie = 'cookieName=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/';
                // localStorage.clear();
            }
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
                text: `Bạn có chắc chắn muốn xóa danh mục ${name}?`,
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
