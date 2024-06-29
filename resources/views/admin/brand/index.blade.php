@extends('layouts.admin')
@section('title', 'Thương hiệu')
@section('content')
    <div class="container-fluid px-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tất cả thương hiệu</h6>
            </div>

            <div class="card-body">
                <a href="{{ url('brand/add') }}" class="btn btn-primary mb-3">Thêm thương hiệu</a>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>thương hiệu</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @foreach ($brands as $row)
                                <tr>
                                    <th>{{ $no++ }}</th>
                                    <td>{{ $row->name }}</td>
                                    <td>
                                        <a href="{{ route('brand.edit', $row->id) }}" class="btn btn-warning">Sửa</a>
                                        <a href="{{ route('brand.delete', $row->id) }}"
                                            class="btn btn-danger delete-link" onclick="deletebrand()"
                                            data-name="{{ $row->name }}">Xoá</a>



                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                event.preventDefault();
                deletebrand(event.target);
            }
        });

        function deletebrand(link) {
            const url = link.href;
            const name = link.dataset.name;

            Swal.fire({
                title: "Xác nhận xóa",
                text: `Bạn có chắc chắn muốn xóa thương hiệu ${name}?`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xóa",
                cancelButtonText: "Hủy",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        }
    </script>
@endpush
