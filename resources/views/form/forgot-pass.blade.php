@extends('layouts.login')
@section('title', 'Quên mật khẩu')
@section('content')
    <section class="ftco-section">
        <div class="container " style="width: 472.8px; transform: translate(169.6px, 0px); margin:
0px 699px 0px 274px">
            <div class="row justify-content-center">
                <div class="col-md-6  mb-5">
                    <h2 class="heading-section text-center ">Quên mật khẩu</h2>
                </div>
            </div>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group mb-3">



                    <x-input-label class="label" for="email" :value="__('Nhập Email để lấy lại mật khẩu')" />
                    <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email"
                        :value="old('email')" placeholder="Email" autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />

                </div>


                <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary submit ">Gửi</button>
                </div>





            </form>
        </div>
    </section>
@endsection
@push('script')
<script>
   @if(session('status'))
   Swal.fire({
  icon: "success",
  title: "Thành công",
  text: "Hãy kiểm tra hộp thư của bạn!",

    });

   @endif

</script>
@endpush
