<div class="cart-aside">
    <div class="checkout">
        <h4 class="checkout__heading">Ваша корзина ({{ count($quantity) }})</h4>
        <div class="checkout__wrap">
            <span class="checkout__products">Товары:</span>
            <span class="checkout__products-price">{{ $cartTotal / 100 }} ₽</span>
        </div>
        <div class="checkout__wrap">
            <span class="checkout__products">Доставка:</span>
            @if(env('FREE_FIRST_DELIVERY_ENABLED', 0) && $hasNoOrders)
                <span class="checkout__products-price"><del class="text-muted">{{ $delivery->price / 100 }} ₽</del> 0 ₽</span>
            @else
            <span class="checkout__products-price">{{ $delivery->price / 100 }} ₽</span>
            @endif
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
        @if($bonusDiscount > 0)
        <div class="checkout__wrap">
            <span class="checkout__discount">Скидка:</span>
            <span class="checkout__discount-price">{{ ($bonusDiscount + $promocodeDiscount) / 100 }} ₽</span>
        </div>
        @endif
        <div class="checkout__wrap">
            <span class="checkout__total">Общая сумма:</span>
            @if(env('FREE_FIRST_DELIVERY_ENABLED', 0) && $hasNoOrders)
            <span class="checkout__total-price">{{ $cartTotal / 100 - ($bonusDiscount + $promocodeDiscount) / 100}} ₽</span>
            @else
            <span class="checkout__total-price">{{ $cartTotal / 100 + $delivery->price / 100 - ($bonusDiscount + $promocodeDiscount) / 100 }} ₽</span>
            @endif
        </div>
        <button type="submit" class="checkout__btn btn btn-primary">
            Оплатить онлайн
        </button>
    </div>
    <div class="promocode mb-4">
        @if($promocode)
            <h4 class="promocode__heading">Промокод</h4>
            <p>Вы применили промокод {{ $promocode->name }} на скидку {{ $promocode->amount_type == \App\Models\PromocodeType::PERCENTAGE ? $promocode->amount : $promocode->amount / 100 }} {{ __('promocode_type_short.' . $promocode->amount_type) }}</p>
            <button class="promocode__btn btn btn-empty remove-promocode">Отменить промокод</button>
        @else
            <h4 class="promocode__heading">Введите промокод</h4>
            @if(!$promocode && $wrongPromocode !== false)
                <p>Такого промокода нет</p>
            @endif
            <input class="promocode__input" type="text" name="promocode"
                   @if(!$promocode && $wrongPromocode !== false)
                   value="{{ $wrongPromocode }}"
                   @endif
                   placeholder="Промокод на скидку">
            <button class="promocode__btn btn btn-empty apply-promocode">Применить промокод</button>
        @endif
    </div>

    <div class="promocode">
        <h4 class="promocode__heading">Бонусный счет</h4>
        @if($bonusDiscount > 0)
            <p>Вы применили <b>{{ $bonusDiscount / 100 }}</b> {{ Lang::choice('бонус|бонуса|бонусов', $bonusDiscount / 100, [], 'ru') }}</p>
            <button class="promocode__btn btn btn-empty remove-bonus">Отменить применение бонусов</button>
        @else
            <p>Вам доступно <b>{{ $privateAccount->getTotalAmount() / 100 }}</b> {{ Lang::choice('бонус|бонуса|бонусов', $privateAccount->getTotalAmount(), [], 'ru') }}</p>
            <input class="promocode__input" type="text" name="bonusesToAdd" placeholder="Сколько бонусов применить">
            <button class="promocode__btn btn btn-empty add-bonus">Применить бонусы</button>
        @endif
    </div>
</div>
