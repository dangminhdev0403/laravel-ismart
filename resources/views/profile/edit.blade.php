@extends('layouts.home')
@section('title', 'Thông tin cá nhân')
@section('content')
<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

@endsection


@push('scripts')

@if (session('status'))
<script>

    Swal.fire({
        title: 'Thành công',
        text: " Cập nhật thành công ",
        icon: 'success',
        showConfirmButton: true,
        confirmButtonText: 'OK'
    }).then((result) => {
        if (result.isConfirmed) {
            // Xóa dữ liệu trong sessionStorage sau khi người dùng nhấn OK
            sessionStorage.clear();
            location.reload();

            // Nếu cần xóa cookie hoặc localStorage, bạn có thể thêm mã tương tự ở đây
            // document.cookie = 'cookieName=; expires=Thu, 01 Jan 1970 00:00:00 GMT; path=/';
            // localStorage.clear();
        }
    });
</script>

@endif
@endpush
