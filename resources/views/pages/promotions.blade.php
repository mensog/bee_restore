<x-header />

<main id="content" role="main" class="bg-white">
    <div class="promotions">
        <div class="delivery">
            <div class="container">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">Главная</a></li>
                    <li class="breadcrumb__item">/</li>
                    <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">Акции</a></li>
                </ul>
            </div>
        </div>
        <div class="container">
            <h2 class="promotions__heading">Акции и скидки</h2>
            <div class="promotions__shop">
                <img class="promotions__shop-logo" src="/svg/promotions/beeclub-logo.svg" alt="">
                <h3 class="promotions__shop-name">BeeClub</h3>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <a href="#" class="promotions__item">
                        <div class="promotions__item-heading">Первая доставка бесплатно</div>
                        <div class="promotions__item-descr">Действует при заказе от 1 000 ₽</div>
                        <img class="promotions__item-img" src="/img/promotions/cart.png" alt="">
                    </a>
                </div>
                <div class="col-md-6">
                    <a href="#" class="promotions__item">
                        <div class="promotions__item-heading">200 баллов за регистрацию</div>
                        <div class="promotions__item-descr">Создайте профиль на BeeClub и получите баллы на личный счет</div>
                        <img class="promotions__item-img" src="/img/promotions/cart.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    <x-improve/>

</main>

<x-app-banner/>

<x-footer />
