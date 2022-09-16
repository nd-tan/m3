<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="{{route("update",$item->id)}}" method="post">
    @csrf
    <label for="">name</label>
    <input type="text" name="name" value="{{$item->name}}">
    <input type="submit" value="luu">
</form>
</body>
</html>
