<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <!-- <a href="/" class="logo">{{Config::get('app.project_name')}}</a> -->
    <a class="logo" href="/"><img src="{{ asset("/statics/img/logo.png") }}"></a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
             
                <li class="user user-menu">
                    <a href="#" data-toggle="dropdown">
                       <span class="hidden-xs">您好, {{Auth::user()->name}}</span>
                    </a>
                </li>
                <li class="user user-menu">
                    <a href="/auth/logout">
                       <span class="hidden-xs">退出</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>