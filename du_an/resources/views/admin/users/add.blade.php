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
            <h1>Nhân Viên</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Nhân viên</a></li>
                    <li class="breadcrumb-item active">Thêm nhân viên</li>
                </ol>
            </nav>
        </div>

        <form action="{{ route('user.checkregister') }}" method="post" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Tên nhân viên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $request->name ?? old('name')  }}">
                    @error('name')
                        <label class="text text-danger">{{ $message }}</label>
                    @enderror
                </div><br>

                <label for="inputText" class="col-sm-2 col-form-label">Chức vụ</label>
                <div class="col-sm-10">
                    <select name="position" class="select">
                        @foreach ($positions as $position)
                            <option {{$position->name=='Nhân viên' ? 'selected' : ""}} value="{{ $position->id }}">{{ $position->name }}</option>
                        @endforeach
                    </select>
                </div>

                <label for="inputText" class="col-sm-2 col-form-label">Địa chỉ</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('age') is-invalid @enderror" name="address"
                        value="{{ $request->address ?? old('address') }}">
                    @error('address')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('color') is-invalid @enderror" name="email"
                        value="{{$request->email ?? old('email') }}">
                    @error('email')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Số điện thoại</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="phone"
                    value="{{$request->phone ?? old('phone') }}">
                @error('phone')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
                </div><br>
                {{-- <label for="inputText" class="col-sm-2 col-form-label">Mật khẩu</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control @error('price') is-invalid @enderror" name="password"
                    value="{{$request->price ?? old('price') }}">
                @error('password')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Nhập lại mật khẩu</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control @error('price') is-invalid @enderror" name="confirmpassword"
                    value="{{$request->price ?? old('price') }}">
                @error('confirmpassword')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
                </div><br> --}}

                <label for="inputText" class="col-sm-2 col-form-label">Hình ảnh</label>
                <div class="col-sm-10">
                    <input accept="image/*" type='file' id="inputFile" name="inputFile"  /><br>
                    @error('inputFile')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <img type="hidden" width="90px" height="90px" id="blah" src="" alt=""  />

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
