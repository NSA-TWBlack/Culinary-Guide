{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ml-3">
                    {{ __('Log in') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
@extends('layouts.guest')

@section('title')
    <title>Đăng nhập</title>
@endsection

<!-- active nav-link -->
<style>
    a.nav-link[href="{{ route('login') }}"] {
        font-size: 18px;
        font-weight: 500;
        color: rgb(249, 233, 5);
    }
</style>

@section('content')
    <link rel="stylesheet" href="css/login.css">

    <form class="flogin" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="container">
            <label class="title text-center fs-50 text-white">Đăng nhập</label>
            <div class="row justify-content-center">
                <div class="d-md-flex col-md-12 shadow p-0 rounded-3 overflow-hidden" id="main-form">
                    <div class="col-md-6 left-form p-5">

                        <!-- Email -->
                        <div class="form-group pb-4">
                            <label for="">Email</label>
                            <input name="email" type="text" class="form-control rounded-pill" autofocus required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 ps-0 text-danger" />
                        </div>

                        <!-- Password -->
                        <div class="form-group pb-4">
                            <label for="">Mật khẩu</label>
                            <input name="password" type="password" class="form-control rounded-pill" required>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 ps-0 text-danger" />
                        </div>
                        <div class="form-group pb-4">
                            <button class="rounded-pill w-100 p-2">Đăng nhập</button>
                        </div>

                        <div class="form-group d-flex">

                            <!-- Remember me -->
                            <div class="w-50 d-flex">
                                <input name="remember" type="checkbox" id="remember_me">
                                <label class="ps-2" for="remember_me">
                                    Nhớ mật khẩu
                                </label>
                            </div>

                            <!-- Forgot the password -->
                            <div class="w-50 text-end">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="p-0">
                                        Quên mật khẩu
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Register -->
                    <div class="col-md-6 right-form p-4 d-flex justify-content-center align-items-center">
                        <div class="form-group text-center text-white">
                            <div class="fs-35 text-center pb-4">Xin chào</div>
                            <label class="pb-4" for="">Đăng ký ngay nếu bạn không có tài khoản</label>
                            <a href="{{ route('register') }}" class="rounded-pill p-2 px-4">Đăng ký</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
