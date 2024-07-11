@extends('layouts.guest')

@section('title')
    <title>Trang chủ</title>
@endsection
    <!-- active nav-link -->
    <style>
        a.nav-link[href="{{ route('index') }}"] {
            font-size: 18px;
            font-weight: 500;
            color: rgb(249, 233, 5);
        }
    </style>

@section('content')
    @include('user.slideshow.slide')
    @include('user.body_home.body')
@endsection