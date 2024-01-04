<div id="productQty" class="product-in-cart">
    @if($inCartQuantity === 0)
        <button data-id="{{ $productId }}" data-quantity="1" data-page="product"
                class="btn add-to-cart btn-primary">
            В корзину
        </button>
    @else
        <button class="btn btn-primary btn-inactive">
            В корзине
        </button>
    @endif
</div>

