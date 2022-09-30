@extends('admin.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Sản Phẩm</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item">Sản phẩm</a></li>
                </ol>
            </nav>
        </div>
        @if (Auth::user()->hasPermission('Product_create'))
            <a class='btn btn' style='color:rgb(52,136,245)' href="{{ route('product.add') }}">Thêm sản phẩm</a>
        @endif
        <a class='btn btn' style='color:rgb(52,136,245)' href="{{ route('product.softdelete') }}">Thùng rác</a>
        <form action="" id="form-search"
            class="form-inline d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="form-group">
                <input class="form-control" name="key" placeholder="search by name...">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
        <table class="table table-bordered border-primary" style=" text-align: center; width:200%">
            <thead>
                <tr>
                    <th width="10%">STT</th>
                    <th width="10%">Tên Sản Phẩm</th>
                    <th width="10%">Danh Mục</th>
                    <th width="10%">Nhà cung cấp</th>
                    <th width="10%">Hình Ảnh</th>
                    <th width="15%">Tùy Chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $key => $item)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->supplier->name }}</td>
                        <td>
                            <img src="{{ asset('storage/images/' . $item->image) }}" alt="" width='120px'
                                height="100px">
                        </td>
                        <td>
                            <form action="{{ route('product.delete', $item->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                @if (Auth::user()->hasPermission('Product_view'))
                                    <a style='color:rgb(52,136,245)'
                                        class='btn'href="{{ route('product.show', $item->id) }}"><i
                                            class='bi bi-eye h4'></i></a>
                                @endif
                                @if (Auth::user()->hasPermission('Product_update'))
                                    <a style='color:rgb(52,136,245)'
                                        class='btn'href="{{ route('product.edit', $item->id) }}"><i
                                            class='bi bi-pencil-square h4'></i></a>
                                @endif
                                @if (Auth::user()->hasPermission('Product_delete'))
                                    <button onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này không?');"
                                        class='btn' style='color:rgb(52,136,245)' type="submit"><i
                                            class='bi bi-trash h4'></i></button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $items->onEachSide(5)->links() }}
    </main>
@endsection
