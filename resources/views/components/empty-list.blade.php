@if($page === 'cart')
    <div class="container">
        <div class="empty">
            <div class="empty__inner">
                <img class="empty__img" src="/svg/components/empty-list/basket.svg" alt="basket">
                <h2 class="empty__heading">Корзина пока пуста</h2>
                <div class="empty__description">Вернитесь в каталог, чтобы продолжить покупки</div>
                <a class="empty__btn btn btn-primary" href="{{ route('main') }}">Перейти к покупкам</a>
            </div>
        </div>
    </div>
@endif

@if($page === 'favorites')
    {{--    <div class="container">--}}
    <div class="empty">
        <div class="empty__inner">
            <img class="empty__img" src="/svg/components/empty-list/heart.svg" alt="heart">
            <h2 class="empty__heading">В избранном пусто</h2>
            <div class="empty__description">Добавляйте товары в избранное, чтобы не потерять</div>
            <a class="empty__btn btn btn-primary" href="{{ route('main') }}">Перейти к покупкам</a>
        </div>
    </div>
    {{--    </div>--}}
@endif

@if($page === 'orders')
    <div class="container">
        <div class="empty">
            <div class="empty__inner">
                <img class="empty__img" src="/svg/components/empty-list/order.svg" alt="order">
                <h2 class="empty__heading">Заказов пока нет</h2>
                <div class="empty__description">Вернитесь в каталог, чтобы сделать первый заказ</div>
                <a class="empty__btn btn btn-primary" href="{{ route('main') }}">Перейти к покупкам</a>
            </div>
        </div>
    </div>
@endif

@if($page === 'notifications')
    <div class="container">
        <div class="empty">
            <div class="empty__inner">
                <img class="empty__img" src="/svg/components/empty-list/notification.svg" alt="notification">
                <h2 class="empty__heading">Уведомлений нет</h2>
                <div class="empty__description">У вас пока нет ни одного уведомления.</div>
            </div>
        </div>
    </div>
@endif
