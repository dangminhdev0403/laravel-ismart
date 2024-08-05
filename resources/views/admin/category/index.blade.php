@extends('layouts.admin')
@section('title', 'Danh mục')
@section('content')
    <div class="container-fluid px-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tất cả danh mục</h6>
            </div>

            <div class="card-body">
                <a href="{{ url('admin/category/add') }}" class="btn btn-primary mb-3">Thêm danh mục</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                               <form action="#">
                                    <input type="text" name="keyword" value="{{ request()->keyword}}" placeholder="Nhập tên danh mục ">
                                    <button class="btn btn-success">Tìm</button>
                               </form>
                            </div>
                        </div>
                        <thead>
                            <tr>
                                <td><input type="checkbox"></td>
                                <th>No</th>
                                <th>Danh mục</th>
                                <th>Ngày tạo</th>
                                <th>Trạng thái</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($categories->total() > 0 )
                            @php
                            $no = ($categories->currentPage() - 1) * $categories->perPage() + 1;
                             @endphp
                            @foreach ($categories as $row)
                                <tr>
                                    <td><input type="checkbox" name="" id=""></td>
                                    <th>{{ $no++ }}</th>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->formatted_date }}</td>
                                    <td>{{ $row->status}}</td>
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

