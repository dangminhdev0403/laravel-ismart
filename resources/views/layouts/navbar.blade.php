<div class="section" id="category-product-wp">
    <div class="section-head">
        <h3 class="section-title">Danh mục sản phẩm</h3>
    </div>
    <div class="secion-detail">
        <ul class="list-item">
            @foreach ($products as $product )
            <li>
                <a href="{{ route('getProductByCategory',$product->category->slug) }}" title="">{{ $product->category-> name }}</a>

            </li>

            @endforeach
            <li>
                <a href="?page=category_product" title="">Điện thoại</a>
                <ul class="sub-menu">
                    <li>
                        <a href="?page=category_product" title="">Iphone</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title="">Samsung</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="?page=category_product" title="">Iphone X</a>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Iphone 8</a>
                            </li>
                            <li>
                                <a href="?page=category_product" title="">Iphone 8 Plus</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="?page=category_product" title="">Oppo</a>
                    </li>
                    <li>
                        <a href="?page=category_product" title="">Bphone</a>
                    </li>
                </ul>
            </li>


        </ul>
    </div>
</div>
