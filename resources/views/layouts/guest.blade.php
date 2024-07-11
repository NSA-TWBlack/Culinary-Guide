<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    @include('layouts.user.link.toplibs')
</head>

<body>
    @include('layouts.user.header')
    @yield('content')
    @include('layouts.user.footer')
</body>
    @include('layouts.user.link.botlibs')
</html>