<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trang Quản Trị</title>
    @include('layouts.user.link.toplibs')
    {{-- <link rel="stylesheet" href="/css/dashboard.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    @include('layouts.admin.link.toplibs')
</head>

<body class="app sidebar-mini rtl">

    @include('layouts.admin.header')

    @include('layouts.admin.sidebar')

    <!-- active nav-link -->
    <style>
        li a.app-menu__item[href="{{ route('dashboard') }}"] {
            background-color: #000;
        }
    </style>

    <!-- background -->
    <style>
        .app-content {
            background-image: url(https://img6.thuthuatphanmem.vn/uploads/2022/03/15/background-nen-trang-am-thuc-dep_081319850.jpg);
            background-size: cover;
            background-attachment: fixed;
        }
    </style>

    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Trang quản trị</h1>
                {{-- <p>Chào Mừng</p> --}}
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i></a></li>
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang quản trị</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-3">
                <div class="widget-small primary coloured-icon">
                    <i class="fal fa-hat-chef icon"></i>
                    <div class="info">
                        <h4>Công thức</h4>
                        <p><b>{{ $recipe_quantity }}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small warning coloured-icon">
                    <i class="fal fa-lightbulb-on icon"></i>
                    <div class="info">
                        <h4>Mẹo vặt</h4>
                        <p><b>{{ $tip_quantity }}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small info coloured-icon">
                    <i class="fal fa-newspaper icon"></i>
                    <div class="info">
                        <h4>Tin tức</h4>
                        <p><b>{{ $news_quantity }}</b></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="widget-small danger coloured-icon">
                    <i class="fal fa-users icon"></i>
                    <div class="info">
                        <h4>Người dùng</h4>
                        <p><b>{{ $user_quantity }}</b></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <h3 class="tile-title">Thống kê tài khoản được tạo trong năm <?= date('Y') ?></h3>
                    <div class="embed-responsive embed-responsive-16by9" style="max-height: 520px">
                        <canvas class="embed-responsive-item" id="barChartView"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.user.link.botlibs')
    @include('layouts.admin.link.botlibs')
    <script type="text/javascript">
        var data = {
            labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8", "Tháng 9",
                "Tháng 10", "Tháng 11", "Tháng 12"
            ],
            datasets: [{
                label: "My First dataset",
                fillColor: "rgba(128,128,255,0.2)",
                strokeColor: "rgba(151,187,205,1)",
                pointColor: "rgba(151,187,205,1)",
                pointStrokeColor: "#fff",
                pointHighlightFill: "#fff",
                pointHighlightStroke: "rgba(220,220,220,1)",
                data: [
                    {{ $month[1] }},
                    {{ $month[2] }},
                    {{ $month[3] }},
                    {{ $month[4] }},
                    {{ $month[5] }},
                    {{ $month[6] }},
                    {{ $month[7] }},
                    {{ $month[8] }},
                    {{ $month[9] }},
                    {{ $month[10] }},
                    {{ $month[11] }},
                    {{ $month[12] }},
                ],
            }],
        };

        var chart = $("#barChartView").get(0).getContext("2d");
        var barChart = new Chart(chart).Bar(data);

        $('#sampleTable').DataTable();
    </script>
</body>

</html>
