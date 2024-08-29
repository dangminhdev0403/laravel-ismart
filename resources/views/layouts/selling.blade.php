<div class="section heading-left-lv2" id="selling-wp">
    <div class="section-head">
        <h3 class="section-title">Sản phẩm nổi bật</h3>
    </div>
    <div class="section-detail">
        <ul class="list-item">
            @php
                $t = 0
            @endphp
             @if ($products->isEmpty())
             <h5 class="alert  text-danger"> Không có sản phẩm</h5>
             @endif
            @foreach ($products as $product )
             @php
             $t++
             @endphp

            <li class="clearfix widget">
                <a href="{{ route('detailProduct', $product->id) }}" title="" class="thumb fl-left">
                    <img src="{{ asset($product->images[0]->image_name) }}" alt="">
                </a>
                <div class="info fl-right">
                    <a href="{{ route('detailProduct', $product->id) }}" title="" class="product-name">{{ $product ->name }} </a>
                    <div class="price">
                          @if ($product->sale_price > 0)

                            <span class="old">{{ number_format($product->price, 0, '', '.') }}
                            đ</span> <br>
                            <span
                            class="new">{{ number_format($product->sale_price, 0, '', '.') }}
                          đ</span>
                                @else
                            <span class="new"> {{ number_format($product->price, 0, '', '.') }}
                            đ</span>
                         @endif

                    </div>

                </div>
            </li>

            @if ( $t== $totalProduct+3 )
            @break


            @endif

            @endforeach


        </ul>
    </div>
</div>
@push('scripts')
<script>

   ScrollReveal().reveal('.list-item" .widget', { container: '.list-item"' });
</script>
@endpush
