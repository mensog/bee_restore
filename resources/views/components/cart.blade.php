@if(count($groupedCartContent) !== 0)
    <div id="cart" class="cart">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart__wrap">
                        <h2 class="cart__heading">Корзина ({{ count($quantity) }})</h2>
                        @csrf
                        @foreach($groupedCartContent as $storeId => $items)
                            <h3 class="cart__subheading">{{ $stores[$storeId]->full_name }} ({{ count($items) }})</h3>
                            @foreach($items as $key => $item)
                                <div class="cart__inner">
                                    <div class="cart__product">
                                        <div class="cart__product-wrapper">
                                            <div class="cart__product-img">
                                                <a href="{{ route('product', ['name' => $item->friendly_url_name, 'storeSlug' => $item->store->slug]) }}">
                                                    <img src="{{  $item->img_url ?: '/img/cart/placeholder150.png' }}"
                                                         alt="{{ $item->name }}">
                                                </a>
                                            </div>
                                            <div class="cart__product-wrap">
                                                <div class="cart__product-descr">
                                                    <a href="{{ route('product', ['name' => $item->friendly_url_name, 'storeSlug' => $item->store->slug]) }}">
                                                        {{ $item->name }}
                                                    </a>
                                                </div>
                                                <div
                                                    class="cart__product-shop">{{ $item->weight ? $item->weight/1000 . ' кг |' : '' }}
                                                    из {{ $item->getStoreName() }}</div>
                                            </div>
                                        </div>
                                        <div class="cart__product-wrapper">
                                            <div class="cart__product-wrap">
                                                <div class="cart__product-box">
                                                    <div class="cart-minus" data-id="{{ $item->id }}"
                                                         data-quantity="{{ $quantity[$item->id] }}"
                                                         data-action="updateQuantity" data-page="cart" data-type="minus">
                                                        -
                                                    </div>
                                                    <input data-quantity="{{ $quantity[$item->id] }}"
                                                           min="0" oninput="validity.valid||(value='')"
                                                           data-id="{{ $item->id }}" data-action="updateQuantity"
                                                           data-page="cart" class="cart-qty cart__product-input"
                                                           type="number"
                                                           value="{{ $quantity[$item->id] }}">
                                                    <div class="cart-plus" data-id="{{ $item->id }}"
                                                         data-quantity="{{ $quantity[$item->id] }}"
                                                         data-action="updateQuantity" data-page="cart" data-type="plus">
                                                        +
                                                    </div>
                                                </div>
                                                <div class="cart__product-box">
                                                    @if(in_array($item->id, $favoriteList, true))
                                                        <button data-id="{{ $item->id }}" data-action="add"
                                                                class="btn-add-to-favorites add-to-favorites cart__product-link in-favorite"
                                                                style="max-width: 100%">
                                                            <i class="heart-on"></i>
                                                            <span>В избранном</span>
                                                        </button>
                                                    @else
                                                        <button data-id="{{ $item->id }}" data-action="add"
                                                                class="btn-add-to-favorites add-to-favorites cart__product-link"
                                                                style="max-width: 100%">
                                                            <i class="heart-off"></i>
                                                            <span>В избранное</span>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="cart__product-wrap">
                                                <div class="cart__product-price">
                                                    {{ $itemsSubTotal[$item->id] / 100 }} ₽
                                                    @if($quantity[$item->id] > 1)
                                                        <p>{{ $item->price / 100 }} ₽/ за шт</p>
                                                    @endif
                                                </div>
                                                <div class="cart__product-box">

                                                    <button type="button" data-id="{{ $item->id }}" data-quantity="0"
                                                            data-action="updateQuantity" data-page="cart"
                                                            class="change-cart cart__product-link">
                                                    <span class="cart__product-icon">
                                                        <svg id="delete" width="12" height="14" viewBox="0 0 12 14"
                                                             fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                                  d="M4.5 2.33333C4.5 1.90378 4.83579 1.55556 5.25 1.55556H6.75C7.16421 1.55556 7.5 1.90378 7.5 2.33333V3.11111H4.5V2.33333ZM3 3.11111V2.33333C3 1.04467 4.00736 0 5.25 0H6.75C7.99264 0 9 1.04467 9 2.33333V3.11111H10.5H11.25C11.6642 3.11111 12 3.45933 12 3.88889C12 4.31844 11.6642 4.66667 11.25 4.66667H10.5V13.2222C10.5 13.6518 10.1642 14 9.75 14H2.25C1.83579 14 1.5 13.6518 1.5 13.2222V4.66667H0.75C0.335786 4.66667 0 4.31844 0 3.88889C0 3.45933 0.335786 3.11111 0.75 3.11111H1.5H3ZM3 4.66667H9V12.4444H3V4.66667Z"
                                                                  fill="none"/>
                                                        </svg>
                                                    </span>
                                                        Удалить
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="cart-aside">
                        <div class="checkout">
                            <h4 class="checkout__heading">Ваша корзина ({{ count($quantity) }})</h4>
                            <div class="checkout__wrap">
                                <span class="checkout__products">Товары:</span>
                                <span class="checkout__products-price">{{ $cartTotal / 100 }} ₽</span>
                            </div>
                            <div class="checkout__wrap">
                                <div class="checkout__box">
                                    <span class="checkout__weight">Вес:</span>
                                    @if($totalWeight > \App\Models\Order::WEIGHT_MAX_LIMIT)
                                        <span class="checkout__weight-limit">Вес не больше {{ \App\Models\Order::WEIGHT_MAX_LIMIT / 1000 }} кг</span>
                                    @elseif($totalWeight < \App\Models\Order::WEIGHT_MIN_LIMIT)
                                        <span class="checkout__weight-limit">Вес не меньше {{ \App\Models\Order::WEIGHT_MIN_LIMIT / 1000 }} кг</span>
                                    @endif
                                </div>
                                @if($totalWeight > \App\Models\Order::WEIGHT_MAX_LIMIT || $totalWeight < \App\Models\Order::WEIGHT_MIN_LIMIT)
                                    <span class="checkout__weight-total">{{ $totalWeight / 1000}} кг</span>
                                @else
                                    <span class="checkout__weight-total text-body">{{ $totalWeight / 1000}} кг</span>
                                @endif
                            </div>
                            {{--<div class="checkout__wrap">--}}
                            {{--<span class="checkout__discount">Скидка:</span>--}}
                            {{--<span class="checkout__discount-price">− 413 ₽</span>--}}
                            {{--</div>--}}
                            <div class="checkout__wrap">
                                <span class="checkout__total">Общая сумма:</span>
                                <span class="checkout__total-price">{{ $cartTotal / 100 }} ₽</span>
                            </div>
                            @if($totalWeight > \App\Models\Order::WEIGHT_MAX_LIMIT || $totalWeight < \App\Models\Order::WEIGHT_MIN_LIMIT)
                                <a href="{{ route('checkout_page') }}" class="checkout__btn btn btn-primary disabled">
                                    @guest
                                        Войти для оформления
                                    @else

                                        Перейти к оформлению
                                    @endguest
                                </a>
                            @else
                                <a href="{{ route('checkout_page') }}" class="checkout__btn btn btn-primary">
                                    @guest
                                        Войти для оформления
                                    @else
                                        Перейти к оформлению
                                    @endguest
                                </a>
                            @endif
                        </div>
                        {{--<div class="promocode">--}}
                        {{--<h4 class="promocode__heading">Введите промокод</h4>--}}
                        {{--<input class="promocode__input" type="text" placeholder="Промокод на скидку">--}}
                        {{--<button class="promocode__btn btn btn-empty">Применить промокод</button>--}}
                        {{--</div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@else
    <x-empty-list page="cart"/>
@endif
