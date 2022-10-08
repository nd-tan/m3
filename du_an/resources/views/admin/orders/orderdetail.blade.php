@extends('admin.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Chi tiết đơn hàng</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
          <li class="breadcrumb-item"><a href="{{route('order.index')}}">Đơn hàng</a></li>
          <li class="breadcrumb-item">Chi tiết đơn hàng</a></li>
        </ol>
      </nav>
    </div>
    <table class="table table-bordered border-primary" style=" text-align: center">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">Tuổi</th>
            <th scope="col">Màu Sắc</th>
            <th scope="col">Giới Tính</th>
            <th scope="col">GIá(Đồng)</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Tổng Tiền(Đồng)</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($items as $key=> $item)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->age}}</td>
            <td>{{$item->color}}</td>
            <td>{{$item->gender}}</td>
            <td>{{number_format($item->price)}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{number_format($item->total)}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
</main>
@endsection
