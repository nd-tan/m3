<style>
    div.col-sm-10 {
        margin: 0px 0px 23px 0px;
    }

    .select {
        /* margin: 0px 0px 23px 0px; */
        width: 820px;
        height: 40px;
    }

    input.form-control-file {
        /* margin: 0px 0px 23px 0px; */

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
                    <li class="breadcrumb-item active">Thêm sản phẩm</li>
                </ol>
            </nav>
        </div>

        <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $request->name ?? old('name')  }}">
                    @error('name')
                        <label class="text text-danger">{{ $message }}</label>
                    @enderror
                </div><br>

                <label for="inputText" class="col-sm-2 col-form-label">Danh mục</label>
                <div class="col-sm-10">
                    <select name="supplier" class="select">
                        @foreach ($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                        @endforeach
                    </select>
                </div>

                <label for="inputText" class="col-sm-2 col-form-label">Danh mục</label>
                <div class="col-sm-10">
                    <select name="category_id" class="select">
                        @foreach ($items as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <label for="inputText" class="col-sm-2 col-form-label">Tuổi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('age') is-invalid @enderror" name="age"
                        value="{{ $request->age ?? old('age') }}">
                    @error('age')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Màu sắc</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('color') is-invalid @enderror" name="color"
                        value="{{$request->color ?? old('color') }}">
                    @error('color')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Giới tính</label>
                <div class="col-sm-10">
                    <select name="gender" class="select">
                        <option value="duc">Đực</option>
                        <option value="cai">Cái</option>
                    </select>
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Giá</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('price') is-invalid @enderror" name="price"
                        value="{{$request->price ?? old('price') }}">
                    @error('price')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Số lượng</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control @error('quantity') is-invalid @enderror" name="quantity"
                        value="{{$request->quantity ?? old('quantity') }}">
                    @error('quantity')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <label for="inputText" class="col-sm-2 col-form-label">Hình ảnh</label>
                <div class="col-sm-10">
                    <input accept="image/*" type='file' id="inputFile" name="inputFile"  /><br>
                    @error('inputFile')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <img type="hidden" width="90px" height="90px" id="blah" src="" alt=""  />

                    {{-- <div class="col-sm-10">
                    <input type="file"
                           class="form-control-file"
                           id="inputFile"
                           name="inputFile"> --}}

                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
            </div>

        </form>


    </main>

@endsection
