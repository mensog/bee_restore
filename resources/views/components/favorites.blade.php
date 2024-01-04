@if(count($products) !== 0)
    <div id="favorites" class="card-cart">
        <div class="card-cart__body">
            @csrf
            @foreach ($products as $product)
                <div class="row">
                    <div class="col-lg-2">
                        <a href="{{ route('product', ['name' => $product->friendly_url_name, 'storeSlug' => $product->store->slug]) }}"><img
                                class="img-fluid card-cart__img max-width-100"
                                src="{{ $product->img_url }}" alt="{{ $product->description }}"></a>
                    </div>
                    <div class="col-lg-5">
                        <p class="card-cart__title">
                            <a href="{{ route('product', ['name' => $product->friendly_url_name, 'storeSlug' => $product->store->slug]) }}"
                               class="text-gray-90">{{ $product->name }}</a>
                        </p>
                        <p class="card-cart__sku">Артикул: {{ $product-> sku }}</p>
                    </div>
                    <div class="col-lg-5 card-cart__props">
                        <div class="row">
                            <div class="col-lg-6 text-right col-12 card-cart__price">
                                <p class="card-cart__price-total">{{ $product->price / 100 }} ₽</p>
                            </div>
                            <div class="col-lg-2 card-cart__qty">
                                @if(in_array($product->id, $inCartProductIds))
                                    <button data-id="{{ $product->id }}" data-quantity="1"
                                            class="btn-add-cart border-0 m-auto btn-primary transition-3d-hover">
                                        <i class="ec ec-shopping-bag"></i>
                                    </button>
                                @else
                                    <button data-id="{{ $product->id }}" data-quantity="1"
                                            class="btn-add-cart border-0 m-auto add-to-cart btn-primary transition-3d-hover">
                                        <i class="ec ec-add-to-cart"></i>
                                    </button>
                                @endif
                            </div>
                            <div class="col-lg-4 col-12 card-cart__delete d-flex">
                                <button data-id="{{ $product->id }}" data-action="remove" data-page="favorites"
                                        class="btn-add-to-favorites add-to-favorites p-0 btn btn-link text-gray-6 font-size-13">
                                    <i class="ec heart mr-1 font-size-15"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @endforeach
        </div>
    </div>
@else
    <x-empty-list page="favorites"/>
@endif
