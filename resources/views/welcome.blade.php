<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    {{--<link rel="stylesheet" href="public/build/assets/app-829fb0a8.css">--}}
    @vite(['resources/css/app.css'])
</head>
<body class="antialiased">
<div class="container" id="app"></div>
@viteReactRefresh
@vite(['resources/js/app.jsx'])
{{--<script src="public/build/assets/app-2f00afd8.js"></script>--}}
</body>
</html>
