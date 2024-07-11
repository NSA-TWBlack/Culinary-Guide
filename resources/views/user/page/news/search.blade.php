@extends('layouts.guest')

@section('title')
    <title>Tin tức</title>
@endsection

<!-- active nav-link -->
<style>
    a.nav-link[href="{{ route('news') }}"] {
        font-size: 18px;
        font-weight: 500;
        color: rgb(249, 233, 5);
    }
</style>

<link rel="stylesheet" href="/css/tips_body.css">
@section('content')
    <form action="{{ route('news.search') }}" method="post">
        @csrf
        <div class="container-fluid" style="background: #39404A">
            <div class="container pt-4 pb-4 text-center searchBox">
                <div class="title pb-3 fs-30">-- TIN TỨC ẨM THỰC --</div>
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

    @if (sizeof($newsAll) == 0)
        <div class="container text-center py-5">
            <div class="notification fs-30 fw-bold">
                <i class="far fa-exclamation-triangle fs-30"></i>
                KHÔNG CÓ KẾT QUẢ
                <i class="far fa-exclamation-triangle fs-30"></i>
            </div>
        </div>
    @else
        <div class="container news pt-4">
            <div class="row d-flex justify-content-center">
                <div class="item-list col-md-10">
                    @foreach ($newsAll as $news)
                        <div class="item border-0 row">
                            <div class="item-image col-4">
                                <a href="{{ route('news.detail', $news['id']) }}"><img src="/upload/{{ $news['image'] }}"
                                        alt=""></a>
                            </div>
                            <div class="item-info col-8">
                                <a href="{{ route('news.detail', $news['id']) }}" class="headline fs-22 text-dark fw-bold">
                                    {{ $news['title'] }}
                                </a>
                                <div class="text pt-2">
                                    {{ $news['description'] }}
                                </div>
                            </div>
                        </div>
                        <hr class="col-md-11 text-dark">
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
