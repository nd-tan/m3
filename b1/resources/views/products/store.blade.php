<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @vite('resources/sass/user.css')
    @vite('resources/sass/toastr.css')
    @vite('resources/sass/product.css')
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-2 pt-2">
                <label class="select-user">Chọn người dùng : </label>
            </div>
            <div class="col-9">
                <input type="text" id="user" name="user" data-href="{{route('user.autocomplete')}}" class="form-control h-auto">
            </div>
        </div>
    <div>
<script>
        _users = {!! json_encode($users) !!};
        var _appUrl = '{!! url('/') !!}';
        var _token = '{!! csrf_token() !!}';
</script>
@vite('resources/js/app.js')
@vite('resources/js/tooltil.js')
@vite('resources/js/laravel-sort.js')
@vite('resources/js/product-store.js')
</body>
</html>
