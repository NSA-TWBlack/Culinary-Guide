{{-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input-label for="name" :value="__('Name')" />

                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />

                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />

                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Register') }}
                </x-primary-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}

@extends('layouts.guest')
@section('title')
    <title>Đăng ký</title>
@endsection

<!-- active nav-link -->
<style>
    a.nav-link[href="{{ route('register') }}"] {
        font-size: 18px;
        font-weight: 500;
        color: rgb(249, 233, 5);
    }
</style>

@section('content')
    <link rel="stylesheet" href="css/login.css">

    <form class="flogin" method="POST" action="{{ route('register') }}">
        @csrf
        <div class="container">
            <label class="title text-center fs-50 text-white">Đăng ký</label>
            <div class="row justify-content-center">
                <div class="d-md-flex col-md-12 shadow p-0 rounded-3 overflow-hidden" id="main-form">
                    <div class="col-md-6 left-form p-5">

                        <!-- Name -->
                        <div class="form-group pb-4">
                            <label for="name">Tên</label>
                            <input name="name" type="name" id="name" class="form-control rounded-pill"
                                :value="old('name')" autofocus required>
                            <x-input-error :messages="$errors->get('name')" class="mt-2 ps-0 text-danger" />
                        </div>

                        <!-- Email -->
                        <div class="form-group pb-4">
                            <label for="email">Email</label>
                            <input name="email" type="email" id="email" class="form-control rounded-pill"
                                :value="old('email')" autofocus required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2 ps-0 text-danger" />
                        </div>

                        <!-- Password -->
                        <div class="form-group pb-4">
                            <label for="password">Mật khẩu</label>
                            <input name="password" type="password" id="password" class="form-control rounded-pill"
                                required>
                            <x-input-error :messages="$errors->get('password')" class="mt-2 ps-0 text-danger" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group pb-4">
                            <label for="password_confirmation">Xác nhận mật khẩu</label>
                            <input name="password_confirmation" type="password" id="password_confirmation"
                                class="form-control rounded-pill" required>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 ps-0 text-danger" />
                        </div>
                        <div class="form-group pb-4">
                            <button class="rounded-pill w-100 p-2">Đăng ký</button>
                        </div>
                    </div>
                    <div class="col-md-6 right-form p-4 d-flex justify-content-center align-items-center">
                        <div class="form-group text-center text-white">
                            <div class="fs-35 text-center pb-4">Xin chào</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
