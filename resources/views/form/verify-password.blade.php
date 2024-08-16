@extends('layouts.login')
@section('title', 'Xác nhận ')
@section('content')
<section class="ftco-section">
    <div class="container">
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Cám ơn bạn đã đăng ký! Trước khi bắt đầu, bạn có thể xác minh địa chỉ email của mình bằng cách nhấp vào liên kết chúng tôi vừa gửi cho bạn không? Nếu bạn không nhận được email, chúng tôi sẽ vui lòng gửi cho bạn một email khác.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm " style="color: #1dba1d">
            {{ __('Một liên kết xác minh mới đã được gửi đến địa chỉ email bạn cung cấp khi đăng ký.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between d-flex">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button class="form-control btn btn-primary submit">
                    {{ __('Gửi lại Email Xác minh') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class=" ml-3  btn form-control">
                {{ __('Đăng xuất') }}
            </button>
        </form>
    </div>
    </div>
</section>


@endsection
