@extends('layouts.admin')
@section('title', 'Quản lí người dùng')
@section('content')
<form action="{{ isset($user) ? route('admin.users.update',$user->id) : route('admin.users.save') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        {{ isset($user) ? 'Cập nhật người dùng' : 'Thêm người dùng'}}</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tên người dùng:</label>
                        @if(isset($user))
                        <input type="text" class="form-control" id="name" name="name"
                        value="{{ $user->name }}">
                        @else
                        <input type="text" class="form-control" id="name" name="name"
                        value="{{  request()->name}} ">
                        @endif

                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email người dùng:</label>
                     
                            @if(isset($user))
                            <input type="text" class="form-control" id="email" name="email"
                            value="{{ $user->email }}">
                            @else
                            <input type="text" class="form-control" id="email" name="email"
                            value="{{  request()->email}} ">
                            @endif
                             @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu người dùng:</label>
                        <input type="password" class="form-control" id="password" name="password"
                          >
                             @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label for="role">Quyền:</label>
                        <select name="role" id="role" class="form-select select-role">
                            @foreach (config('user.roles') as $roleId => $role)
                                @if (isset($user))
                                <option value="{{ $roleId  }}" {{ $user->role == $roleId ? 'selected' : '' }}>{{ $role }}</option>
                                @else
                                <option value="{{ $roleId  }}" >{{ $role }}</option>
                                @endif

                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-primary" style="margin-left: 10px">Lưu</button>
</form>
@endsection
