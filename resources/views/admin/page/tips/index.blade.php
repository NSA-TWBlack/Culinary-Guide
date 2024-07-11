@extends('layouts.manager')
@section('title')
    <title>Mẹo Vặt Ẩm Thực</title>
@endsection
@section('content')
    <!-- active nav-link -->
    <style>
        li a.app-menu__item[href="{{ route('admin.tips.index') }}"] {
            background-color: #000;
        }
    </style>

    <div class="app-title">
        <div>
            <h1></i>Mẹo vặt ẩm thực</h1>

        </div>

        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang quản trị</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.tips.index') }}">Mẹo vặt ẩm thực </a></li>
        </ul>
    </div>
    <div class="d-flex justify-content-center">
        <p class="d-grid gap-2 col-2 mx-auto">
            <a class="btn btn-outline-info " href="{{ route('admin.tips.create') }}"><i class="fa fa-plus"
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
                                <th>Tên mẹo vặt</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tips as $key)
                                <tr>
                                    <td>{{ $key['id'] }}</td>
                                    <td>{{ $key['title'] }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('tips.detail', $key['id']) }}"
                                            class="btn btn-outline-info btn-sm">
                                            <i class="fa fa-eye m-0" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.tips.edit', $key['id']) }}"
                                            class="btn btn-outline-warning btn-sm">
                                            <i class="fa fa-pencil m-0" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.tips.destroy', $key['id']) }}"
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
