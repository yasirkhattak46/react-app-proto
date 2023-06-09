<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('public/assets/images/favicon.png')}}">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <title>GBWhatsapp</title>
    {{--<link rel="stylesheet" href="public/build/assets/app-829fb0a8.css">--}}
    @vite(['resources/css/app.css'])
</head>
<body class="antialiased">
<div id="app"></div>
@viteReactRefresh
@vite(['resources/js/app.jsx'])
{{--<script src="public/build/assets/app-2f00afd8.js"></script>--}}
</body>
</html>
