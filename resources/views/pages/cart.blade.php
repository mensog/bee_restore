<x-header/>

<main id="content" role="main" class="cart-page">
    <div class="breadcrumbs">
        <div class="container">
            <p class="breadcrumbs-block">
                <a class="breadcrumbs-block__link" href="{{ route('main') }}">Главная</a>
                /
                Корзина
            </p>
        </div>
    </div>
    <x-cart :favoriteList="$favoriteList" :groupedCartContent="$groupedCartContent" :stores="$stores" :quantity="$quantity" :itemsSubTotal="$itemsSubTotal" :cartTotal="$cartTotal" :favoritesListContent="$favoriteList" :totalWeight="$totalWeight"/>
    @if (count($groupedCartContent) != 0)
        <div class="liked">
            <div class="container">
                <div class="budge">
                    Товары, которыми Вы интересовались
                </div>
                <h2 class="liked__heading">Рекомендованные товары</h2>
                <div class="row">
                    @foreach($recommendedProducts as $recommendedProduct)
                        <div class="col-12 col-lg-3 col-md-6">
                            <a href="{{ route('product', ['name' => $recommendedProduct->friendly_url_name, 'storeSlug' => $recommendedProduct->store->slug]) }}" class="liked__item">
                                <div class="liked__item-body">
                                    <img class="liked__item-img" src="{{ $recommendedProduct->img_url ?:'/img/catalog/product/product-img.png' }}" alt="{{ $recommendedProduct->name }}">
                                    @if(in_array($recommendedProduct->id, $favoriteList, true))
                                        <button data-id="{{ $recommendedProduct->id }}" data-action="remove" data-page="catalog"
                                                class="btn-add-to-favorites product__item-favorite add-to-favorites p-0 text-gray-6 font-size-13">
                                            <i class="heart-on"></i>
                                        </button>
                                    @else
                                        <button data-id="{{ $recommendedProduct->id }}" data-action="add" data-page="catalog"
                                                class="btn-add-to-favorites product__item-favorite add-to-favorites p-0 text-gray-6 font-size-13">
                                            <i class="heart-off"></i>
                                        </button>
                                    @endif
                                    <div class="liked__item-descr">{{ $recommendedProduct->name }}</div>
                                    <div class="liked__item-article">{{ $recommendedProduct-> sku }}</div>
                                </div>
                                <div class="liked__item-footer">
                                    <div class="liked__item-price"><span>{{ $recommendedProduct->price / 100 }} ₽</span> / за 1 шт</div>
                                    <button data-page="cart" data-id="{{ $recommendedProduct->id }}" data-quantity="1" class="liked__item-btn btn btn-primary add-to-cart">В корзину</button>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</main>

<x-app-banner/>

<x-improve/>

<x-footer/>
