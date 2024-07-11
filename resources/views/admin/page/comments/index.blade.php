@extends('layouts.manager')
@section('title')
    <title>Bình Luận</title>
@endsection
@section('content')
    <!-- active nav-link -->
    <style>
        li a.app-menu__item[href="{{ route('admin.comments.index') }}"] {
            background-color: #000;
        }
    </style>

    <div class="app-title">
        <div>
            <h1></i>Bình luận</h1>
        </div>


        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang quản trị</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.comments.index') }}">Bình luận </a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">


                    @if (Session::has('danger'))
                        <div class="alert alert-danger"> <strong><i class="fa fa-check" aria-hidden="true"></i>
                                {{ Session::get('danger') }} </strong> </div>
                    @endif
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nội dung</th>
                                <th>Người đăng</th>
                                <th>Tên công thức</th>
                                <th>Ngày đăng</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comments as $cmt)
                                <tr>
                                    <td>{{ $cmt['id'] }}</td>
                                    <td>{{ $cmt['content'] }}</td>
                                    <td>{{ $cmt['name'] }}</td>
                                    <td>{{ $cmt['title'] }}</td>
                                    <td>{{ $cmt['created_at'] }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.comments.destroy', $cmt['id']) }}"
                                            class="btn btn-outline-danger btn-sm">
                                            <i class="fa fa-trash m-0" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
