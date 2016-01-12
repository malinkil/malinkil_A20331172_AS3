<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CRUD PAGE</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="{{asset('assets/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="{{asset('assets/css/ionicons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{asset('assets/css/AdminLTE.css')}}" rel="stylesheet" type="text/css" />


    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-blue">
<!-- header logo: style can be found in header.less -->
<header class="header">
    <a href="../../index.html" class="logo">
        <!-- Add the class icon to your logo image or logo icon to add the margining -->
        Login Page
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->

        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->
                <!-- Tasks: style can be found in dropdown.less -->
                </li>
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">

                    <ul class="dropdown-menu">

                        <li class="user-footer">
                            <div class="pull-right">
                                <a href="<?php echo 'auth/logout/'?>" class="btn btn-primary">Sign out</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">

            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">

                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            <div class="well well-sm text-center">
                <h1 align="center">Please Enter Your Credentials</h1>
            </div>
            <div class="container" align="center">
                <form method="POST" action="/auth/login">
                    {!! csrf_field() !!}

                    <div>
                        <label> Email: <input type="text" style="margin-left: 28px" name="email" value="{{ old('email') }}"></label><br>
                        <p style="color: red">{{$errors->first('email')}}</p>
                        {{--<input type="email" name="email" value="{{ old('email') }}">--}}
                    </div>

                    <div>
                        <label>Password: <input type="password"  name="password" id="password"></label><br>
                        <p style="color: red">{{$errors->first('password')}}</p>
                        {{--Password--}}
                        {{--<input type="password" name="password" id="password">--}}
                    </div>

                    <div>

                    </div></br>

                    <div>
                        <button  class="btn btn-primary" type="submit" style="margin-right: 100px">Login</button>
                        <a href="<?php echo '/auth/register'?>" class="btn btn-primary" style="margin-left: 100px">Register</a>
                    </div>
                </form>
            </div>
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->


<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>


</body>
</html>