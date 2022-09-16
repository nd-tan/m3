<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route("dich")}}" method="post">
    @csrf
        <p>nhập từ bạn muốn dịch</p>
        <input type="text" name="name">
        <input type="submit" value="dich">
    </form>
    @if(isset($name))
    <p>{{$name}}</p>
    <p>có nghĩa là: {{$b}}</p>
    @endif
</body>
</html>
