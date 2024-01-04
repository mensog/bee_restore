@extends('layouts.lk')

@section('content')

    <div class="row">
        <div class="col-6">
            <div class="check-email">
                <img class="check-email__img" src="/svg/check-email.svg" alt="">
                <h3 class="check-email__title">Проверьте почту</h3>
                <div class="check-email__text">Мы выслали ссылку для создания нового пароля на <a href="#">example@mail.ru</a></div>
                <button class="check-email__btn btn btn-primary">Вернуться на главную</button>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-6">
            <div class="check-email">
                <img class="check-email__img" src="/svg/check-big.svg" alt="">
                <h3 class="check-email__title">Пароль изменен!</h3>
                <div class="check-email__text">Войдите в свой профиль, чтобы продолжить покупки</a></div>
                <button class="check-email__btn btn btn-primary">Войти в профиль</button>
            </div>
        </div>
    </div>

@endsection
