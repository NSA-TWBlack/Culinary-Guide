<link rel="stylesheet" href="/css/header.css">

<div style="height: 65px" class="bg-dark"></div>

<nav class="navbar navbar-expand-lg navbar-dark pos-fixed w-100 px-2 top-0 left-0"
    style="background-color: rgba(0, 0, 0, 0.816)" id="header">
    <a href="#" class="nav-brand p-0 rounded-circle overflow-hidden" id="nav-brand">
        <img src="https://lh3.googleusercontent.com/pw/AL9nZEVZPHD82fhymPGNV99HKngCe6z-N869iozLBZzt_fO7nCj_wDDn0hE-m0eAfFoM2kCt8WctzcnbjPtRFBX_foS9NARfnlYRiSbnwLBEtaz3D1mD7MjhaVtIKO4J1gu-kqeCXMSQ7KEctJHyAmFZl0en=s338-no?authuser=0"
            alt="" style="height: 50px">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span><i class="fad fa-bars"></i></span>
    </button>
    <div class="collapse navbar-collapse justify-content-around" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <!-- index -->
            <li class="nav-item px-3">
                <a href="{{ route('index') }}" class="nav-link" id="">Trang chủ</a>
            </li>
            <!-- recipe -->
            <li class="nav-item px-3">
                <a href="{{ route('recipes') }}" class="nav-link" id="">Công thức</a>
            </li>
            <!-- tip -->
            <li class="nav-item px-3">
                <a href="{{ route('tips') }}" class="nav-link" id="">Mẹo vặt</a>
            </li>
            <!-- news -->
            <li class="nav-item px-3">
                <a href="{{ route('news') }}" class="nav-link" id="">Tin tức</a>
            </li>
            <!-- favorite -->
            <?php $typeuser = Auth::user()->typeuser ?? 'Tm9uZQ=='; ?>
            @if ($typeuser != 1)
                <li class="nav-item px-3">
                    <a href="{{ route('favorites') }}" class="nav-link" id="">Yêu thích</a>
                </li>
            @endif
            <!-- login -->
            @if (Route::has('login'))
                @auth
                @else
                    <li class="hidden nav-item px-3">
                        <a href="{{ route('login') }}" class="nav-link" id="">Đăng nhập</a>
                    </li>
                @endauth
            @endif
            <!-- register -->
            @if (Route::has('register'))
                @auth
                @else
                    <li class="hidden nav-item px-3">
                        <a href="{{ route('register') }}" class="nav-link" id="">Đăng ký</a>
                    </li>
                @endauth
            @endif
            <!-- account -->
            <?php $name = Auth::user()->name ?? 'Tm9uZQ=='; ?>
            @if ($name != 'Tm9uZQ==')
                <li class="hidden nav-item px-3">
                    <div class="dropdown">
                        <div class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false" id="">
                            <i class="far fa-user-circle"></i>
                            {{ Auth::user()->name }}
                        </div>
                        <ul class="dropdown-menu" style="background-color: rgba(0, 0, 0, 0.816)">
                            <?php $typeuser = Auth::user()->typeuser ?? 'Tm9uZQ=='; ?>
                            @if ($typeuser == 1)
                                <li>
                                    <a class="dropdown-item text-warning" href="{{ route('dashboard') }}">Trang quản trị</a>
                                </li>
                            @else
                                @if ($typeuser != 1)
                                    <li>
                                        <a class="dropdown-item text-warning" href="{{ route('profile.edit') }}">Thông tin tài khoản</a>
                                    </li>
                                @endif
                            @endif
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <li><a class="dropdown-item text-warning" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();this.closest('form').submit();">Đăng xuất</a>
                                </li>
                            </form>
                        </ul>
                    </div>
                </li>
            @endif
        </ul>
    </div>
    </div>
</nav>
