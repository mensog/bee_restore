<x-header/>
<main id="content" role="main" class="checkout-page">
    <div class="breadcrumbs">
        <div class="container">
            <p class="breadcrumbs-block">
                <a class="breadcrumbs-block__link" href="{{ route('main') }}">Главная</a>
                /
                <a class="breadcrumbs-block__link" href="{{ route('cart') }}">Корзина</a>
                /
                Оформление заказа
            </p>
        </div>
    </div>
    <div class="container">
        <form id="checkout" class="form floating-label mb-0" method="POST" action="{{ route('place_order') }}">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <div class="cart">
                        <div class="cart__wrap">
                            <h2 class="cart__heading">Оформление заказа</h2>
                            <h3 class="cart__subheading">Город получения</h3>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-control-container">
                                        <input id="city" type="text"
                                               class="form-control @error('city') is-invalid @enderror"
                                               name="city" placeholder=" "
                                               value="{{ old('city') }}" required autocomplete="city">
                                        <label for="city">Введите город получения</label>
                                        @error('city')
                                        <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <section id="delivery-cost" class="delivery-cost d-block">
                                <h3 class="delivery-cost__heading">Способы получения</h3>
                                <div class="row">
                                    @foreach($deliveries as $key => $delivery)
                                        <div class="col-lg-6 col-md-6 col-6">
                                            <input id="delivery-{{ $key }}" type="radio"
                                                   {{ $key === 0 ? 'checked' : '' }}
                                                   name="delivery" value="{{ $delivery->id }}"
                                                   class="input-hidden delivery__input">
                                            <label class="delivery-cost__item delivery__label border"
                                                   for="delivery-{{ $key }}">
                                                @if($delivery->icon_path != null)
                                                    <img class="delivery-cost__item-icon"
                                                         src="{{ asset($delivery->icon_path) }}"
                                                         alt="{{$delivery->title}}">
                                                @endif
                                                <div
                                                    class="delivery-cost__item-heading py-2">{{ $delivery->title }}</div>
                                                <div class="delivery-cost__item-descr text-secondary">
                                                    {{ $delivery->description }}
                                                </div>
                                                <div class="delivery-cost__item-time">
                                                    c {{ $delivery->getTimeToDelivery() }}
                                                </div>
                                                @if(env('FREE_FIRST_DELIVERY_ENABLED', 0) && $hasNoOrders)
                                                    <div class="delivery-cost__item-price">
                                                        <del class="text-muted"> {{ $delivery->price / 100 }} ₽</del>
                                                        0 ₽
                                                    </div>
                                                    <div>Доставка первого заказа бесплатно</div>
                                                @else
                                                    <div class="delivery-cost__item-price">{{ $delivery->price / 100 }}
                                                        ₽
                                                    </div>
                                                @endif
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                            </section>
                            <h3 class="cart__subheading">Данные получателя</h3>
                            <p class="cart__after-title">Полные фамилия, имя и отчество потребуются при получении
                                заказа</p>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-control-container">
                                        <input id="name-n-surname" type="text"
                                               class="form-control @error('fullName') is-invalid @enderror"
                                               name="fullName" placeholder=" "
                                               value="{{ old('fullName') }}" required autocomplete="name">
                                        <label for="name-n-surname">ФИО</label>
                                        @error('fullName')
                                        <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-control-container">
                                        <input id="phone" type="phone"
                                               class="form-control @error('phone') is-invalid @enderror"
                                               name="phone" placeholder=" "
                                               value="{{ old('phone') }}" required autocomplete="phone">
                                        <label for="phone">Телефон</label>
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-control-container">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               name="email" placeholder=" "
                                               value="{{ old('email') }}" required autocomplete="email">
                                        <label for="email">E-mail</label>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-control-container">
                                        <input id="address" type="text"
                                               class="form-control @error('address') is-invalid @enderror"
                                               name="address" placeholder=" "
                                               value="{{ old('address') }}" required autocomplete="address">
                                        <label for="address">Улица</label>
                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-control-container">
                                        <input id="house" type="text"
                                               class="form-control"
                                               name="house" placeholder=" "
                                               value="{{ old('house') }}">
                                        <label for="house">Дом</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-control-container">
                                        <input id="apartment" type="text"
                                               class="form-control"
                                               name="apartment" placeholder=" "
                                               value="{{ old('apartment') }}">
                                        <label for="apartment">Квартира</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-control-container">
                                        <input id="floor" type="text"
                                               class="form-control"
                                               name="floor" placeholder=" "
                                               value="{{ old('floor') }}">
                                        <label for="floor">Этаж</label>
                                    </div>
                                </div>
                            </div>
                            <h3 class="cart__subheading">Дата и время доставки</h3>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-control-container">
                                        <input id="date" type="text"
                                               class="form-control"
                                               name="date" placeholder=" "
                                               value="{{ old('date') }}">
                                        <label for="date">Дата доставки</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-control-container">
                                        <input id="time" type="text"
                                               class="form-control"
                                               name="time" placeholder=" "
                                               value="{{ old('time') }}">
                                        <label for="time">Время доставки</label>
                                    </div>
                                </div>
                            </div>
                            <h3 class="cart__subheading">Дополнительно</h3>
                            <p class="cart__after-title">Укажите данные, чтобы мы смогли быстрее доставить заказ</p>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-control-container">
                                        <input id="elevator" type="text"
                                               class="form-control"
                                               name="elevator" placeholder=" "
                                               value="{{ old('elevator') }}">
                                        <label for="elevator">Наличие лифта</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-control-container">
                                        <input id="intercom" type="text"
                                               class="form-control"
                                               name="intercom" placeholder=" "
                                               value="{{ old('intercom') }}">
                                        <label for="intercom">Код домофона</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-control-container">
                                        <textarea id="comment" type="text"
                                                  class="form-control"
                                                  rows="3"
                                                  name="comment" placeholder=" ">{{ old('comment') }}</textarea>
                                        <label for="comment">Комментарий к доставке</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <x-cart-aside :quantity="$quantity" :cartTotal="$cartTotal" :delivery="$deliveries[0]"
                                  :totalWeight="$totalWeight" :hasNoOrders="$hasNoOrders"
                                  :privateAccount="$privateAccount" :bonusDiscount="$bonusDiscount"
                                  :promocode="$promocode" :promocodeDiscount="$promocodeDiscount"
                                  :wrongPromocode="$wrongPromocode"/>
                </div>

            </div>

        </form>
    </div>
</main>

<x-app-banner/>

<x-footer/>
<script>
    const storage = window.utils.storage

    window.addEventListener('DOMContentLoaded', () => {
        const city = storage('beeclub-city')
        const street = storage('beeclub-street')
        if (city) {
            document.getElementById('city').value = city
        }
        if (street) {
            document.getElementById('address').value = street
        }
    })
</script>
