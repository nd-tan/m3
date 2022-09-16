@extends('admin.index')
@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">


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
                        <a class='btn btn' style='color:rgb(52,136,245)' href="{{ route('product.add') }}">Thêm sản phẩm</a>
                        <table class="table table-bordered border-primary" style=" text-align: center; width: 115%;">
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
                                            <img src="{{ asset('storage/images/' . $item->image) }}" alt=""
                                                width='120px' height="100px">
                                        </td>
                                        <td>

                                            <form action="{{ route('product.delete', $item->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a style='color:rgb(52,136,245)' class='btn'
                                                    href="{{ route('product.show', $item->id) }}"><i
                                                        class='bi bi-eye h4'></i></a>
                                                <a style='color:rgb(52,136,245)' class='btn'
                                                    href="{{ route('product.edit', $item->id) }}"><i
                                                        class='bi bi-arrow-clockwise h4'></i></a>
                                                <button class='btn' style='color:rgb(52,136,245)' type="submit"><i
                                                        class='bi bi-trash h4'></i></button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $items->onEachSide(5)->links() }}
                    </main>
                </div>
            </div>
        </div>
    </section>
@endsection
