<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{ Config::get('app.project_name' )}}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset("/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="{{ asset("/awesome/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <!--<link href="{{ asset("/admin-lte/ionicons.min.css") }}" rel="stylesheet" type="text/css" />-->
        <!-- Theme style -->
        <link href="{{ asset("/admin-lte/dist/css/AdminLTE.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link href="{{ asset("/admin-lte/plugins/iCheck/square/blue.css") }}" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="{{ asset("/admin-lte/html5shiv.js")}}"></script>
        <script src="{{ asset("/admin-lte/respond.min.js")}}"></script>
        <![endif]-->
        <script src="{{ asset ("/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
    </head>
    <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="#"><img src="{{ asset("/statics/img/logo_login.png") }}"/></a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg"></p>
        <form action="/auth/login" method="post">
          {!! csrf_field() !!}
          <div class="form-group has-feedback">
            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="Password" name="password" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox" name="remember"> Remember Me
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">登录</button>
            </div><!-- /.col -->
          </div>
        </form>
<!--        <a href="/password/email">找回密码</a><br>
        <a href="/auth/register">新用户注册</a><br>-->
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{ asset ("/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{ asset ("/admin-lte/plugins/iCheck/icheck.min.js") }}" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>