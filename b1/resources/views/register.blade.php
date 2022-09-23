<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route("register")}}" method="post">
    @method('POST')
    @csrf
    <h1>đăng ký</h1>
    <p>Email</p>
    <input type="text" name="email">
    <p>Password</p>
    <input type="password" name="password">
    <p>UserName</p>
    <input type="text" name="user_name">
    <p>phone</p>
    <input type="text" name="phone">
    <p>Address</p>
    <input type="text" name="address"><br><br>
    <input type="submit" value="đăng nhập">
</form>
@if(isset($mes))
<p>{{$mes}}</p>
@endif
</body>
</html>
