<div class="section" id="selling-wp">
    <div class="section-head">
        <h3 class="section-title">Sản phẩm bán chạy</h3>
    </div>
    <div class="section-detail">
        <ul class="list-item">
            @foreach ($products as $product )
            @if($product->total_sold >50)
            <li class="clearfix">
                <a href="{{ route('detailProduct', $product->id) }}" title="" class="thumb fl-left">
                    <img src="{{ asset($product->images[0]->image_name) }}" alt="">
                </a>
                <div class="info fl-right">
                    <a href="{{ route('detailProduct', $product->id) }}" title="" class="product-name">{{ $product ->name }} </a>
                    <div class="price">
                          @if ($product->sale_price > 0)

                            <span class="old">{{ number_format($product->price, 0, '', '.') }}
                            đ</span>
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
            @endif
            @endforeach


        </ul>
    </div>
</div>
