<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    @vite('resources/sass/datepicker.css')
    @vite('resources/sass/user.css')
    @vite('resources/sass/toastr.css')
</head>

<body>
    <div class="container">
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
                            <a data-coreui-original-title="alo" data-coreui-placement="bottom" data-toggle="tooltip">{{$user->id}}</a>
                        </th>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
        <ul class="pagination">
            {{ $users->appends(request()->input())->render() }}
        </ul>
    <div>
@vite('resources/js/app.js')
@vite('resources/js/datepicker.js')
@vite('resources/js/ck-editor.js')
@vite('resources/js/ckeditor-demo.js')
@vite('resources/js/login.js')
@vite('resources/js/tooltil.js')
@vite('resources/js/laravel-sort.js')
</body>
</html>
