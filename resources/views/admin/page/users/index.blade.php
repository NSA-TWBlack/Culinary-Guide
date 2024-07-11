@extends('layouts.manager')
@section('title')
    <title>Nguời Dùng</title>
@endsection
@section('content')
    <!-- active nav-link -->
    <style>
        li a.app-menu__item[href="{{ route('admin.users.index') }}"] {
            background-color: #000;
        }
    </style>

    <div class="app-title">
        <div>
            <h1></i>Người dùng</h1>

        </div>

        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang quản trị</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Người dùng </a></li>
        </ul>
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
                                <th>Tên người dùng</th>
                                <th>Email</th>
                                <th>Ngày tạo tài khoản</th>
                                <th>Ngày chỉnh sửa</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $u)
                                <tr>
                                    <td>{{ $u['id'] }}</td>
                                    <td>{{ $u['name'] }}</td>
                                    <td>{{ $u['email'] }}</td>
                                    <td>{{ $u['created_at'] }}</td>
                                    <td>{{ $u['updated_at'] }}</td>
                                    <td class="text-center">

                                        <a href="{{ route('admin.users.destroy', $u['id']) }}"
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
