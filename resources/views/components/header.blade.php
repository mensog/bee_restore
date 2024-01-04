<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>Beeclub</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link rel="stylesheet" type="text/css" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/app-sass.css') }}">
</head>

<body>


<header class="header">
    <div class="container">
        <div class="header-wrap">
            <div class="header-left">
                <a href="{{ route('main') }}" class="navbar-brand">
                    <img src="/img/logo.jpg" alt="BeeClub-logo">
                </a>
            </div>
            <div class="header-right">
                <div class="header-right__inner">
                    <nav class="navbar navbar-expand-lg">
                        <div class="collapse navbar-collapse">
                            <ul class="navbar-nav mr-auto">
                                {{-- <li class="nav-item">
                                   <a href="{{ route('promotions') }}" class="nav-link">
                                      Акции
                                   </a>
                                </li> --}}
                                <li class="nav-item">
                                    <a href="{{ route('about') }}" class="nav-link">
                                        О сервисе
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ Route::currentRouteName() === 'about' ? '#delivery-cost' : route('about') . '#delivery-cost'}}"
                                       class="nav-link">
                                        Доставка
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('couriers') }}" class="nav-link">
                                        Курьерам
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('suppliers') }}" class="nav-link">
                                        Поставщикам
                                    </a>
                                </li>
                            </ul>

                        </div>
                    </nav>
                    <div class="menu-right">
                        <p class="position mb-0"><img src="/svg/main/position.svg" alt=""><span
                                id="curPosition">Москва</span></p>
                        <a class="login" href="{{ route('lk') }}">
                            @auth В личный кабинет @else Войти в профиль @endauth
                        </a>
                    </div>
                </div>
                <div class="header-inner">
                    <div class="dropdown">
                        <a class="catalog-btn btn btn-primary dropdown-toggle"
                           type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            <img src="/svg/main/catalog.svg" alt="">Каталог
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @isset($commonCatalog)
                                <x-category-header :categories="$commonCatalog"/>
                            @endisset
                        </div>
                    </div>
                    <div class="dropdown dropdown-stores">
                        <a class="nav-link dropdown-toggle dropdown-btn" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div>
                                @if($currentStore->image_path ?? '')
                                    <span class="dropdown-stores__img">
                           <img src="{{ $currentStore->image_path ?? '' }}" alt="">
                        </span>
                                @endif
                                <span>{{ $currentStore->company_name ?? 'Выберите магазин' }}</span>
                            </div>
                            <img src="/svg/main/accordion-arrow.svg" alt="">
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <ul class="dropdown__mainmenu">
                                @foreach($headerAllStores as $store)
                                    <li class="dropdown__mainmenu-item menu-last">
                                        <a class="dropdown__mainmenu-link"
                                           href="{{ route('store_main', $store->slug) }}">
                                          <span class="dropdown-stores__img">
                                             <img src="{{ $store->image_path ?? '' }}" alt="">
                                          </span>
                                            {{ $store->company_name }}
                                        </a>
                                    </li>
                                @endforeach
                              <li class="dropdown__mainmenu-item menu-last">
                                 <a class="dropdown__mainmenu-link"
                                    href="{{ route('catalog') }}">
                                    <span class="dropdown-stores__img">
                                    </span>
                                    Все магазины
                                 </a>
                             </li>
                            </ul>
                        </div>
                    </div>
                    <form action="{{ route('search') }}" method="get" class="form-inline">
                        <div class="input-group">
                            <input placeholder="Я ищу.." type="text" name="q" class="form-control"
                                   value="{{ request()->input('q') ?? '' }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary btn-search"><img src="/svg/main/search.svg" alt="">
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="header-icons">
                        <a href="{{ route('lk_orders') }}" title="Мои заказы">
                            <img src="/svg/main/order.svg" alt="Мои заказы">
                        </a>
                        <a href="{{ route('favorites') }}">
                     <span id="favoritesCounter" class="{{ $headerFavoritesCount ? 'd-block' : 'd-none' }}">
                        {{ $headerFavoritesCount ?: '' }}
                     </span>
                            <img src="/svg/main/favorite.svg" alt="">
                        </a>

                        <div class="header-cart">
                     <span id="cartTotal" class="header-cart__price">
                        {{ number_format($headerCartTotal / 100, 0, ',', ' ') }} ₽
                     </span>
                            <a href="{{ route('cart') }}" href="Корзина">
                        <span id="cartCounter" class="{{ $headerCartCount ? 'd-block' : 'd-none' }}">
                           {{ $headerCartCount ?: '' }}
                        </span>
                                <img src="/svg/main/cart.svg" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
