@extends('layouts.admin')
<style>

</style>
@section('title', 'Danh mục')
@section('content')
    <div class="container-fluid px-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tất cả danh mục</h6>
            </div>

            <div class="card-body">

                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <div class ="form-control d-flex" style="border: none">
                            <a href="{{ url('admin/category/add') }}" class="btn btn-primary mb-3">Thêm danh mục</a>
                          <form action="{{ route('admin.category.deleteSelect') }}" id="main-form">
                            @csrf
                                <div id="form-select-users" class="d-flex">

                                    <button class="btn btn-danger "
                                        style="padding: 6px 12px;  height: 38px; transform: translate(12px, 0px);" >Xoá đã chọn</button>
                          </form>
                            </div>

                            <div id="form-search" style="margin-left: auto">
                                <form action="#">
                                    <input type="text" name="keyword" value="{{ request()->keyword }}"
                                        placeholder="Nhập tên danh mục ">
                                    <button class="btn btn-success">Tìm</button>
                                </form>
                            </div>
                        </div>
                        <thead>
                            <tr>
                                <td><input type="checkbox" name="checkall" id="checkall"></td>
                                <th>No</th>
                                <th>Danh mục</th>
                                <th>Ngày tạo</th>
                                <th width ="50px" style="width: 158.828px;">Sản phẩm đang có</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($categories->total() > 0)
                                @php
                                    $no = ($categories->currentPage() - 1) * $categories->perPage() + 1;
                                @endphp
                                @foreach ($categories as $row)
                                    <tr>
                                        <td><input type="checkbox" name="list-checks[]" value="{{ $row->id }}" class="outside-checkbox"></td>
                                        <th>{{ $no++ }}</th>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->formatted_date }}</td>
                                        <td>{{ $row->products()->count() }}</td>
                                        <td>
                                            <a href="{{ route('category.edit', $row->id) }}" class="btn btn-warning">Sửa</a>
                                            <a href="{{ route('category.delete', $row->id) }}"
                                                class="btn btn-danger delete-link" onclick="deleteCategory()"
                                                data-name="{{ $row->name }}">Xoá</a>



                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <h5 class="alert alert-danger text-center"><b>Không có dữ liệu </b></h5>
                            @endif

                        </tbody>
                    </table>
                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')
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
                text: `Bạn có chắc chắn muốn xóa danh mục`,
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

        $('#delete-order').on('click', function(e) {
        e.preventDefault(); // Ngăn chặn hành động mặc định của thẻ <a>

        Swal.fire({
            title: "Xác nhận",
            text: "Bạn có chắc chắn muốn xoá danh mục?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Chắc chắn",
            cancelButtonText: "Không",
        }).then((result) => {
            if (result.isConfirmed) {  // Chỉ submit form khi người dùng xác nhận
                $('#main-form').submit();
            }
        });
    });
    </script>


@endpush
