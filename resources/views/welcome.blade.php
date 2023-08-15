<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{$result['settings']['meta_description']}}">
    <meta name="keywords" content="{{$result['settings']['meta_keywords']}}">
    <link rel="icon" href="{{asset('public/assets/images/'.$result['settings']['logo'])}}">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <title>{{$result['settings']['meta_title']}}</title>
    <link rel="stylesheet" href="public/build/assets/app-702c97b5.css">
    <link rel="stylesheet" href="public/build/assets/app-c07d1e87.css">
    {{--    @vite(['resources/css/app.css'])--}}
    <script>
        let initialStateFromServer = JSON.parse('<?=json_encode($result)?>')
    </script>

</head>
<body class="antialiased" style="position: relative; top: 40px !important;" >
<div id="app"></div>
@viteReactRefresh
{{--@vite(['resources/js/app.jsx'])--}}
<script src="public/build/assets/app-c533d099.js"></script>
</body>
</html>
