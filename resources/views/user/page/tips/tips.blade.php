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
    <link rel="stylesheet" href="/css/tips_body.css">

    <form action="{{ route('tips.search') }}" method="post">
        @csrf
        <div class="container-fluid" style="background: #39404A">
            <div class="container pt-4 pb-4 text-center searchBox">
                <div class="title pb-3 fs-30">-- MẸO VẶT --</div>
                <div class="row form pt-2 pb-2">
                    <div class="col-10">
                        <input name="txtSearch" class="px-3 border-0" type="text" placeholder="tìm kiếm"
                            value="{{ $searchVal }}">
                    </div>
                    <button class="dis-none" id="btn-search"></button>
                    <div class="icon col-2 d-flex justify-content-center align-items-center"
                        onclick="document.getElementById('btn-search').click()">
                        <i class="fa fa-search fs-20"></i>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @if (sizeof($tips) == 0)
        <div class="container text-center py-5">
            <div class="notification fs-30 fw-bold">
                <i class="far fa-exclamation-triangle fs-30"></i>
                KHÔNG CÓ KẾT QUẢ
                <i class="far fa-exclamation-triangle fs-30"></i>
            </div>
        </div>
    @else
        <div class="container py-5">
            <div class="root d-flex flex-wrap justify-content-center">
                @foreach ($tips as $tip)
                    <a class="item p-3" href="{{ route('tips.detail', $tip['id']) }}">
                        <div class="item-image overflow-hidden">
                            <img src="/upload/{{ $tip['image'] }}" alt="">
                        </div>
                        <div class="item-content pt-2 pb-5">
                            <div class="title text-dark fw-bold fs-20">{{ $tip['title'] }}</div>
                            <div class="content text-dark pt-2">
                                {{ $tip['description'] }}
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    <script src="/js/recipe_body.js"></script>
@endsection
