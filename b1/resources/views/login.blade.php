<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/js/app.js')
    @vite('resources/js/login.js')
</head>

<body>
    <form action="{{route("check")}}" method="post">
        @method('POST')
        @csrf
        <h1>đăng nhập</h1>
        <p>Email</p>
        <input id="input" type="text" name="email">
        <p>Password</p>
        <input type="password" name="password"><br><br>
        <input type="submit" value="đăng nhập">
        <a href="{{route('logout')}}">đăng xuất</a>
        <a href="{{route('register')}}">đăng ký</a>
    </form>
    @if(isset($mes))
    <p>{{$mes}}</p>
    @endif
<script>
    a=4;
    console.log(a);
</script>

</body>

</html>
