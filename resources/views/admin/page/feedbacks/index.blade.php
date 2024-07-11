@extends('layouts.manager')
@section('title')
    <title>Phản Hồi </title>
@endsection
@section('content')
    <!-- active nav-link -->
    <style>
        li a.app-menu__item[href="{{ route('admin.feedback.index') }}"] {
            background-color: #000;
        }
    </style>

    <div class="app-title">
        <div>
            <h1></i>Phản hồi</h1>

        </div>

        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang quản trị</a></li>
            <li class="breadcrumb-item"><a href="{{ route('admin.feedback.index') }}">Phản hồi </a></li>
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
                                <th>Người gửi</th>
                                <th>Ngày gửi</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($feedback as $fe)
                                <tr>
                                    <td>{{ $fe['id'] }}</td>
                                    <td>{{ $fe['content'] }}</td>
                                    <td>{{ $fe['name_user'] }}</td>
                                    <td>{{ $fe['create'] }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.feedbacks.destroy', $fe['id']) }}"
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
