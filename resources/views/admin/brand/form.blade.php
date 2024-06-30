@extends('layouts.admin')
@section('title', ' Thao tác Danh mục')
@section('content')
     <form action="{{ isset($brand) ? route('brand.update', $brand->id) : route('brand.save') }}" method="post">
    @csrf
    <div class="row">
      <div class="col-12">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ isset($brand) ? 'Cập nhật danh mục' : 'Thêm danh mục' }}</h6>
          </div>
          <div class="card-body">
            <div class="form-group">
              <label for="nama">Tên Brand</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ isset($brand) ? $brand->name : '' }}">
            </div>
          </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Lưu</button>
          </div>
        </div>
      </div>
    </div>
  </form>
@endsection
