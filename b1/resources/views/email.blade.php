<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route("check.email")}}" method="post">
    @csrf
    <p>nhập email bạn muốn kiểm tra</p>
    <input type="text" name ="email">
    <input type="submit" value="kiểm tra">
</form>
@if(isset($isEmail))
<p>{{$isEmail}}</p>
@endif
</body>
</html>
