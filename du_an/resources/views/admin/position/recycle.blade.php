@extends('admin.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Chức Vụ</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('position.index') }}">Chức vụ</a></li>
                    <li class="breadcrumb-item">Thùng rác</li>
                </ol>
            </nav>
        </div>
        <a class='btn btn' style='color:rgb(52,136,245)' href="{{ route('position.index') }}">Danh sách Chức vụ</a>
        <table class="table table-bordered border-primary" style=" text-align: center">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên Chức Vụ</th>
                    <th scope="col">Tùy Chọn</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $key => $item)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $item->name }}</td>
                        <td>
                            <form action="{{ route('position.deleted', $item->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                @if (Auth::user()->hasPermission('Position_restore'))
                                    <a onclick="return confirm('Bạn có chắc muốn khôi phục chức vụ này không?');"
                                        style='color:rgb(52,136,245)' class='btn'
                                        href="{{ route('position.restore', $item->id) }}"><i
                                            class='bi bi-arrow-clockwise h4'></i></a>
                                @endif
                                @if (Auth::user()->hasPermission('Position_forceDelete'))
                                    <button onclick="return confirm('Bạn có chắc muốn xóa chức vụ này không?');" class='btn'
                                        style='color:rgb(52,136,245)' type="submit"><i class='bi bi-trash h4'></i></button>
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
