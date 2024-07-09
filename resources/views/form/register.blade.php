@extends('layouts.login')
@section('title', 'Trang đăng kí')
@section('content')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Dăng kí</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Đặng kí một tài khoản để nhận ưu đãi</h2>
                                <p>Đã có tài khoản?</p>
                                <a href="{{ route('login') }}" class="btn btn-white btn-outline-white">Đăng nhập</a>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Đăng kí</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-facebook"></span></a>
                                        <a href="#"
                                            class="social-icon d-flex align-items-center justify-content-center"><span
                                                class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>

                            <form method="POST" class="signin-form" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group mb-3">

                                    <!-- Name -->

                                    <x-input-label class="label" for="name" :value="__('Họ Và tên')" />
                                    <x-text-input id="name" class="block mt-1 w-full form-control"
                                        placeholder="Họ và tên" type="text" name="name" :value="old('name')" required
                                        autofocus autocomplete="name" />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />

                                </div>
                                <div class="form-group mb-3">
                                    <x-input-label class="label" for="email" :value="__('Email')" />
                                    <x-text-input id="email" class="block mt-1 w-full form-control" placeholder="Email"
                                        type="email" name="email" :value="old('email')" required autocomplete="username" />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                </div>
                                <div class="form-group mb-3">

                                    <x-input-label class="label" for="password" :value="__('Mật khẩu')" />

                                    <x-text-input id="password" class="block mt-1 w-full form-control" type="password"
                                        name="password" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />

                                </div>
                                <div class="form-group mb-3">





                                    <x-input-label class="label" for="password_confirmation" :value="__('Xác nhận mật khẩu')" />

                                    <x-text-input id="password_confirmation" class="block mt-1 w-full form-control" type="password"
                                        name="password_confirmation" required autocomplete="new-password" />

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3">Đăng kí</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
