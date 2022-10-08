@extends('admin.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Đơn hàng</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
          <li class="breadcrumb-item">Đơn hàng</a></li>
        </ol>
      </nav>
    </div>
    <table class="table table-bordered border-primary" style=" text-align: center">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Khách Hàng</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">Email</th>
            <th scope="col">Số Điện Thoại</th>
            <th scope="col">Ngày Đặt Hàng</th>
            <th scope="col">Tổng Tiền(Đồng)</th>
            <th scope="col">Tùy Chọn</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($items as $key=> $item)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$item->customer->name}}</td>
            <td>{{$item->customer->address}}</td>
            <td>{{$item->customer->email}}</td>
            <td>{{$item->customer->phone}}</td>
            <td>{{$item->date_at}}</td>
            <td>{{number_format($item->total)}}</td>
            <td>
                @if(Auth::user()->hasPermission('Order_view'))
                <a style='color:rgb(52,136,245)' class='btn' href="{{route('order.detail',$item->id)}}"><i class='bi bi-eye h4'></i></a>
                @endif
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $items->onEachSide(5)->links() }}
</main>
@endsection
