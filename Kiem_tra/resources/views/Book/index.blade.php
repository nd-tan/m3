<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
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
    p {
        color:red;
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
        <label class="flex_1" for=""><a href="{{ route('book.index') }}">Trang chủ</a> /Danh mục sách</label>
    </div><br>
    <h4>Danh mục sách</h4>
    <a class='btn btn-primary' id="add" href="{{ route('book.add') }}">Thêm sách</a>
    <br>
    @if (Session::has('success'))
<p>{{Session::get('success')}}</p>
    @endif
    @if (Session::has('error'))
    <p>{{Session::get('error')}}</p>
        @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">Tên sách</th>
                <th scope="col">ISBN</th>
                <th scope="col">Tác giả</th>
                <th scope="col">Thể loại</th>
                <th scope="col">Số trang</th>
                <th scope="col">Năm xuất bản</th>
                <th scope="col">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $key => $book)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $book->ten_sach }}</td>
                    <td>{{ $book->ISBN }}</td>
                    <td>{{ $book->tac_gia }}</td>
                    <td>{{ $book->the_loai }}</td>
                    <td>{{ $book->so_trang }}</td>
                    <td>{{ $book->nam_xuat_ban }}</td>
                    <td>
                        <form action="{{ route('book.delete', $book->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <a style='color:rgb(52,136,245)' class='btn'
                                href="{{ route('book.edit', $book->id) }}"><i class='bi bi-pencil-square h4'></i></a>
                            <button onclick="return confirm('Bạn có chắc muốn xóa sách không?');"
                                class='btn' style='color:rgb(52,136,245)' type="submit"><i class='bi bi-trash h4'></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
        {{$books->onEachSide(5)->links()}}
</div>
