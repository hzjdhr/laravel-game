
@include('header')
<div class="container main-container ">
<div class="col-md-4 col-md-offset-4 floating-box">
    <div class="panel panel-default"  style="width:500px">
        <div class="panel-heading">
            <h3 class="panel-title">请登录</h3>
        </div>
        <div class="panel-body">

            <form method="post"  accept-charset="UTF-8" action="{{url('login_check')}}" onsubmit="return checkForm()">

                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="form-group ">
                    <label class="control-label" for="username">邮 箱</label>
                    <input class="form-control" name="username" id="username" type="text" value="" placeholder="请填写邮箱">
                </div>

                <div class="form-group ">
                    <label class="control-label" for="password">密 码</label>
                    <input class="form-control" name="password" id="password" type="password" value="" placeholder="请填写密码">
                </div>
                <div  id="errorMsg">
                </div>
             {{--   <div class="form-group " id="errorMsg">
                </div>--}}
                <fieldset class="form-group text-right">
                    <a class="no-pjax" href="https://laravel-china.org/auth/forget" style="color: #717573;font-size: 13px;">忘记密码？</a>
                </fieldset>

                <button type="submit" class="btn btn-lg btn-success btn-block">
                    <i class="fa fa-btn fa-sign-in"></i> 登录
                </button>

                <hr>

                <fieldset class="form-group">
                    <div class="alert alert-info">
                        你也可以使用第三方登录
                    </div>

                    <a class="btn btn-lg btn-default btn-block" id="login-required-submit" href="{{url('/login/qq')}}"><i
                                class="fa fa-github-alt"></i>QQ 登录</a>

                </fieldset>
            </form>


        </div>
    </div>
</div>
</div>


<script type="text/javascript">
    function checkForm() {
        var username = document.getElementById("username");
        var password = document.getElementById("password");
        var reg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        if (trim(username.value) == null || trim(username.value) == "") {
            username.focus();
            return false;
        }
        else if (trim(password.value) == null || trim(password.value) == "") {
            password.focus();
            return false;
        }
        else if(!reg.test(username.value)){
            var divA = document.getElementById("errorMsg");
            divA.innerHTML="<label style='color: #ff000b;font-size: large'>邮箱格式错误!!</label>";
            return false;
        }
        else {
            return true;
        }
    }
    function trim(str) { //删除左右两端的空格
        return str.replace(/(^\s*)|(\s*$)/g, "");
    }
</script>

@include('footer')