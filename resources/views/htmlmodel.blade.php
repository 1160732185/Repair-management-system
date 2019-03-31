<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script language="JavaScript" src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@yield('head')
</head>
<body>
@yield('content')
</body>
</html>