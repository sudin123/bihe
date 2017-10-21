<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>@yield('title') | Bihe</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    
    <script src="https://use.fontawesome.com/a793bb7e36.js"></script>

    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>

    <link href="{{ asset("/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/admin/assets/global/plugins/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css") }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset("/admin/assets/global/plugins/bootstrap-toastr/toastr.min.css") }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset("/admin/assets/global/plugins/select2/css/select2.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css") }}" rel="stylesheet"  type="text/css"/>
    @stack('styles')
    <link href="{{ asset("/admin/assets/global/css/components.min.css") }}" rel="stylesheet" id="style_components" type="text/css"/>
    <link href="{{ asset("/admin/assets/global/css/plugins.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/admin/assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/admin/assets/pages/css/profile-2.min.css") }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset("/admin/assets/layouts/layout3/css/layout.min.css") }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/admin/assets/layouts/layout3/css/themes/default.min.css") }}" rel="stylesheet" type="text/css" id="style_color"/>

    <link href="{{ asset("/admin/assets/layouts/layout3/css/custom.min.css") }}" rel="stylesheet" type="text/css"/>

    <link rel="shortcut icon" href="{{ asset("/admin/assets/layouts/layout3/img/favicon.ico") }}"/>

</head>
<!-- END HEAD -->
<body class="page-container-bg-solid page-header-menu-fixed">
<div class="page-wrapper">
    <div class="page-wrapper-row">
        <div class="page-wrapper-top">
            <div class="page-header">
                <!-- BEGIN HEADER TOP -->
                <div class="page-header-top">
                    <div class="container">
                        <!-- BEGIN LOGO -->
                        <div class="page-logo">
                            <a href="{{ url('/') }}">
                                <img src="{{ asset("bihe.jpg") }}" alt="logo" class="logo-default" height="70" width="120">
                            </a>
                        </div>
                        <!-- END LOGO -->
                        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                        <a href="javascript:" class="menu-toggler"></a>
                        <!-- END RESPONSIVE MENU TOGGLER -->
                        <!-- BEGIN TOP NAVIGATION MENU -->
                        <div class="top-menu">
                            <ul class="nav navbar-nav pull-right">
                                <!-- BEGIN USER LOGIN DROPDOWN -->
                                <?php $loggedInUser = \Auth::user(); ?>
                                @if($loggedInUser)
                                    <li class="dropdown dropdown-user">
                                        <a href="javascript:" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                            <img alt="" class="img-circle" src="{{ asset("/admin/assets/layouts/layout/img/avatar.png") }}">
                                            <span class="username username-hide-mobile">Welcome {{ $user->name }} !!</span>
                                        </a>
                                    </li>
                                    {{-- <li class="dropdown"><a class="dropdown-toggle" href="{{ route('users.index') }}"><i class="icon-users"></i></a></li> --}}
                                    {{-- <li class="dropdown"><a class="dropdown-toggle" href="{{ route('settings.index') }}"><i class="icon-settings"></i></a></li> --}}
                                    <li  class="dropdown">
                                        {{ Form::open(array('url' => '/logout','id'=>'logout-form', 'class'=>'hide', 'method'=>'post')) }}
                                        {{ Form::submit('', ['class' => 'btn']) }}
                                        {{ Form::close() }}
                                        <a id="logout"  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-toggle"><i class="icon-logout"></i></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                </div>
                <!-- END HEADER TOP -->
                @include('backend.layouts.menu.admins')
            </div>
        </div>
    </div>