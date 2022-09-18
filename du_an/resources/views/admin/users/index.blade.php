@extends('admin.index')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Danh sách nhân viên</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
          <li class="breadcrumb-item">Danh sách nhân viên</a></li>
        </ol>
      </nav>
    </div>
    <a class='btn btn' style='color:rgb(52,136,245)' href="{{route('user.register')}}">Thêm nhân viên</a>
    <table class="table table-bordered border-primary" style=" text-align: center; width:100%">
        <thead>
          <tr>
            <th width="10%">STT</th>
            <th width="10%">Tên Nhân viên</th>
            <th width="10%">Email</th>
            <th width="10%">Chức vụ</th>
            <th width="10%">Hình ảnh</th>
            <th width="20%">Tùy Chọn</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($items as $key=> $item)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>{{$item->position->name}}</td>
            <td>
                <img src="{{ asset('storage/images_admin/' . $item->image) }}" alt=""width='120px' height="100px">
            </td>
            <td>

                <form action="{{route('user.delete',$item->id)}}" method="post">
                    @method('DELETE')
                    @csrf
                    <a style='color:rgb(52,136,245)' class='btn' href="{{route('user.show',$item->id)}}"><i class='bi bi-eye h4'></i></a>
                    <a style='color:rgb(52,136,245)' class='btn' href="{{route('user.edit',$item->id)}}"><i class='bi bi-arrow-clockwise h4'></i></a>
                    <button class ='btn' style='color:rgb(52,136,245)' type="submit" ><i class='bi bi-trash h4'></i></button>
                </form>
            </td>

          </tr>
          @endforeach

        </tbody>
      </table>
      {{ $items->onEachSide(5)->links() }}



</main>
@endsection
