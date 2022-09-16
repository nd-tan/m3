<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route("check")}}" method="post">
    @csrf

    <h1>đăng nhập</h1>
    <p>ID</p>
    <input type="text" name="id">
    <p>Password</p>
    <input type="password" name="pw"><br><br>
    <input type="submit" value="đăng nhập">
</form>
@if(isset($b))
<p>{{$b}}</p>
@endif
</body>
</html>
