<x-header :currentStore="$currentStore"/>

<main id="content" role="main" class="store">

    <div class="delivery">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb__item"><a class="breadcrumb__link" href="{{ route('main') }}">Главная</a></li>
                <li class="breadcrumb__item">/</li>
                <li class="breadcrumb__item">{{ $currentStore->full_name }}</li>

            </ul>
            <div class="delivery__box">
                <div class="delivery__box-img">
                    <img src="{{ $currentStore->image_path }}" alt="">
                </div>
                <h3 class="delivery__box-title"><span>Доставка из</span>{{ $currentStore->full_name }}</h3>
            </div>
            <div class="delivery__items">
                <div class="delivery__item">
                    <div class="delivery__item-title">Ближайшее время доставки</div>
                    <div class="delivery__item-descr">От 45 минут</div>
                </div>
                <div class="delivery__item">
                    <div class="delivery__item-title">Сумма заказа</div>
                    <div class="delivery__item-descr">от 1 000 ₽</div>
                </div>
                <div class="delivery__item">
                    <div class="delivery__item-title">Вес заказа</div>
                    <div class="delivery__item-descr">до 30 кг</div>
                </div>
            </div>
            <div class="delivery__pros">
                <div class="row">
                    <div class="col-3">
                        <div class="delivery__pros-item">
                            <img src="/img/store/notebook.png" alt="">
                            <div class="delivery__pros-title">Экономим время</div>
                            <div class="delivery__pros-descr">Выбирайте товары из разных магазинов - получайте все
                                вместе
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="delivery__pros-item">
                            <img src="/img/store/delivery.png" alt="">
                            <div class="delivery__pros-title">Доставка BeeClub</div>
                            <div class="delivery__pros-descr">599-999 ₽. Мы соберем и привезем общий заказ. Вы платите
                                за доставку 1 раз
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="delivery__pros-item">
                            <img src="/img/store/box.png" alt="">
                            <div class="delivery__pros-title">Бесплатно доставим</div>
                            <div class="delivery__pros-descr">При заказе от 10 000 ₽</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="delivery__pros-item">
                            <img src="/img/store/phone.png" alt="">
                            <div class="delivery__pros-title">Как мы работаем</div>
                            <div class="delivery__pros-descr">О работе нашего сервиса в трех простых шагах</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-categories :currentStore="$currentStore" :storeCatalog="$storeCatalog"/>
    <x-liked :likedRandomProducts="$likedRandomProducts" :favoritesListContent="$favoritesListContent"/>
    <x-delivery/>

    <x-improve/>

</main>

<x-app-banner/>

<x-footer/>
