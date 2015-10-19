<!DOCTYPE html>
    <!--
    This is a starter template page. Use this page to start your new project from
    scratch. This page gets rid of all links and provides the needed markup only.
    -->
<html>
    <head>
        <meta charset="UTF-8">
        <title>{{Config::get('app.project_name')}} - {{ $title }}</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset("/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="{{ asset("/awesome/font/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="{{ asset("/admin-lte/ionicons.min.css") }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset("/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link href="{{ asset("/admin-lte/plugins/iCheck/all.css")}}" rel="stylesheet" type="text/css" />

        <link href="{{ asset("/admin-lte/dist/css/skins/skin-red-light.min.css")}}" rel="stylesheet" type="text/css" />

        <!-- jQuery 2.1.3 -->
        <script src="{{ asset ("/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
         <!-- Bootstrap 3.3.2 JS -->
        <script src="{{ asset ("/admin-lte/bootstrap/js/bootstrap.js") }}" type="text/javascript"></script>
        

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-red-light">
    <div class="wrapper">

        <!-- Header -->
        @include('admin.layouts.header1')

        <!-- Sidebar -->
        @include('admin.layouts.sidebar1',['menus' => Zhuayi\admin\Models\Menu::get()])
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    {{ $title }}
                </h1>
               
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Your Page Content Here -->
                @yield('content')
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->

        <!-- Footer -->
        @include('admin.layouts.footer1')

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

   
   
    <!-- AdminLTE App -->
    <script src="{{ asset ("/admin-lte/dist/js/app.min.js") }}" type="text/javascript"></script>

    <script src="{{ asset ("/admin-lte/plugins/iCheck/icheck.min.js") }}" type="text/javascript"></script>
    
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
          Both of these plugins are recommended to enhance the
          user experience -->
    </body>
</html>