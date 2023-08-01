<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Admin Dashboard </title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{asset('public/admin/assets/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('public/admin/assets/bundles/summernote/summernote-0.8.18-dist/summernote.css')}}">

    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico'/>
</head>

<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar sticky">
            <div class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
                </ul>
            </div>
            <ul class="navbar-nav navbar-right">

                <li class="dropdown"><a href="#" data-toggle="dropdown"
                                        class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image"
                                                                                                         src="{{asset('public/admin/assets/img/user.png')}}"
                                                                                                         class="user-img-radious-style">
                        <span class="d-sm-none d-lg-inline-block"></span></a>
                    <div class="dropdown-menu dropdown-menu-right pullDown">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a href="{{route('logout')}}" onclick="event.preventDefault();
                                                this.closest('form').submit();"
                               class="dropdown-item has-icon text-danger"> <i
                                    class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <span class="logo-name fa-1x fw-bold">Admin Dashboard</span>

                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Main</li>
                    <li class="dropdown active">
                        <a href="{{route('dashboard')}}" class="nav-link"><i
                                data-feather="monitor"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="menu-toggle nav-link has-dropdown"><i
                                data-feather="home"></i><span>Home</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="{{route('hero_section')}}">Hero Section</a></li>
                            <li><a class="nav-link" href="{{route('feature_section')}}">Features Section</a></li>
                            <li><a class="nav-link" href="{{route('multi_sec')}}">Multi Section</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="{{route('blogs')}}" class="nav-link"><i
                                data-feather="file-text"></i><span>Blogs</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="{{route('download_page')}}" class="nav-link"><i
                                data-feather="download"></i><span>Download</span></a>
                    </li>
                    <li class="dropdown">
                        <a href="{{route('settings')}}" class="nav-link"><i
                                data-feather="settings"></i><span>Settings</span></a>
                    </li>
                </ul>
            </aside>
        </div>
