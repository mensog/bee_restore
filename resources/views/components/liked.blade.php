<div class="liked">

    <div class="container">
        <h2 class="liked__heading">Покупателям нравится</h2>
        <div class="row">
            @foreach($likedRandomProducts as $likedRandomProduct)
                <div class="col-12 col-lg-3 col-md-6">
                    <a href="{{ route('product', ['name' => $likedRandomProduct->friendly_url_name, 'storeSlug' => $likedRandomProduct->store->slug]) }}"
                       class="liked__item">
                        <div class="liked__item-body">
                            <img class="liked__item-img"
                                 src="{{ ($likedRandomProduct->img_url) ?:'/img/catalog/product/product-img.png'  }}"
                                 alt="{{ $likedRandomProduct->name }}">
                            @if(in_array($likedRandomProduct->id, $favoritesListContent, true))
                                <button data-id="{{ $likedRandomProduct->id }}" data-action="remove" data-page="catalog"
                                        class="btn-add-to-favorites liked__item-favorite add-to-favorites">
                                    <i class="ec heart font-size-15"></i>
                                </button>
                            @else
                                <button data-id="{{ $likedRandomProduct->id }}" data-action="add" data-page="catalog"
                                        class="btn-add-to-favorites liked__item-favorite add-to-favorites">
                                    <i class="ec ec-favorites font-size-15"></i>
                                </button>
                            @endif
                        </div>
                        <div class="liked__item-footer">
                            <div class="liked__item-descr">{{ $likedRandomProduct->name }}</div>
                            <div class="liked__item-article">{{ $likedRandomProduct->sku }}</div>
                            <div class="liked__item-price">
                                <span>{{ $likedRandomProduct->price / 100 }}₽</span> / за 1 шт
                            </div>
                            <button data-id="{{ $likedRandomProduct->id }}" data-quantity="1"
                                    class="liked__item-btn btn btn-primary add-to-cart">В корзину
                            </button>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
