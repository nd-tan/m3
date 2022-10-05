<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

<style>
    .flex_1 {
        float: right;
    }

    .container {
        margin-top: 10px;
    }

    #add {
        float: right;
    }

    div.col-sm-10 {
        margin: 0px 0px 23px 0px;
    }

    .select {
        width: 925px;
        height: 40px;
    }
</style>
<div class="container">
    <div>
        <form action="" id="form-search"
            class="form-inline d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="form-group">
                <input class="form-control" name="key" placeholder="search by name...">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search h4"></i>
                </button>
            </div>
        </form>
        <label class="flex_1" for=""><a href="{{ route('book.index') }}">Trang chủ</a> /Thêm sách</label>
    </div><br>
    <h4>Thêm Sách</h4><br>
    <form action="{{route('book.store')}}" method="post">
        @method('POST')
        @csrf
        <div class="row mb-3">
            <label for="inputText" class="col-sm-2 col-form-label">Tên sách</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="ten_sach"
                    value="{{ old('ten_sach') }}">
                @error('ten_sach')
                    <label class="text text-danger">{{ $message }}</label>
                @enderror
            </div><br>
            <label for="inputText" class="col-sm-2 col-form-label">ISBN</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="isbn"
                value="{{ old('isbn') }}">
                @error('isbn')
                    <label class="text text-danger">{{ $message }}</label>
                @enderror
            </div>
            <label for="inputText" class="col-sm-2 col-form-label">Số trang</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="so_trang"
                    value="{{old('so_trang') }}">
                @error('so_trang')
                    <label class="text text-danger">{{ $message }}</label>
                @enderror
            </div>
            <label for="inputText" class="col-sm-2 col-form-label">Tác giả</label>
            <div class="col-sm-10">
                <select name="tac_gia" class="select">
                    <option value="">Tác giả</option>
                    <option value="Ngô Tất Tố">Ngô Tất Tố</option>
                    <option value="Nam Cao">Nam Cao</option>
                    <option value="Xuân Diệu">Xuân Diệu</option>
                    <option value="Xuân Quỳnh">Xuân Quỳnh</option>
                </select>
                @error('tac_gia')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
            </div><br>
            <label for="inputText" class="col-sm-2 col-form-label">Thể loại</label>
            <div class="col-sm-10">
                <select name="the_loai" class="select">
                    <option value="">Thể Loại</option>
                    <option value="Thơ">Thơ</option>
                    <option value="Văn">Văn</option>
                    <option value="Tiểu thuyết">Tiểu thuyết</option>
                    <option value="Sách Giáo khoa">Sách Giáo khoa</option>
                </select>
                @error('the_loai')
                    <div class="text text-danger">{{ $message }}</div>
                @enderror
            </div><br>
            <label for="inputText" class="col-sm-2 col-form-label">Năm xuất bản</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name="nam_xuat_ban"
                    value="{{ $request->so_trang ?? old('so_trang') }}" min="0" max="{{$date}}">
                @error('so_trang')
                    <label class="text text-danger">{{ $message }}</label>
                @enderror
            </div><br>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Thêm</button>
            </div>
        </div>
</div>
</form>
</div>
