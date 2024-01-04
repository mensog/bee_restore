@extends('layouts.lk')

@section('content')
    <div class="card-lk">
        <div class="card-lk__header">
            <h3 class="card-lk__title">Мой счет</h3>
        </div>
        <div class="card-lk__body">
            <div>
                <p>Сколько сейчас баллов</p>
                <p class="card-lk__score">{{ (auth()->user()->privateAccount->getTotalAmount()) / 100 }} ₽</p>
                <p class="card-lk__link" data-toggle="tooltip" data-placement="bottom"
                   title="Баллы начисляются в соответствии с текущими акциями.
                   Следите за информацией на главной странице в разделе «Акции и спецпредложения»">
                    Как заработать баллы?
                </p>
                <p class="card-lk__link" data-toggle="tooltip" data-placement="bottom"
                   title="Баллы — это виртуальные деньги, с помощью которых вы можете оплачивать заказы. 1 балл = 1 ₽">
                    Как потратить баллы?
                </p>
            </div>
            <div class="card-lk__img">
                <img src="/img/lk/card.jpg" alt="">
            </div>
        </div>
        <div class="card-lk__footer d-none">
            <h4>История операций</h4>
            @if(true)
                <div class="card-log">
                    <div>
                        <p class="card-log__title">Возврат клиенту за задержку по заказу <a href="#">№123123123</a></p>
                        <span class="card-log__date">27.07.2020</span>
                    </div>
                    <div>
                        <p class="card-log__value green">+ 300 ₽</p>
                        <p class="card-log__payment">Оплачено, картой онлайн</p>
                    </div>
                </div>
                <div class="card-log">
                    <div>
                        <p class="card-log__title">Оплата по заказу <a href="#">№123123123</a></p>
                        <span class="card-log__date">27.07.2020</span>
                    </div>
                    <div>
                        <p class="card-log__value">+ 300 ₽</p>
                        <p class="card-log__payment">Оплачено, картой онлайн</p>
                    </div>
                </div>
            @else
                <p class="card-log-empty">
                    У вас пока нет ни одной операции. <br>
                    Вернитесь в каталог, чтобы сделать свою первую покупку
                </p>
            @endif
        </div>
    </div>
@endsection
