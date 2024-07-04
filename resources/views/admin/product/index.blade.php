@extends('layouts.admin')
@section('title', 'Sản phẩm')
@section('content')
    <div class="container-fluid px-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tất cả Sản phẩm</h6>
            </div>

            <div class="card-body">
                <a href="{{ url('products/add') }}" class="btn btn-primary mb-3">Thêm Sản phẩm</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Sản phẩm</th>
                                <th>Danh mục</th>
                                <th>Thương hiệu</th>
                                <th>Giá</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


@endsection


@push('scripts')
    <script>
        $(function() {
            var table = $('#dataTable').DataTable({
                "columnDefs": [{
                    "targets": 0,
                    "orderable": false,
                    "searchable": false,
                    "render": function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }],
                processing: true,
                serverSide: true,
                ajax: "{{ route('products') }}",
                columns: [

                    {
                        data: 'name',
                        name: 'name'
                    },

                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'cname',
                        name: 'cname'
                    },
                    {
                        data: 'bname',
                        name: 'bname'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },

                    {
                        "data": "actions",

                        "render": function(data, type, row) {
                            return `
                        <a href="products/edit/${row.id}" class="btn btn btn-warning">Sửa</a>
                        <a href="products/delete/${row.id}" class="btn btn-danger delete-link"
                                            onclick="deletebrand()" data-name="${row.name}">Xoá</a>



                    `;
                        },
                        "orderable": false,
                        "searchable": false
                    }

                ]
            });
        })
    </script>



    @if (session('message'))
        <script>
            Swal.fire({
                title: "Thành công",
                text: "{{ session('message') }}",
                icon: "success",
                showConfirmButton: true,
                confirmButtonText: "OK",
            }).then((result) => {
                if (result.isConfirmed) {
                    @php
                        session()->forget('message');
                    @endphp
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
                text: `Bạn có chắc chắn muốn xóa sản phẩm ${name}?`,
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
