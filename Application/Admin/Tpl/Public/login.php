<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<!-- Head -->
<head>
    <meta charset="utf-8" />
    <title>Blank Page</title>

    <meta name="description" content="login" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="__IMAGE__/favicon.png" type="image/x-icon">
    <!--Basic Styles-->
    <link href="__CSS__/bootstrap.min.css" rel="stylesheet" />
    <link href="__CSS__/weather-icons.min.css" rel="stylesheet" />
    <link href="__CSS__/font-awesome.min.css" rel="stylesheet" />

    <!--Beyond styles-->
    <link href="__CSS__/demo.min.css" rel="stylesheet" />
    <link href="__CSS__/login.css" rel="stylesheet" />
    <!--Skin Script: Place this script in head to load scripts for skins and rtl support-->
    <script src="__JS__/skins.min.js"></script>
</head>
<body>
<div class="login-screen">
    <div class="login">
        <div class="login-icon">
            <img alt="Welcome to 轻微OA" src="__IMAGE__/login/icon.png">
            <h3>
                Welcome to
                <small>轻微OA</small>
            </h3>
        </div>
        <div class="login-form">
            <div class="form-group">
                <input name="username" class="form-control login-field input-large" type="text" placeholder="用户名" value="">
                <i class="login-field-icon menu-icon glyphicon glyphicon-user"></i>
            </div>
            <div class="form-group">
                <input name="password" class="form-control login-field input-large" type="password" placeholder="密码" value="">
                <i class="login-field-icon menu-icon glyphicon glyphicon-lock"></i>
            </div>
            <div class="form-group">
                <button class="btn btn-large btn-block btn-primary btn-login" type="button">登陆</button>
                <a class="forget-psd" href="#">忘记密码</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>