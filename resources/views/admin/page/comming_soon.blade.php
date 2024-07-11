


  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản Lý Danh Mục</title>
    @include('layouts.user.link.toplibs')
    @include('layouts.admin.link.toplibs')
</head>

<body class="app sidebar-mini rtl">
    <!-- Navbar-->
    @include('layouts.admin.header')
    <!-- Sidebar menu-->
    @include('layouts.admin.sidebar')
    <main class="app-content">
        <div class="page-error tile">
          <h1><i class="fa fa fa-heart"></i> Comming Soon!</h1>
          <p>Trang bạn yêu cầu sẽ sớm được cập nhật. Trân trọng! </p>
          <p><a class="btn btn-primary" href="javascript:window.history.back();">Trở về</a></p>
        </div>
      </main>
    @include('layouts.user.link.botlibs')
    @include('layouts.admin.link.botlibs')
   
</body>

</html>