@extends('admin.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Khách hàng</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
          <li class="breadcrumb-item">Khách hàng</a></li>
        </ol>
      </nav>
    </div>
    <table class="table table-bordered border-primary" style=" text-align: center">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Khách Hàng</th>
            <th scope="col">Địa chỉ</th>
            <th scope="col">Email</th>
            <th scope="col">Số Điện Thoại</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($items as $key=> $item)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->address}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->phone}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $items->onEachSide(5)->links() }}
</main>
@endsection
