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
                                    <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Sản phẩm</a></li>
                                    <li class="breadcrumb-item">Chi tiết sản phẩm</a></li>
                                </ol>
                            </nav>
                        </div>
                        <table class="table table-bordered border-primary" style=" text-align: center; width: 115%;">
                            <thead>
                                <tr>
                                    <th width="10%">Tên Sản Phẩm</th>
                                    <th width="10%">Danh Mục</th>
                                    <th width="10%">Tuổi</th>
                                    <th width="10%">Màu Sắc</th>
                                    <th width="10%">Giới Tính</th>
                                    <th width="10%">Giá</th>
                                    <th width="10%">Số Lượng</th>
                                    <th width="10%">Ngày Thêm</th>
                                    <th width="10%">Hình Ảnh</th>
                                    {{-- <th width="10%">Tùy Chọn</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->category->name }}</td>
                                        <td>{{ $item->age}}</td>
                                        <td>{{ $item->color}}</td>
                                        <td>{{ $item->gender}}</td>
                                        <td>{{ number_format($item->price) }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->created_at}}</td>
                                        <td>
                                            <img src="{{ asset('storage/images/' . $item->image) }}" alt="" width= '120px' height="100px" >
                                        </td>
                                        {{-- <td>

                                            <form action="{{ route('category.delete', $item->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <a style='color:rgb(52,136,245)' class='btn' href="{{route('product.show',$item->id)}}"><i
                                                        class='bi bi-eye h4'></i></a>
                                                <a style='color:rgb(52,136,245)' class='btn'
                                                    href="{{ route('category.edit', $item->id) }}"><i
                                                        class='bi bi-arrow-clockwise h4'></i></a>
                                                <button class='btn' style='color:rgb(52,136,245)' type="submit"><i
                                                        class='bi bi-trash h4'></i></button>
                                            </form>
                                        </td> --}}

                                    </tr>

                            </tbody>
                        </table>


                    </main>


                </div>
            </div>
        </div>
    </section>
@endsection
