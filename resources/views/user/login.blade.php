<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
</head>

<body>
<form action="{{url('user/loginDo')}}" method="post">
    @csrf
    <div>用户名：<input type="text" name="user_name"/></div>
    <div>密码：<input type="password" name="password"/></div>
    <div><input type="submit" value="登录"/></div>
</form>
<a href="{{url("user/reg")}}">注册</a>
</body>
</html>
