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
            <h1>Nhà Cung Cấp</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Nhà Cung Cấp</a></li>
                    <li class="breadcrumb-item active">Sửa nhà cung cấp</li>
                </ol>
            </nav>
        </div>

        <form action="{{ route('supplier.update', $item->id) }}" method="post">
            @method('PUT')
            @csrf
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Tên nhà cung cấp</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $item->name }}">
                    @error('name')
                        <label class="text text-danger">{{ $message }}</label>
                    @enderror
                </div><br>

                <label for="inputText" class="col-sm-2 col-form-label">Địa chỉ</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('age') is-invalid @enderror" name="address"
                        value="{{ $item->address }}">
                    @error('address')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Số điện thoại</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone"
                        value="{{ $item->phone }}">
                    @error('phone')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div><br>

                <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ $item->email }}">
                    @error('email')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror

                </div>

            </div>
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </div>
            </div>
            </div>

        </form>


    </main>
@endsection
