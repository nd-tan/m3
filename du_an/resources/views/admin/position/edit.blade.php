@extends('admin.index')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Chức Vụ</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{route('position.index')}}">Chức vụ</a></li>
                    <li class="breadcrumb-item active">Sửa chức vụ</li>
                </ol>
            </nav>
        </div>
        <form action="{{route('position.update',$item->id)}}" method="post">
            @method('PUT')
            @csrf
            <div class="row mb-3">
                <label for="inputText" class="col-sm-2 col-form-label">Tên danh mục</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $item->name }}">
                    @error('name')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
                </div><br>
                <div class="col-sm-10">
                    {{-- <input type="text" class="form-control"> --}}
                </div><br>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Chỉnh sửa</button>
                    </div>
                </div>
            </div>

        </form>


    </main>
@endsection
