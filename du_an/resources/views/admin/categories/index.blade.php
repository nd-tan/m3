@extends('admin.index')
@section('content')
<main id="main" class="main">

    <div class="pagetitle">
      <h1>Danh Mục</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
          <li class="breadcrumb-item">Danh mục</a></li>
        </ol>
      </nav>
    </div>
    <a class='btn btn' style='color:rgb(52,136,245)' href="{{route('category.add')}}">Thêm danh mục</a>
    <table class="table table-bordered border-primary" style=" text-align: center">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Danh Mục</th>
            <th scope="col">Tùy Chọn</th>

          </tr>
        </thead>
        <tbody>
            @foreach ($items as $key=> $item)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$item->name}}</td>
            <td>

                <form action="{{ route('category.delete', $item->id) }}" method="post" >
                    @method('DELETE')
                    @csrf
                    <a style='color:rgb(52,136,245)' class='btn' href=""><i class='bi bi-eye h4'></i></a>
                    <a style='color:rgb(52,136,245)' class='btn' href="{{route('category.edit',$item->id)}}"><i class='bi bi-arrow-clockwise h4'></i></a>
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
