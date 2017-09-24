<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bad Apple - @yield('title')</title>
    <link rel="stylesheet" href="{{URL::asset('css/app.css')}}">
</head>
<body>
    @yield('app.content')
    <script type="text/javascript" src="{{URL::asset('js/app.js')}}"></script>
</body>
</html>