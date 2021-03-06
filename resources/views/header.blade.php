<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Dota2</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://dn-phphub.qbox.me//assets/css/1e2676fd224cc66e5027-styles.css">
    {{--<link rel="stylesheet" href="{{asset('css/style.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/message.css')}}">
    <script src="{{asset('js/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('js/message.js')}}"></script>
    <script src="{{asset('js/unslider.min.js')}}"></script>
    <script src="{{asset('js/wangEditor.min.js')}}"></script>
</head>
<style>
   a.active{
        border-bottom: 2px solid #dc817e;
    }
   .main-container {
       padding-bottom: 0!important;
   }
</style>
<body>
<div role="navigation" class="navbar navbar-default topnav">
    <div class="container">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a href="/" class="navbar-brand">
                <img src="http://www.dota2.com.cn/images/header/dota2.home.log.png" alt="黄智健" style=""/>
            </a>
        </div>

        <div id="top-navbar-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="" ><a @if(!isset($cate)) class="active"  @endif href="{{url('/')}}" >首页</a></li>
                <li class="" ><a  href="{{url('/chat')}}" >聊天室</a></li>
                @foreach($category as $value)
                    <li class="" ><a @if(isset($cate) && $cate == $value->id) class="active"  @endif href="{{url('/cate/'.$value->id)}}" >{{$value->name}}</a></li>
                @endforeach




            </ul>

            <div class="navbar-right">

                <form method="GET" action="{{url('search')}}" accept-charset="UTF-8" class="navbar-form navbar-left hidden-sm hidden-md">
                    <div class="form-group">

                        <input class="form-control search-input mac-style" placeholder="搜索" name="q" type="text" value="">

                    </div>
                </form>

                @if(session('login_info') == 'success')
                    <ul class="nav navbar-nav github-login" style="margin-top: 12px">
                        <a href="@if($user_info !== null){{url('/user/'.$user_info->id)}} @else {{url('/login')}}  @endif" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="dLabel">
                            @if($user_info !== null)
                            <img class="avatar-topnav" alt="" src="{{asset($user_info->avatar)}}">
                          {{$user_info->nickname}}
                            <span class="caret"></span>
                                @endif
                        </a>
                    </ul>
                    @else
                <ul class="nav navbar-nav github-login" >
                    <a href="{{url('login')}}" class="btn btn-default login-btn no-pjax">
                        <i class="fa fa-user"></i>
                        登 录
                    </a>
                    <a href="{{url('register')}}" class="btn btn-default login-btn no-pjax">
                        <i class="fa fa-user-plus"></i>
                        注 册
                    </a>
                </ul>
@endif

            </div>
        </div>

    </div>
</div>
@if(session('msg_status') == 100)
<script>
    $.showmessage("操作成功");
</script>
   {{\Illuminate\Support\Facades\Session::forget('msg_status')}}
    @elseif(session('msg_status') == 200)
        <script>
            $.showmessage({'message':'操作失败','type':'error'});
        </script>
   {{\Illuminate\Support\Facades\Session::forget('msg_status')}}
        @endif