<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Beeclub Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}">

    <link rel="stylesheet" type="text/css" href="{{ mix('css/admin/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('css/admin/app-sass.css') }}">
    <script src="https://api-maps.yandex.ru/2.1/?apikey=9bcdd5bb-55ca-4cd8-b742-d9995a78e126&lang=ru_RU"
            type="text/javascript"></script>
</head>
<header id="header">
    <div class="headerbar">
        <div class="headerbar-left">
            <ul class="header-nav header-nav-options">
                <li class="header-nav-brand">
                    <div class="brand-holder">
                        <a href="{{ route('admin_main') }}">
                            <span class="text-lg">BeeClub</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="headerbar-right">
            <ul class="header-nav header-nav-profile">
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle ink-reaction" data-toggle="dropdown">
                        <img src="../../assets/img/avatar1.jpg?1403934956" alt=""/>
                        <span class="profile-info">
									{{auth()->user()->name}} {{ auth()->user()->surname }}
									<small>{{ Str::ucfirst(__('user_role.' . auth()->user()->role)) }}</small>
								</span>
                    </a>
                    <ul class="dropdown-menu animation-dock">
                        <li><a href="#">Настройки</a></li>
                        <li class="divider"></li>
                        <li>
                            <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                               href="{{ route('logout') }}"><i class="fa fa-fw fa-power-off text-danger"></i>Выйти</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>
<body class="menubar-pin menubar-first">
<div id="base">
    <div id="menubar" class="menubar-inverse">
        <div class="menubar-fixed-panel" style="display:inline-table;">
            <div>
                <a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar"
                   href="javascript:void(0);">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="expanded">
                <a href="{{ route('admin_main') }}">
                    <span class="text-lg">BeeClub</span>
                </a>
            </div>
        </div>
        <div class="menubar-scroll-panel">

            <ul id="main-menu" class="gui-controls">

                <li>
                    <a href="{{ route('admin_main') }}"
                       class="{{ Route::currentRouteName() === 'admin_main' ? 'active' : '' }}">
                        <div class="gui-icon"><i class="md md-home"></i></div>
                        <span class="title">Главная</span>
                    </a>
                </li>

                <li class="gui-folder {{ (Route::currentRouteName() === 'admin_orders' ||  Route::currentRouteName() === 'admin_orders_log') ? 'active' : '' }}">
                    <a>
                        <div class="gui-icon"><i class="md md-storage"></i></div>
                        <span class="title">Заказы</span>
                    </a>
                    <ul>
                        <li class="{{ Route::currentRouteName() === 'admin_orders' ? 'active' : '' }}">
                            <a class="{{ Route::currentRouteName() === 'admin_orders' ? 'active' : '' }}"
                               href="{{ route('admin_orders') }}">
                                <span class="title">Список заказов</span>
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteName() === 'admin_orders_log' ? 'active' : '' }}">
                            <a class="{{ Route::currentRouteName() === 'admin_orders_log' ? 'active' : '' }}"
                               href="{{ route('admin_orders_log') }}">
                                <span class="title">Лог заказов</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="gui-folder {{ (Route::currentRouteName() === 'admin_users' ||  Route::currentRouteName() === 'admin_users_log') ? 'active' : '' }}">
                    <a>
                        <div class="gui-icon"><i class="md md-account-child"></i></div>
                        <span class="title">Пользователи</span>
                    </a>
                    <ul>
                        <li class="{{ Route::currentRouteName() === 'admin_users' ? 'active' : '' }}">
                            <a class="{{ Route::currentRouteName() === 'admin_users' ? 'active' : '' }}"
                               href="{{ route('admin_users') }}">
                                <span class="title">Список пользователей</span>
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteName() === 'admin_users_log' ? 'active' : '' }}">
                            <a class="{{ Route::currentRouteName() === 'admin_users_log' ? 'active' : '' }}"
                               href="{{ route('admin_users_log') }}">
                                <span class="title">Лог пользователей</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="gui-folder {{ (Route::currentRouteName() === 'admin_categories' ||  Route::currentRouteName() === 'admin_unsorted_categories') ? 'active' : '' }}">
                    <a>
                        <div class="gui-icon"><i class="md md-assignment"></i></div>
                        <span class="title">Управление</span>
                    </a>
                    <ul>
                        <li class="{{ Route::currentRouteName() === 'admin_categories' ? 'active' : '' }}">
                            <a class="{{ Route::currentRouteName() === 'admin_categories' ? 'active' : '' }}"
                               href="{{ route('admin_categories') }}">
                                <span class="title">Структура категорий</span>
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteName() === 'admin_unsorted_categories' ? 'active' : '' }}">
                            <a class="{{ Route::currentRouteName() === 'admin_unsorted_categories' ? 'active' : '' }}"
                               href="{{ route('admin_unsorted_categories') }}">
                                <span class="title">Неразобранные категории</span>
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteName() === 'admin_unsorted_categories' ? 'active' : '' }}">
                            <a class="{{ Route::currentRouteName() === 'admin_unsorted_categories' ? 'active' : '' }}"
                               href="{{ route('admin_deliveries') }}">
                                <span class="title">Способы доставки</span>
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteName() === 'admin_promocodes' ? 'active' : '' }}">
                            <a class="{{ Route::currentRouteName() === 'admin_promocodes' ? 'active' : '' }}"
                               href="{{ route('admin_promocodes') }}">
                                <span class="title">Промокоды</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="gui-folder {{ (Route::currentRouteName() === 'admin_products' ||  Route::currentRouteName() === 'admin_create_product_page' ||  Route::currentRouteName() === 'admin_products_log') ? 'active' : '' }}">
                    <a>
                        <div class="gui-icon"><i class="md md-collections"></i></div>
                        <span class="title">Товары</span>
                    </a>
                    <ul>
                        <li class="{{ Route::currentRouteName() === 'admin_products' ? 'active' : '' }}">
                            <a class="{{ Route::currentRouteName() === 'admin_products' ? 'active' : '' }}"
                               href="{{ route('admin_products') }}">
                                <span class="title">Список товаров</span>
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteName() === 'admin_create_product_page' ? 'active' : '' }}">
                            <a class="{{ Route::currentRouteName() === 'admin_create_product_page' ? 'active' : '' }}"
                               href="{{ route('admin_create_product') }}">
                                <span class="title">Добавить товар</span>
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteName() === 'admin_products_log' ? 'active' : '' }}">
                            <a class="{{ Route::currentRouteName() === 'admin_products_log' ? 'active' : '' }}"
                               href="{{ route('admin_products_log') }}">
                                <span class="title">Лог товаров</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="gui-folder {{ (Route::currentRouteName() === 'admin_partners' ||  Route::currentRouteName() === 'admin_partners_log') ? 'active' : '' }}">
                    <a>
                        <div class="gui-icon"><span class="md md-accessibility"></span></div>
                        <span class="title">Партнеры</span>
                    </a>
                    <ul>
                        <li class="{{ Route::currentRouteName() === 'admin_partners' ? 'active' : '' }}">
                            <a class="{{ Route::currentRouteName() === 'admin_partners' ? 'active' : '' }}"
                               href="{{ route('admin_partners') }}">
                                <span class="title">Список партнеров</span>
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteName() === 'admin_partners_log' ? 'active' : '' }}">
                            <a class="{{ Route::currentRouteName() === 'admin_partners_log' ? 'active' : '' }}"
                               href="{{ route('admin_partners_log') }}">
                                <span class="title">Лог партнеров</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="gui-folder {{ (Route::currentRouteName() === 'admin_couriers' ||  Route::currentRouteName() === 'admin_couriers_log') ? 'active' : '' }}">
                    <a>
                        <div class="gui-icon"><i class="md md-directions-car"></i></div>
                        <span class="title">Курьеры</span>
                    </a>
                    <ul>
                        <li class="{{ Route::currentRouteName() === 'admin_couriers' ? 'active' : '' }}">
                            <a class="{{ Route::currentRouteName() === 'admin_couriers' ? 'active' : '' }}"
                               href="{{ route('admin_couriers') }}">
                                <span class="title">Список курьеров</span>
                            </a>
                        </li>
                        <li class="{{ Route::currentRouteName() === 'admin_couriers_log' ? 'active' : '' }}">
                            <a class="{{ Route::currentRouteName() === 'admin_couriers_log' ? 'active' : '' }}"
                               href="{{ route('admin_couriers_log') }}">
                                <span class="title">Лог курьеров</span>
                            </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
