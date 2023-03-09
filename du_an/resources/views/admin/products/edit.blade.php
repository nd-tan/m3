<style>
    div.col-sm-10 {
        margin: 0px 0px 23px 0px;
    }
    .select {
        width: 100%;
        height: 40px;
        border-radius: 5px;
        border-color: #ced4da;
    }
</style>
@extends('admin.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Sản Phẩm</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Sản phẩm</a></li>
                    <li class="breadcrumb-item active">Sửa sản phẩm</li>
                </ol>
            </nav>
        </div>
        <form action="{{ route('product.update', $item->id) }}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $item->name }}">
                    @error('name')
                        <label class="text text-danger">{{ $message }}</label>
                    @enderror
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Danh mục</label>
                <div class="col-sm-10">
                    <select name="category_id" class="select">
                        @foreach ($items as $value)
                            <option <?= $value->id == $item->category_id ? 'selected' : '' ?> value="{{ $value->id }}">
                                {{ $value->name }}</option>
                        @endforeach
                    </select>
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Nhà cung cấp</label>
                <div class="col-sm-10">
                    <select name="supplier_id" class="select">
                        @foreach ($suppliers as $supplier)
                            <option <?= $supplier->id == $item->supplier_id ? 'selected' : '' ?> value="{{ $supplier->id }}">
                                {{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Thương hiệu</label>
                <div class="col-sm-10">
                    <select name="brand_id" class="select">
                        @foreach ($brands as $brand)
                            <option <?= $brand->id == $item->brand_id ? 'selected' : '' ?> value="{{ $brand->id }}">
                                {{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <label for="inputText" class="col-sm-2 col-form-label">Tuổi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('age') is-invalid @enderror" name="age"
                        value="{{ $item->age }}">
                    @error('age')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Màu sắc</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('color') is-invalid @enderror" name="color"
                        value="{{ $item->color }}">
                    @error('color')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Giới tính</label>
                <div class="col-sm-10">
                    <select name="gender" class="select">
                        <option <?= $item->gender == 'đực' ? 'selected' : '' ?> value="đực">Đực</option>
                        <option <?= $item->gender == 'cái' ? 'selected' : '' ?> value="cái">Cái</option>
                    </select>
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Giá</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{ $item->price }}">
                    @error('price')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Số lượng</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                        value="{{ $item->quantity }}">
                    @error('quantity')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <label for="inputText" class="col-sm-2 col-form-label">Hình ảnh</label>
                <div class="col-sm-10">
                    <input accept="image/*" type='file' id="inputFile" name="inputFile" /><br>
                    @error('inputFile')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <img type="hidden" width="90px" height="90px" id="blah1"
                        src="{{ asset('storage/images/' . $item->image) ?? asset('storage/images/' . $request->inputFile) }}"
                        alt="" />
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                </div>
            </div>
            </div>
        </form>
    </main>
@endsection
