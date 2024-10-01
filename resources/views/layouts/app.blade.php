<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/stylesheet.css')}}">
</head>
<body>
    <x-parts.navbar />
    @yield('body')
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>