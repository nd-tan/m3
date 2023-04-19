<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css"> -->
    <title>Document</title>
    @vite('resources/sass/datepicker.css')
    @vite('resources/sass/login.css')
    @vite('resources/sass/toastr.css')
</head>

<body>
    <!-- <form action="{{route("check")}}" method="post">
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
    @endif -->
    <form action="{{route('check_request')}}" method="post">
        @csrf
        <div style="display: flex">
            <div>Date: <input type="text" id="datepicker"></div>
            <div>Date: <input type="text" id="datepicker_2"></div>
        </div>
        <textarea class="ck-editor form-control" rows="5" name="ck-editor" cols="5">
                {!! $des ?? '' !!}
        </textarea>
        <button type="submit">check</button>
    </form>
    <a href="" data-coreui-original-title="alo" data-toggle="tooltip">trang chủuuu</a><br>
    <a href="" data-coreui-original-title="blo" data-toggle="tooltip">trang chủuuu</a>
@vite('resources/js/app.js')
@vite('resources/js/datepicker.js')
@vite('resources/js/login.js')
@vite('resources/js/tooltil.js')
@vite('resources/js/ck-editor.js')
</body>
</html>
