<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @vite('resources/sass/datepicker.css')
    @vite('resources/sass/login.css')
    @vite('resources/sass/toastr.css')
</head>

<body>
    <!-- <form action="" method="post">
        @method('POST')
        @csrf
        <h1>đăng nhập</h1>
        <p>Email</p>
        <input id="input" type="text" name="email">
        <p>Password</p>
        <input type="password" name="password"><br><br>
        <input type="submit" value="đăng nhập">
        <a href="">đăng xuất</a>
        <a href="">đăng ký</a>
    </form>
    @if(isset($mes))
    <p>{{$mes}}</p>
    @endif -->
    <form action="" method="post">
        @csrf
        <div style="display: flex">
            <div>Date: <input type="text" id="datepicker"></div>
            <div>Date: <input type="text" id="datepicker_2"></div>
        </div>
        <textarea class="ck-editor form-control" rows="5" name="ck-editor" cols="5">
                {!! $des ?? '' !!}
        </textarea>
        <button type="submit">check</button>
        <button id="check" type="button">check data des</button>
    </form>
    <a href="" data-coreui-original-title="alo" data-coreui-placement="bottom" data-toggle="tooltip">trang chủuuu</a><br>
    <a href="" data-coreui-original-title="blo" data-coreui-placement="bottom" data-toggle="tooltip">trang chủuuu</a>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">
        <a data-field="users.id" class="laravel-sort">{{ __('ID') }}</a>
      </th>
      <th scope="col">
        <a data-field="users.name" class="laravel-sort">{{ __('Name') }}</a>
      </th>
      <th scope="col">
        <a data-field="users.email" class="laravel-sort">{{ __('Email') }}</a>
      </th>
      <th scope="col">
        <a data-field="users.created_at" class="laravel-sort">{{ __('Created_at') }}</a>
      </th>
    </tr>
  </thead>
  <tbody>
    @if($users)
        @foreach($users as $user)
            <tr>
            <th scope="row">
                {{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            </tr>
        @endforeach
    @endif
  </tbody>
</table>
@vite('resources/js/app.js')
@vite('resources/js/datepicker.js')
@vite('resources/js/ck-editor.js')
@vite('resources/js/ckeditor-demo.js')
@vite('resources/js/login.js')
@vite('resources/js/tooltil.js')
@vite('resources/js/laravel-sort.js')
<script>
    
</script>
</body>
</html>
