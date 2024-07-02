@extends('layouts.admin')
@section('title', ' Thao tác Sản phẩm')
@section('content')
    <form action="{{ isset($product) ? route('products.update', $product->id) : route('products.save') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($product) ? 'Cập nhật Sản phẩm' : 'Thêm Sản phẩm' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Tên Sản phẩm</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ isset($product) ? $product->name : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="price">Giá Sản phẩm</label>
                            <input type="text" class="form-control" id="price" name="price"
                                value="{{ isset($product) ? $product->price : '' }}">
                        </div>
                        <div class="form-group">
                            <label for="category_id">Danh mục sản phảm</label>
                            <select name="category_id" id="category_id" class="custom-select form-control">
                                <option value="" selected disabled hidden>-- Chọn danh mục --</option>
                                @foreach ($category as $row)
                                    <option value="{{ $row->id }}"
                                        {{ isset($product) ? ($product->category_id == $row->id ? 'selected' : '') : '' }}>
                                        {{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="brand_id">Thương hiệu sản phảm</label>
                            <select name="brand_id" id="brand_id" class="custom-select form-control">
                                <option value="" selected disabled hidden>-- Chọn danh mục --</option>
                                @foreach ($brand as $row)
                                    <option value="{{ $row->id }}"
                                        {{ isset($product) ? ($product->brand_id == $row->id ? 'selected' : '') : '' }}>
                                        {{ $row->name }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>

    </form>
@endsection
