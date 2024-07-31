@extends('layouts.admin')
@section('title', 'Quản lí người dùng')
@section('content')
    <div class="container-fluid px-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tất cả người dùng</h6>
            </div>

            <div class="card-body">
                <a href="{{ url('admin/category/add') }}" class="btn btn-primary mb-3" style="margin-left: 13px">Thêm người
                    dùng</a>

                <div class="table-responsive">
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

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th><input type="checkbox" name="select-all"></th>
                                <th>No</th>
                                <th>Tên</th>
                                <th>Email</th>
                                <th>Ngày tạo</th>
                                <th>Quyền</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1)
                            @foreach ($users as $row)
                                <tr>
                                    <td><input type="checkbox" name="list-item"></td>
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
                                        <a href="" class="btn btn-warning">Sửa</a>
                                        <a href="" class="btn btn-danger delete-link" onclick="deleteCategory()"
                                            data-name="{{ $row->name }}">Xoá</a>



                                    </td>
                                </tr>
                            @endforeach
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
        $(document).ready(function() {
            @foreach ($users as $user)
                $('#roleSelect{{ $user->id }}').change(function(e) {

                    $('#roleForm{{ $user->id }}').submit();
                });
            @endforeach
        });
    </script>
@endpush
