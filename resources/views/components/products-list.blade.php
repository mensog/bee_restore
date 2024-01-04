<div id="productsContainer">
    <div class="tabs">
        <div class="tabs__sort">
            <div
                class="tabs__sort-quantity">{{ $products->total() }} {{ Lang::choice('товар|товара|товаров', $products->total(), [], 'ru') }}</div>
            <div class="tabs__sort-filter">
                Сортировать: <span>по популярности</span>
                <img src="/svg/catalog/sort-icon.svg" alt="">
            </div>
        </div>
    </div>
    <div class="product">
        <div class="row">
            @if(count($products) == 0)
                <div class="col-lg-12 text-center mt-5">
                    <h4>Товары не найдены</h4>
                </div>
                @endif
            @foreach ($products as $key => $product)
                <div class="col-lg-4">
                    <div id="product_{{ $product->id }}" class="product__item">
                        <a href="{{ route('product', ['storeSlug' => $product->store->slug, 'name' => $product->friendly_url_name]) }}">
                            <div class="product__item-img">
                                <img src="{{ $product->img_url }}" alt="{{ $product->name }}">
                            </div>
                        </a>
                        @if(in_array($product->id, $favoritesListContent, true))
                            <button data-id="{{ $product->id }}" data-action="remove" data-page="catalog"
                                    class="btn-add-to-favorites product__item-favorite add-to-favorites p-0 text-gray-6 font-size-13">
                                <i class="heart-on"></i>
                            </button>
                        @else
                            <button data-id="{{ $product->id }}" data-action="add" data-page="catalog"
                                    class="btn-add-to-favorites product__item-favorite add-to-favorites p-0 text-gray-6 font-size-13">
                                <i class="heart-off"></i>
                            </button>
                        @endif
                        <a href="{{ route('product', ['storeSlug' => $product->store->slug, 'name' => $product->friendly_url_name]) }}">
                            <div class="product__item-descr">{{ $product->name }}</div>
                            <div class="product__item-article">{{ $product->sku }}</div>
                            <div class="product__item-price">
                                <span>{{ $product->price / 100 }} ₽</span>/ за 1 шт
                            </div>
                        </a>
                        @if (isset($cartContent[$product->id]))
                            <button data-id="{{ $product->id }}" data-quantity="1"
                                    class="product__item-btn btn btn-primary btn-inactive">
                                В корзине
                            </button>
                        @else
                            <button data-id="{{ $product->id }}" data-quantity="1"
                                    class="product__item-btn btn btn-primary add-to-cart">
                                В корзину
                            </button>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
        {{ $products->links() }}
    </div>
</div>
