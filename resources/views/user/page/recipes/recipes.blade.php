@extends('layouts.guest')

@section('title')
    <title>Công thức nấu ăn</title>
@endsection

<!-- active nav-link -->
<style>
    a.nav-link[href="{{ route('recipes') }}"] {
        font-size: 18px;
        font-weight: 500;
        color: rgb(249, 233, 5);
    }
</style>

@section('content')
    <link rel="stylesheet" href="/css/body_recipe.css">

    <form action="{{ route('recipes.search') }}" method="post">
        @csrf
        <div class="container-fluid" style="background: #39404A">
            <div class="container pt-4 pb-4 text-center searchBox">
                <div class="title pb-3 fs-30">-- CÔNG THỨC NẤU ĂN --</div>
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

    @if (sizeof($recipes) == 0)
        <div class="container text-center py-5">
            <div class="notification fs-30 fw-bold">
                <i class="far fa-exclamation-triangle fs-30"></i>
                KHÔNG CÓ KẾT QUẢ
                <i class="far fa-exclamation-triangle fs-30"></i>
            </div>
        </div>
    @else
        <div class="container pt-5">
            <div class="card-content d-flex flex-wrap justify-content-center">

                @foreach ($recipes as $recipe)
                    <div class="card shadow rounded-1 overflow-hidden mx-4 mb-5 p-4 bg-light">
                        <a href="{{ route('recipes.detail', $recipe['id']) }}" class="m-0 p-0">
                            <div class="card-image rounded-2 overflow-hidden">
                                <img class="mw-100" src="/upload/{{ $recipe['image'] }}" alt="">
                            </div>
                            <div class="card-info text-dark bg-light">
                                <p class="mt-3 fs-18 fw-bold">{{ $recipe['title'] }}</p>
                                <p class="fs-14 border-bottom border-dark">{{ $recipe['description'] }}</p>
                                <div class="d-flex justify-content-between">
                                    <p>
                                        <i class="bi bi-calendar-fill"></i>
                                        {{ $recipe['created_at']->format('d/m/Y') }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="pagi justify-content-center">
                {{-- <li class="page-item previous-page disable"><a href="#" class="page-link">Prev</a></li>
            <li class="page-item current-page active"><a href="#" class="page-link">1</a></li>
            <li class="page-item dots"><a href="#" class="page-link">...</a></li>
            <li class="page-item current-page"><a href="#" class="page-link">5</a></li>
            <li class="page-item current-page"><a href="#" class="page-link">6</a></li>
            <li class="page-item dots"><a href="#" class="page-link">...</a></li>
            <li class="page-item current-page"><a href="#" class="page-link">10</a></li>
            <li class="page-item next-page"><a href="#" class="page-link">Next</a></li>  --}}
            </div>
        </div>
    @endif

    <script src="/js/recipe_body.js"></script>
@endsection
