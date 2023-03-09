<div class="container" id="history">
<table class="table" >
    <thead class="thead-dark">
        <tr>
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">Tuổi</th>
            <th scope="col">Màu Sắc</th>
            <th scope="col">Giới Tính</th>
            <th scope="col">GIá (Đồng)</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Tổng tiền (Đồng)</th>
            <th scope="col">Ngày đặt</th>
            <th scope="col">Hình Ảnh</th>
        </tr>
    </thead>
    @if (isset($items))
        @foreach ($items as $key => $item)
            <tbody>
                <tr>
                    <td>{{$item->name }}</td>
                    <td>{{$item->age }}</td>
                    <td>{{$item->color }}</td>
                    <td>{{$item->gender }}</td>
                    <td>{{number_format($item->price)}}</td>
                    <td>{{$item->quantity }}</td>
                    <td>{{number_format($item->total)}}</td>
                    <td>{{$item->created_at }}</td>
                    <td><img src="{{ asset('storage/images/' . $item->image) }}" width="100px" height="100px" alt=""></td>

                </tr>

            </tbody>
        @endforeach
    @else
        <label></label>
    @endif
</table>
</div>
