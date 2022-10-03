@extends('admin.index')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
      <h1>Nhà Cung Cấp</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('index')}}">Trang chủ</a></li>
          <li class="breadcrumb-item">Nhà cung cấp</a></li>
        </ol>
      </nav>
    </div>
    @if(Auth::user()->hasPermission('Supplier_create'))
    <a class='btn btn' style='color:rgb(52,136,245)' href="{{route('supplier.add')}}">Thêm nhà cung cấp</a>
    @endif
    <a class='btn btn' style='color:rgb(52,136,245)' href="{{route('supplier.softdelete')}}">Thùng rác</a>
    {{-- <form action="" id="form-search" class="form-inline d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
        <div class="form-group">
            <input  class="form-control" name="key" placeholder="search by name...">
            <button  type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i>
            </button>
        </div>
    </form> --}}
    <table class="table table-bordered border-primary" style=" text-align: center; width:100%">
        <thead>
          <tr>
            <th width='5%'>STT</th>
            <th width='10%'>Tên Nhà Cung Cấp</th>
            <th width='10%'>Địa Chỉ</th>
            <th width='10%'>Số Điện Thoại</th>
            <th width='10%'>Email</th>
            <th width='10%'>Tùy Chọn</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($items as $key=> $item)
          <tr>
            <th scope="row">{{++$key}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->address}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->email}}</td>
            <td>
                <form action="{{route('supplier.delete',$item->id)}}" method="post" >
                    @method('DELETE')
                    @csrf
                    {{-- <a style='color:rgb(52,136,245)' class='btn' href="#"><i class='bi bi-eye h4'></i></a> --}}
                    @if(Auth::user()->hasPermission('Supplier_update'))
                    <a style='color:rgb(52,136,245)' class='btn' href="{{route('supplier.edit',$item->id)}}"><i class='bi bi-pencil-square h4'></i></a>
                    @endif
                    @if(Auth::user()->hasPermission('Supplier_delete'))
                    <button onclick="return confirm('Bạn có chắc muốn đưa nhà cung cấp này vào thùng rác không?');" class ='btn' style='color:rgb(52,136,245)' type="submit" ><i class='bi bi-trash h4'></i></button>
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
