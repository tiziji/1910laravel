<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
</head>

<body>
{{--@if($errors->any())--}}
{{--    <div class="alert alert-danger">--}}
{{--        <ul>--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li>{{$error}}</li>--}}
{{--                @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--    @endif--}}
<form action="" method="post">
    @csrf
    <div>用户名：<input type="text" name="user_name"/></div>
    <b style="color:red">{{{$errors->first('user_name')}}}</b>
        <div>邮箱：<input type="text" name="email"/></div>
    <b style="color:red">{{{$errors->first('email')}}}</b>
    <div>密码：<input type="password" name="password"/></div>
    <b style="color:red">{{{$errors->first('password')}}}</b>
    <div>确认密码：<input type="password" name="password_q"/></div>
    <b style="color:red">{{{$errors->first('password_q')}}}</b>

    <div><input type="submit" value="注册"/></div>
</form>
<a href="{{url("user/login")}}">登录</a>

</body>
</html>