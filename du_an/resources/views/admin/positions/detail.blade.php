@extends('admin.index')
@section('content')
<style>
    .form-switch{
        padding-left: 0em;
    }
    #checkAll{
        margin-left: 0.5em;
    }
    .check-group{
        margin-left: 20px;
        margin-top: -10px;
    }
    .check_group_all{
        margin-left:60px;
    }
    .all{
        font-size:25px;
        margin-bottom: 10px;
    }
    .title{
        display:flex;
    }
    h5{
        margin-left: 15px;
    }

</style>
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Chức Vụ</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('position.index') }}">Chức vụ</a></li>
                    <li class="breadcrumb-item active">Sửa chức vụ</li>
                </ol>
            </nav>
        </div>
        <div class="page-section">
            <form method="post" action="{{ route('position.update_position', $item->id) }}">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <legend>Thông tin chức vụ</legend>
                        <div class="form-group">
                            <label for="tf1">Tên chức vụ:</label> {{$item->name}}
                        </div>
                        <div class="form-group">
                            <div class = "title">
                                <div>
                                    <label class="form-check form-switch all">{{ __('CheckAll') }}
                                        <input type="checkbox" id="checkAll" class="form-check-input"
                                            value="Quyền hạn">
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                @foreach ($position_names as $group_name => $roles)
                                    <div class="list-group list-group-flush list-group-bordered col-lg-4">
                                        <div class="list-group-header" style="color:rgb(2, 6, 249) ;">
                                            <h5>
                                                <span> {{ __($group_name) }} </span>
                                                <label class="form-switch check_group_all">
                                                    <input type="checkbox" id ="{{$group_name}}" class="form-check-input check-group aa">
                                                </label>
                                            </h5>
                                        </div>
                                        @foreach ($roles as $role)
                                            <div class="list-group-item d-flex justify-content-between align-items-center">
                                                <span style="color: rgb(4, 5, 5) ;">{{ __($role['name']) }}</span>
                                                <!-- .switcher-control -->
                                                <label class="form-check form-switch ">
                                                    <input type="checkbox" @checked(in_array($role['id'], $userRoles)) name="roles[]"
                                                        class="checkItem form-check-input check{{$group_name}}" id = "check{{ $group_name }}"
                                                        value="{{ $role['id'] }}">
                                                    <span class="switcher-indicator"></span>
                                                </label>
                                                <!-- /.switcher-control -->
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-actions">
                            @if (Auth::user()->hasPermission('Position_update'))
                            <button  class="btn btn-primary ml-auto mr-2" type="submit">Lưu</button>
                            @endif
                            <a style="float: right;" class="btn btn-danger float-right " href="{{route('position.index')}}">Hủy</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $('#checkAll').click(function() {
            $(':checkbox.checkItem').prop('checked', this.checked);
            $(':checkbox.aa').prop('checked', this.checked);
        });
        $('.aa').click(function(){
            let id = $(this).attr("id");
                $('.check'+id).prop('checked', this.checked);
        })
    </script>
@endsection
