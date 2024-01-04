<x-header/>
<main id="content" role="main">
    <div class="breadcrumbs">
        <div class="container">
            <p class="breadcrumbs-block">
                <a class="breadcrumbs-block__link" href="{{ route('main') }}">Главная</a>
                /
                <a class="breadcrumbs-block__link" href="{{ route('lk') }}">Личный кабинет</a>
                /
                {{ $title ?? '' }}
            </p>
        </div>
    </div>
    <div class="lk-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @yield('content')
                </div>
                <div class="col-lg-4">
                    <div class="sticky-top">
                        <div class="lk-sidebar lk-sidebar_dn">
                            <div class="lk-sidebar__header">
                                <div class="lk-sidebar__img">
                                    <img src="/svg/lk/user-avatar.svg" alt="user-avatar">
                                </div>
                                <p class="lk-sidebar__user">
                                    {{ auth()->user()->full_name }}
                                </p>
                            </div>
                            <ul>
                                <li>
                                    <a class="{{ Route::currentRouteName() === 'lk' ? 'active' : '' }}"
                                       href="{{ route('lk') }}">
                                        <img src="/svg/lk/main.svg" alt="">
                                        Личный счет ({{ (auth()->user()->privateAccount->getTotalAmount()) / 100 }} ₽)
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::currentRouteName() === 'lk_profile' ? 'active' : '' }}"
                                       href="{{ route('lk_profile') }}">
                                        <img src="/svg/lk/profile.svg" alt="">
                                        Личные данные
                                    </a>
                                </li>
                                <li>
                                    <a class="{{ Route::currentRouteName() === 'lk_orders' ? 'active' : '' }}"
                                       href="{{ route('lk_orders') }}">
                                        <img src="/svg/lk/orders.svg" alt="">
                                        Заказы
                                    </a>
                                </li>
                                <li>
                                    <a class=""
                                       href="{{ route('lk_profile_notifications') }}">
                                        <img src="/svg/lk/notifications.svg" alt="">
                                        Уведомления ({{ count($notifications) }})
                                    </a>
                                </li>
                                <li>
                                    <a class=""
                                       href="#">
                                        <img src="/svg/lk/liked.svg" alt="">
                                        Любимые товары
                                    </a>
                                </li>
                                <li>
                                    <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                       href="{{ route('logout') }}">
                                        <img src="/svg/lk/logout.svg" alt="">
                                        Выйти
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="lk-help lk-help_dn">
                            <p class="lk-help__header"><img src="/svg/lk/help.svg" alt=""> <span>Помощь</span></p>
                            <p class="lk-help__link">
                                <a target="_blank"
                                   href="{{ route('about') . '#questions#accordionOrderThree' }}">
                                    Какие товары принимают к возврату?
                                </a>
                            </p>
                            <p class="lk-help__link">
                                <a target="_blank"
                                   href="{{ route('about') . '#questions#accordionOrderTwo' }}">
                                    Как вернуть товар?
                                </a>
                            </p>
                            <p class="lk-help__link">
                                <a target="_blank"
                                   href="{{ route('about') . '#questions#accordionOrderFour' }}">
                                    Что такое личный счет и баллы?
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-delivery/>

</main>
    <x-improve/>

<x-footer :passwordChanged="$passwordChanged ?? ''"/>
