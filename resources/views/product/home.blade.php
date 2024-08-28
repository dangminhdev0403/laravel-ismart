@extends('layouts.home')
@section('title', 'ISMART STORE')

@section('content')
    <div id="main-content-wp" class="home-page clearfix">
        <div class="wp-inner">
            <div class="main-content fl-right">
                <div class="section" id="slider-wp">
                    <div class="section-detail">
                        <div class="item">
                            <img src="{{ asset('product/public/images/slider-01.png') }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('product/public/images/slider-02.png') }}" alt="">
                        </div>
                        <div class="item">
                            <img src="{{ asset('product/public/images/slider-03.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="section" id="support-wp">
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <li>
                                <div class="thumb">
                                    <img src="{{ asset('product/public/images/icon-1.png') }}">
                                </div>
                                <h3 class="title">Miễn phí vận chuyển</h3>
                                <p class="desc">Tới tận tay khách hàng</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{ asset('product/public/images/icon-2.png') }}">
                                </div>
                                <h3 class="title">Tư vấn 24/7</h3>
                                <p class="desc">1900.9999</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{ asset('product/public/images/icon-3.png') }}">
                                </div>
                                <h3 class="title">Tiết kiệm hơn</h3>
                                <p class="desc">Với nhiều ưu đãi cực lớn</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{ asset('product/public/images/icon-4.png') }}">
                                </div>
                                <h3 class="title">Thanh toán nhanh</h3>
                                <p class="desc">Hỗ trợ nhiều hình thức</p>
                            </li>
                            <li>
                                <div class="thumb">
                                    <img src="{{ asset('product/public/images/icon-5.png') }}">
                                </div>
                                <h3 class="title">Đặt hàng online</h3>
                                <p class="desc">Thao tác đơn giản</p>
                            </li>
                        </ul>
                    </div>
                </div>

                @if($keyword==null || $keyword=="")
                <div class="section" id="feature-product-wp">



                    <div class="section-head">
                        <h3 class="section-title">Sản phẩm mới nhất</h3>
                    </div>
                    <div class="section-detail">

                        @if ($products->isEmpty())
                            <h3 class="text-danger  text-center">Không có sản phẩm nào trong danh mục này</h3>
                        @else
                            @php
                                $count1 = 0;
                            @endphp
                            <ul class="list-item">
                                @foreach ($products as $product)
                                    {{-- @if ($count1 >= 20)
                                    @break
                                @endif
                                @php
                                    $count1++;
                                @endphp --}}
                                <li style="  padding:   10px 10px 7px;">
                                    <a href="{{ route('detailProduct', $product->id) }}" title="" class="thumb">
                                        <img
                                            src="{{ asset($product->images[0]->image_name) }}"style="width: 133px ; height: 133px; object-fit: cover; padding:0px 0px 0px 23px;">
                                    </a>
                                    <a href="{{ route('detailProduct', $product->id) }}" title=""
                                        class="product-name">{{ $product->name }} </a>
                                    @if (strlen($product->name) < 24)
                                        <div style="height: 19px"></div>
                                    @endif
                                    <div class="price">
                                        @if ($product->sale_price > 0)
                                            <span
                                                class="new">{{ number_format($product->sale_price, 0, '', '.') }}</span>
                                            <span
                                                class="old">{{ number_format($product->price, 0, '', '.') }}</span>
                                        @else
                                            <span
                                                class="new">{{ number_format($product->price, 0, '', '.') }}</span>
                                        @endif
                                    </div>

                                </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif


            </div>

                @foreach ($categories as $category)
                    @unless ($category->products->Isempty())
                        <div class="section" id="list-product-wp">
                            <div class="section-head" style="display: flex  justify-content: space-between;">

                                <h3 class="section-title headline">{{ $category->name }}</h3>
                                <a href="{{ route('getProductByCategory', $category->slug) }}"
                                    style="float: right; color: rgb(205, 10, 114) ;" class="headline"> <u>xem thêm</u></a>


                            </div>
                            <div class="section-detail ">
                                <ul class="list-item clearfix  ">
                                    @php
                                        $t = 0;
                                    @endphp
                                    @foreach ($category->products as $product)
                                        @php
                                            $t++;
                                        @endphp
                                        <li style="  padding:   10px 10px 7px;" class="widget1">
                                            <a href="{{ route('detailProduct', $product->id) }}" title=""
                                                class="thumb">
                                                <img
                                                    src="{{ asset($product->images[0]->image_name) }}"style="width: 133px ; height: 133px; object-fit: cover; padding:0px 0px 0px 23px;">
                                            </a>
                                            <a href="{{ route('detailProduct', $product->id) }}" title=""
                                                class="product-name">{{ $product->name }} </a>
                                            @if (strlen($product->name) < 24)
                                                <div style="height: 19px"></div>
                                            @endif
                                            <div class="price">
                                                @if ($product->sale_price > 0)
                                                    <span
                                                        class="new">{{ number_format($product->sale_price, 0, '', '.') }}</span>
                                                    <span
                                                        class="old">{{ number_format($product->price, 0, '', '.') }}</span>
                                                @else
                                                    <span
                                                        class="new">{{ number_format($product->price, 0, '', '.') }}</span>
                                                @endif
                                            </div>

                                        </li>
                                        @if ($t == 8)
                                        @break
                                    @endif
                                @endforeach


                            </ul>
                        </div>
                    </div>
                @endunless
            @endforeach


                @else
                <div class="section" id="list-product-wp">

                    <div class="section-head">
                        <h3 class="section-title headline">Từ khoá cho {{ $keyword }}</h3>
                    </div>
                    <div class="section-detail ">
                        <ul class="list-item clearfix">
                            @if ($products->isEmpty())
                            <h4 class="alert  text-danger text-center"> Không có sản phẩm</h4>
                            @endif
                            @foreach ($products as $product)

                                <li style="  padding:   10px 10px 7px;" class="widget1" >
                                    <a href="{{ route('detailProduct', $product->id) }}" title=""
                                        class="thumb">
                                        <img
                                            src="{{ asset($product->images[0]->image_name) }}"style="width: 133px ; height: 133px; object-fit: cover; padding:0px 0px 0px 23px;">
                                    </a>
                                    <a href="{{ route('detailProduct', $product->id) }}" title=""
                                        class="product-name">{{ $product->name }} </a>
                                    @if (strlen($product->name) < 24)
                                        <div style="height: 19px"></div>
                                    @endif
                                    <div class="price">
                                        @if ($product->sale_price > 0)
                                            <span
                                                class="new">{{ number_format($product->sale_price, 0, '', '.') }}</span>
                                            <span
                                                class="old">{{ number_format($product->price, 0, '', '.') }}</span>
                                        @else
                                            <span
                                                class="new">{{ number_format($product->price, 0, '', '.') }}</span>
                                        @endif
                                    </div>

                                </li>



                         @endforeach


                    </ul>
                    </div>
                </div>

                @endif





    </div>
    <div class="sidebar fl-left">
        {{-- !Category --}}
        @include('layouts.navbar')

        @include('layouts.selling')
        <div class="section" id="banner-wp">
            <div class="section-detail">
                <a href="" title="" class="thumb">
                    <img src="public/images/banner.png" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
@push('scripts')
<script>
    @if (session('message'))
        <
        script >
            Swal.fire({
                title: "Thành công",
                text: "{{ session('message') }}",
                icon: "success",
                showConfirmButton: true,
                confirmButtonText: "OK",

            });
</script>
@endif
</script>
<script>
       const searchForm = document.querySelector("#search-form");
        const searchFormInput = searchForm.querySelector("input");
        const info = document.querySelector(".info");

        const searchButton = document.querySelector('.btn-search23')
        searchFormInput.addEventListener('focus', function() {
    // Tạo thẻ form mới
    const form = document.createElement('form');
    form.id = 'search-form';
    form.action = '#'; // Đặt action theo yêu cầu
    form.method = 'GET'; // Hoặc POST tùy vào yêu cầu

    // Di chuyển các phần tử con từ thẻ div vào thẻ form
    while (searchForm.firstChild) {
        form.appendChild(searchForm.firstChild);
    }

    // Thay thế thẻ div bằng thẻ form
    searchForm.parentNode.replaceChild(form, searchForm);

    // Tự động submit form khi nhấn vào nút search
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Ngăn form submit mặc định nếu muốn xử lý đặc biệt
        form.submit(); // Submit form
    });

    // Nếu có nút tìm kiếm, bạn có thể gán sự kiện submit vào nút
    searchButton.addEventListener('click', function() {
        form.submit();
    });
    });


        // Kiểm tra xem trình duyệt có hỗ trợ SpeechRecognition không
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

        if (SpeechRecognition) {
            console.log("Trình duyệt của bạn hỗ trợ nhận diện giọng nói");

            const recognition = new SpeechRecognition();
            recognition.continuous = true;
            recognition.interimResults = true; // Cho phép nhận diện kết quả tạm thời

            searchForm.insertAdjacentHTML("beforeend", '<a type="button"><i class="fas fa-microphone"></i></a>');
            searchFormInput.style.paddingRight = "50px";

            const micBtn = searchForm.querySelector("#search-form a:nth-child(3)");
            const micIcon = micBtn.firstElementChild;

            micBtn.addEventListener("click", () => {
                if (micIcon.classList.contains("fa-microphone")) {
                    recognition.start(); // Bắt đầu nhận diện giọng nói
                } else {
                    recognition.stop(); // Dừng nhận diện giọng nói
                }
            });

            recognition.addEventListener("start", () => {
                micIcon.classList.remove("fa-microphone");
                micIcon.classList.add("fa-microphone-slash");
                searchFormInput.focus();
                console.log("Nhận diện giọng nói đã kích hoạt, NÓI");
            });

            recognition.addEventListener("end", () => {
                micIcon.classList.remove("fa-microphone-slash");
                micIcon.classList.add("fa-microphone");
                searchFormInput.focus();
                console.log("Dịch vụ nhận diện giọng nói đã ngắt kết nối");
            });

            recognition.addEventListener("result", (event) => {
                let transcript = '';
                for (let i = event.resultIndex; i < event.results.length; i++) {
                    transcript += event.results[i][0].transcript;
                }
                searchFormInput.value = transcript; // Cập nhật giá trị trường nhập liệu với kết quả
            });


        } else {
            console.log("Trình duyệt của bạn không hỗ trợ nhận diện giọng nói");
            info.textContent = "Trình duyệt của bạn không hỗ trợ nhận diện giọng nói";
        }
</script>


@endpush
