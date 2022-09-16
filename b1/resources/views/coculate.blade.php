<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route("coculate")}}" method="post">
    @csrf
    <p>Mo ta san pham</p>
    <input type="text" name ="mota">
    <p>Gia niem yet</p>
    <input type="number" name="gia">
    <p>Ty le chiet khau</p>
    <input type="number" name="tile">%<br><br>
    <input type="submit" value="tinh">
</form>
@if(isset($mota))
<p>tên sản phẩm: {{$mota}}</p>
<p>giá niêm yết: {{number_format($gia)}} đồng</p>
<p>tỉ lệ chiết khấu: {{$tile}}%</p>
<p>lượng chiết khấu: {{number_format($luongck)}} đồng</p>
<p>số tiền phải trả: {{number_format($total)}} đồng</p>
@endif

</body>
</html>
