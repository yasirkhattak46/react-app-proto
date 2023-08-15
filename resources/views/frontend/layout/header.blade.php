<!DOCTYPE html>
<html lang="ur">
<head>
    <meta charset="UTF-8">
    <title>{{$settings->meta_title}}</title>
    <meta name="description" content="{{$settings?->meta_description}}">
    <meta name="keywords" content="{{$settings?->meta_keywords}}">
    <meta property="og:title" content="{{$settings->meta_title}}">
    <meta property="og:description" content="{{$settings?->meta_description}}">
    <meta property="og:image" content="{{$settings->logo}}">
    <meta property="og:url" content="{{url('/')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <link rel="canonical" href="{{url('/')}}">
    <link rel="alternate" href="{{url('/')}}" hreflang="x-default"/>
    <link rel="alternate" href="{{url('/en')}}" hreflang="en"/>
    <link rel="alternate" href="{{url('/bd')}}" hreflang="bd"/>
    <link rel="alternate" href="{{url('/br')}}" hreflang="br"/>
    <link rel="alternate" href="{{url('/fr')}}" hreflang="fr"/>
    <link rel="alternate" href="{{url('/de')}}" hreflang="de"/>
    <link rel="alternate" href="{{url('/in')}}" hreflang="in"/>
    <link rel="alternate" href="{{url('/id')}}" hreflang="id"/>
    <link rel="alternate" href="{{url('/it')}}" hreflang="it"/>
    <link rel="alternate" href="{{url('/jp')}}" hreflang="jp"/>
    <link rel="alternate" href="{{url('/my')}}" hreflang="my"/>
    <link rel="alternate" href="{{url('/ur')}}" hreflang="ur"/>
    <link rel="alternate" href="{{url('/pa')}}" hreflang="pa"/>
    <link rel="alternate" href="{{url('/ru')}}" hreflang="ru"/>
    <link rel="alternate" href="{{url('/sa')}}" hreflang="sa"/>
    <link rel="alternate" href="{{url('/es')}}" hreflang="es"/>
    <link rel="alternate" href="{{url('/ta')}}" hreflang="ta"/>
    <link rel="alternate" href="{{url('/te')}}" hreflang="te"/>
    <link rel="alternate" href="{{url('/th')}}" hreflang="th"/>
    <link rel="alternate" href="{{url('/tr')}}" hreflang="tr"/>
    <link rel="alternate" href="{{url('/vn')}}" hreflang="vn"/>
    <link rel="stylesheet" href="{{asset('public/frontend/assets/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/assets/main.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/assets/customizer.css')}}">
    <link rel="shortcut icon" href="{{asset('public/assets/images/'.$settings->logo)}}" type="image/x-icon">
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    {!! $settings->header_script !!}


    <script type="text/javascript"
            src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</head>
<body>
<div id="main_wrap">
    <div id="home_bg"></div>
    <header>
        <div class="container">
            <span id="menu_hndlr" class="menu_hndlr"><img onClick="show_menu_mob();" width="30" height="30"
                                                          src="{{asset('public/frontend/assets/images/icon-menu.png')}}"
                                                          alt="Menu"></span>
            <div class="logo_wrap">
                <a href="{{url('/')}}">
                    <img height="45" width="195" class="logo hwa"
                         src="{{asset('public/assets/images/'.$settings->logo)}}"
                         alt="Something">
                </a>
            </div>

            <div id="nav_wrap">
                <p class="mob_menu_close"><i onClick="hide_menu_mob();" class="fa fa-times"></i></p>
                <ul class="main_nav">
                    <li>
                        <a href="{{url('/')}}">Home</a>
                    </li>
                    <li>
                        <a href="{{url('/download')}}">Download</a>
                    </li>
                    <li>
                        <a href="{{url('/blogs')}}">Blog</a>
                    </li>
            </div>

            <div class="lang_box">
                <div class="lang_box_1">
                    <p id="lang_hndlr"> ▼</p>
                    <div class="lang_inn">
                        <a  href="{{url('/en')}}" hreflang="en"> English </a>
                        <a rel="alternate" href="{{url('/bd')}}" hreflang="bd">Bengali</a>
                        <a rel="alternate" href="{{url('/br')}}" hreflang="br">Portuguese (Brazil)</a>
                        <a rel="alternate" href="{{url('/fr')}}" hreflang="fr">French</a>
                        <a rel="alternate" href="{{url('/de')}}" hreflang="de">German</a>
                        <a rel="alternate" href="{{url('/id')}}" hreflang="id">Indonesian</a>
                        <a rel="alternate" href="{{url('/it')}}" hreflang="it">Italian</a>
                        <a rel="alternate" href="{{url('/jp')}}" hreflang="jp">Japanese</a>
                        <a rel="alternate" href="{{url('/my')}}" hreflang="my">Malay</a>
                        <a rel="alternate" href="{{url('/ur')}}" hreflang="ur">Urdu</a>
                        <a rel="alternate" href="{{url('/pa')}}" hreflang="pa">Punjabi</a>
                        <a rel="alternate" href="{{url('/ru')}}" hreflang="ru">Russian</a>
                        <a rel="alternate" href="{{url('/sa')}}" hreflang="sa">Arabic (Saudi Arabia)</a>
                        <a rel="alternate" href="{{url('/es')}}" hreflang="es">Spanish</a>
                        <a rel="alternate" href="{{url('/ta')}}" hreflang="ta">Tamil</a>
                        <a rel="alternate" href="{{url('/te')}}" hreflang="te">Telugu</a>
                        <a rel="alternate" href="{{url('/th')}}" hreflang="th">Thai</a>
                        <a rel="alternate" href="{{url('/tr')}}" hreflang="tr">Turkish</a>
                        <a rel="alternate" href="{{url('/vn')}}" hreflang="vn">Vietnamese</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="clear"></div>
