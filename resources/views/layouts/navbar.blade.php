<div class="section" id="category-product-wp">
    <div class="section-head">
        <h3 class="section-title">Danh mục sản phẩm</h3>
    </div>
    <div class="secion-detail">
        <ul class="list-item">
            @foreach ($categories as $category )
            <li>
                <a class="headline"  href="{{ route('getProductByCategory',$category->slug) }}" title="">{{ $category-> name }}</a>

            </li>

            @endforeach



        </ul>
    </div>
</div>
