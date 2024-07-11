@extends('layouts.guest')
@section('title')
    <title>Mẹo vặt</title>
@endsection

<!-- active nav-link -->
<style>
    a.nav-link[href="{{ route('tips') }}"] {
        font-size: 18px;
        font-weight: 500;
        color: rgb(249, 233, 5);
    }
</style>

@section('content')
    <link rel="stylesheet" href="/css/main-detail.css">
    <div class="container">
        <div class="row col-xl-10 col-lg-12 col-md-12 col-sm-12 mx-auto">
            <div class="main-content p-3 col-xl-9 col-lg-8 col-md-12 pt-4">
                <!-- image -->
                <div class="main-image rounded-3 overflow-hidden">
                    <img src="/upload/{{ $tip['image'] }}" alt="">
                </div>
                <div class="detail-content p-2">
                    <div class="d-flex justify-content-between">
                        <div class="title pt-2 fs-23 text-dark fw-bold">
                            {{ $tip['title'] }}
                        </div>
                        <div class="pt-3 text-dark fw-bold">
                            <i class="far fa-eye pe-1"></i>{{ $tip['view'] }}
                        </div>
                    </div>
                    <div class="created_at">
                        Ngày đăng: {{ $tip['created_at']->format('d/m/Y') }}
                    </div>
                    <div class="description pt-3">
                        <div class="text-format text-dark fs-16">{{ $tip['description'] }}</div>
                    </div>
                </div>
            </div>
            <div class="sub-content p-3 col-xl-3 col-lg-4 col-md-12">
                <div class="title fs-25 text-dark fw-bold pb-2">Mới nhất</div>
                @foreach ($tipsLatest as $item)
                    <a class="item" href="{{ route('tips.detail', $item['id']) }}">
                        <div class="sub-img rounded-2 overflow-hidden">
                            <img src="/upload/{{ $item['image'] }}" alt="">
                        </div>
                        <div class="title text-dark fs-16 pt-1 fw-bold">
                            {{ $item['title'] }}
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
@endsection
