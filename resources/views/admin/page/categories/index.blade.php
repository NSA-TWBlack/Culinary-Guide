@extends('layouts.manager')
@section('title')
    <title>Trang danh mục</title>
@endsection
@section('content')
    <!-- active nav-link -->
    <style>
        li a.app-menu__item[href="{{ route('admin.categories.index') }}"] {
            background-color: #000;
        }
    </style>

    <div class="app-title">
        <div>
            <h1></i>Danh mục công thức</h1>
        </div>


        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang quản trị</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.categories.index') }}">Danh mục </a></li>
        </ul>
    </div>
    <div class="d-flex justify-content-center">
        <p class="d-grid gap-2 col-2 mx-auto">
            <a class="btn btn-outline-info " href="{{ route('admin.categories.create') }}"><i class="fa fa-plus"
                    aria-hidden="true"></i>Thêm</a>
        </p>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success"> <strong><i class="fa fa-check" aria-hidden="true"></i>
                                {{ Session::get('success') }} </strong> </div>
                    @endif

                    @if (Session::has('warning'))
                        <div class="alert alert-warning"> <strong><i class="fa fa-check" aria-hidden="true"></i>
                                {{ Session::get('warning') }} </strong> </div>
                    @endif

                    @if (Session::has('danger'))
                        <div class="alert alert-danger"> <strong><i class="fa fa-check" aria-hidden="true"></i>
                                {{ Session::get('danger') }} </strong> </div>
                    @endif

                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Tên danh mục</th>
                                <th>Ngày tạo</th>
                                <th>Ngày chỉnh sửa</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $cate)
                                <tr>
                                    <td>{{ $cate['id'] }}</td>
                                    <td>{{ $cate['title'] }}</td>
                                    <td>{{ $cate['created_at'] }}</td>
                                    <td>{{ $cate['updated_at'] }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.categories.edit', $cate['id']) }}"
                                            class="btn btn-outline-warning btn-sm">
                                            <i class="fa fa-pencil m-0" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.categories.destroy', $cate['id']) }}"
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