@extends('admin.index')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Tin Nhắn</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index') }}">Trang chủ</a></li>
                    <li class="breadcrumb-item">Tin Nhắn</a></li>
                </ol>
            </nav>
        </div>
        <div class="chat">
        <div class="chat-left">
            <div class="chat-left-search">
                <div class="search-user">
                    <div class="chat-left-search-input">
                        <input class="search" type="text" placeholder="search">
                    </div>
                    <div class="icon-search">
                        <img class="icon-search-detail" src="./../img/search/search.svg" alt="">
                    </div>
                </div>
            </div>
            <div class="chat-left-list">
                @if($users)
                    @foreach($users as $user)
                        <div class="chat-left-list-user">
                            <div class="user-img">
                                <img class="user-img-detail" src="./../img/search/Rectangle (1).svg" alt="">
                            </div>
                            <div class="user-info">
                                <div class="user-info-name">
                                   {{$user->name}}
                                </div>
                                <div class="user-info-status">
                                    online
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="chat-right">
            <div class="chat-right-current-user">
                <div class="chat-right-current-user-avata">
                    <img class="chat-right-current-user-avata-detail" src="./../img/search/Rectangle (2).svg" alt="">
                </div>
                <div class="chat-right-current-user-name">
                    <div class="chat-right-current-user-name-detail">
                        <div class="chat-right-current-user-name-total-mes">nguyen van c</div>
                        <div class="chat-right-current-user-name-total-mes">1234 mes</div>
                    </div>
                    <div class="icon-call-video">
                        <span>video</span>
                    </div>
                    <div class="icon-call-mess">call basi</div>
                    <div class="setting">
                        <div class="icon-setting">icon setting</div>
                    </div>
                </div>
            </div>
            <div class="chat-content">
                @if($messages)
                    @foreach($messages as $message)
                        @if(Auth()->user()->id == $message->user_id)
                            <div class="content-right">
                                <div class="content-right-float">
                                    <div class="content-mess-2">
                                        <div class="content-mess-2-float">
                                            <div>
                                                <span class="span-content text-message"><a href="#">{{$message->content}}</a></span><br>
                                            </div>
                                            <div class="time-mess-2">
                                                <span class="time-mess-detail-2 time">{{$message->created_at}}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-left-img-2">
                                        <img class="content-left-img-detail-1" src="./../img/search/Rectangle (2).svg" alt="">
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="content-left">
                                <div class="chat-left-list-user-block">
                                    <div class="content-left-img">
                                        <img class="content-left-img-detail" src="./../img/search/Rectangle (2).svg" alt="">
                                    </div>
                                    <div class="content-mess">
                                        <div>
                                            <span class="span-content text-message"><a href="#">{{$message->content}}</a></span><br>
                                        </div>
                                        <div class="time-mess">
                                            <span class="time-mess-detail time">{{$message->created_at}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            <div class="write-content">
                <div class="write-content-center">
                    <div class="write-content-center-detail">
                        <textarea placeholder="Type your message" name="" id="" cols="30" rows="3">sdfvdvd</textarea>
                    </div>
                    <div class="icon-send-mess">
                        send
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.addEventListener("load", (event) => {
            var options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: "numeric" };
            let times = document.getElementsByClassName('time');
            for (let i = 0; i < times.length; i++) {
                let date = new Date(times[i].innerHTML);
                let timeshot = date.toLocaleDateString("en-US", options);
                console.log(timeshot);
                times[i].innerHTML = timeshot;
                times[i].style.opacity = 0;
            }
            let click = document.getElementsByClassName('text-message');
            for (let i= 0; i< click.length; i++) {
                click[i].addEventListener('click', function(){
                    let status = times[i].style.opacity;
                    if(status == 0){
                        times[i].style.opacity = 1;
                    }else {
                        times[i].style.opacity = 0;
                    }
                })
            }
        });
    </script>
    </main>
@endsection
