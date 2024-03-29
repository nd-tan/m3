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
            <h1>Nhân Viên</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Nhân viên</a></li>
                    <li class="breadcrumb-item active">Sửa nhân viên</li>
                </ol>
            </nav>
        </div>
        <form action="{{ route('user.update',$item->id)}}" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Tên nhân viên</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ $item->name  }}">
                    @error('name')
                        <label class="text text-danger">{{ $message }}</label>
                    @enderror
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Chức vụ</label>
                <div class="col-sm-10">
                    <select name="position" class="select">
                        @foreach ($positions as $position)
                            <option {{$position->id == $item->position_id ? 'selected' : ""}} value="{{ $position->id }}">{{ $position->name }}</option>
                        @endforeach
                    </select>
                </div>
                <label for="inputText" class="col-sm-2 col-form-label">Địa chỉ</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('age') is-invalid @enderror" name="address"
                        value="{{ $item->address }}">
                    @error('address')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('color') is-invalid @enderror" name="email"
                        value="{{$item->email }}">
                    @error('email')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Số điện thoại</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('price') is-invalid @enderror" name="phone"
                    value="{{$item->phone }}">
                @error('phone')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
                </div><br>

                <label for="inputText" class="col-sm-2 col-form-label">Ngày sinh</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('birthday') is-invalid @enderror" name="birthday"
                    value="{{$item->birthday}}">
                @error('birthday')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Giới tính</label>
                <div class="col-sm-10">
                    <select name="gender" class="select">
                        <option {{$item->gender=="Nam" ? 'selected' : ''}} value="Nam">Nam</option>
                        <option {{$item->gender=="Nữ" ? 'selected' : ''}} value="Nữ">Nữ</option>
                        <option {{$item->gender=="Khác" ? 'selected' : ''}} value="Khác">Khác</option>
                    </select>
                @error('gender')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
                </div><br>
                <label for="inputText" class="col-sm-2 col-form-label">Hình ảnh</label>
                <div class="col-sm-10">
                    <input accept="image/*" type='file' id="inputFile" name="inputFile"  /><br>
                    @error('inputFile')
                        <div class="text text-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <img type="hidden" width="90px" height="90px" id="blah1" src="{{ asset('storage/images_admin/' . $item->image) ?? asset('storage/images_admin/'.$request->inputFile) }}" alt=""  />
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
