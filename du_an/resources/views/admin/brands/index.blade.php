@extends('admin.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Thương Hiệu</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
          <li class="breadcrumb-item">Thương Hiệu</a></li>
        </ol>
      </nav>
    </div>
    @if(Auth::user()->hasPermission('Brand_create'))
    <a class='btn btn' style='color:rgb(52,136,245)' href="{{route('brand.add')}}">Thêm thương hiệu</a>
    @endif
    <a class='btn btn' style='color:rgb(52,136,245)' href="{{route('brand.softdelete')}}">Thùng rác</a>
        {{-- <form action="" id="form-search" class="form-inline d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="form-group">
                <input  class="form-control" name="key" placeholder="search by name...">
                <button  type="submit" class="btn btn-primary">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form> --}}
    <table class="table table-bordered border-primary" style=" text-align: center">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên Thương Hiệu</th>
            <th scope="col">Số Điện Thoại</th>
            <th scope="col">Địa Chỉ</th>
            <th scope="col">Tùy Chọn</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($items as $key=> $item)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->address}}</td>
            <td>
                <form action="{{ route('brand.delete', $item->id) }}" method="post" >
                    @method('DELETE')
                    @csrf
                    {{-- @if(Auth::user()->hasPermission('Brand_view'))
                    <a style='color:rgb(52,136,245)' class='btn' href=""><i class='bi bi-eye h4'></i></a>
                    @endif --}}
                    @if(Auth::user()->hasPermission('Brand_update'))
                    <a style='color:rgb(52,136,245)' class='btn' href="{{route('brand.edit',$item->id)}}"><i class='bi bi-pencil-square h4'></i></a>
                    @endif
                    @if(Auth::user()->hasPermission('Brand_delete'))
                    <button onclick="return confirm('Bạn có chắc muốn đưa danh mục này vào thùng rác không?');" class ='btn' style='color:rgb(52,136,245)' type="submit" ><i class='bi bi-trash h4'></i></button>
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
