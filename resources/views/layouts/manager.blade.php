<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('title')
    @include('layouts.user.link.toplibs')
    @include('layouts.admin.link.toplibs')
</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    @include('layouts.admin.header')
    <!-- Sidebar menu-->
    @include('layouts.admin.sidebar')
    <main class="app-content">
        <style>
            .app-content {
                background-image: url(https://img6.thuthuatphanmem.vn/uploads/2022/03/15/background-nen-trang-am-thuc-dep_081319850.jpg);
                background-size: cover;
                background-attachment: fixed;
            }
        </style>
        @yield('content')
    </main>
    @include('layouts.user.link.botlibs')
    @include('layouts.admin.link.botlibs')

</body>

</html>
