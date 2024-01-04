<div id="passwordChanged" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Изменение пароля</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Пароль успешно изменен</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>


<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <p class="footer__logo">
                    <img src="/svg/main/BeeClub.svg" alt="beeclub">
                </p>
                <a class="footer__link">Пользовательское соглашение</a>
            </div>
            <div class="col-lg-2 col-6">
                <p class="footer__header">Покупателям</p>
                <a class="footer__link" href="{{ route('about') }}">О сервисе</a>
                <a class="footer__link"
                   href="{{ Route::currentRouteName() === 'about' ? '#delivery-cost' : route('about') . '#delivery-cost' }}">Доставка</a>
            </div>
            <div class="col-lg-2 col-6">
                <p class="footer__header">Курьерам</p>
                <a class="footer__link"
                   href="{{ Route::currentRouteName() === 'couriers' ? '#choice' : route('couriers') . '#choice' }}">Сколько
                    заработаю?</a>
                <a class="footer__link"
                   href="{{ Route::currentRouteName() === 'couriers' ? '#choice' : route('couriers') . '#income' }}">Стать
                    курьером</a>
            </div>
            <div class="col-lg-2 col-6">
                <p class="footer__header">Поставщикам</p>
                <a class="footer__link"
                   href="{{ Route::currentRouteName() === 'suppliers' ? '#terms' : route('suppliers') . '#terms' }}">Какие
                    условия?</a>
                <a class="footer__link"
                   href="{{ Route::currentRouteName() === 'suppliers' ? '#terms' : route('suppliers') . '#become' }}">Стать
                    поставщиком</a>
            </div>
            <div class="col-lg-2 col-6">
                <p class="footer__header">Контакты</p>
                <a class="footer__link" href="mailto:beeclub@example.com">beeclub@example.com</a>
                <a class="footer__link" href="tel+79005882222">+7 (900) 588 22 22</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-6 col-6">
                <p class="footer__muted">BEECLUB @ 2024</p>
            </div>
            {{-- <div class="col-lg-6 col-6">
                <p class="footer__muted text-right">Сделано с любовью в <a href="http://yurin.biz/">Студии Юрина</a></p>
            </div> --}}
        </div>
    </div>


</footer>


<nav class="mobile-bar">
    <ul class="mobile-bar__list">
        <li>
            <a href="{{ route('catalog') }}" class="mobile-bar__list-link">
                <svg width="18" height="14" viewBox="0 0 18 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M0 1C0 0.447715 0.462394 0 1.03279 0H16.9672C17.5376 0 18 0.447715 18 1C18 1.55228 17.5376 2 16.9672 2H1.03279C0.462394 2 0 1.55228 0 1ZM0 7C0 6.44772 0.462394 6 1.03279 6H16.9672C17.5376 6 18 6.44772 18 7C18 7.55229 17.5376 8 16.9672 8H1.03279C0.462394 8 0 7.55229 0 7ZM0 13C0 12.4477 0.462394 12 1.03279 12H16.9672C17.5376 12 18 12.4477 18 13C18 13.5523 17.5376 14 16.9672 14H1.03279C0.462394 14 0 13.5523 0 13Z"
                          fill="none"/>
                </svg>

                Каталог
            </a>
        </li>
        <li>
            <a href="#" class="mobile-bar__list-link">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M13 7.5C13 10.5376 10.5376 13 7.5 13C4.46243 13 2 10.5376 2 7.5C2 4.46243 4.46243 2 7.5 2C10.5376 2 13 4.46243 13 7.5ZM12.0491 13.4633C10.7873 14.4274 9.21054 15 7.5 15C3.35786 15 0 11.6421 0 7.5C0 3.35786 3.35786 0 7.5 0C11.6421 0 15 3.35786 15 7.5C15 9.21054 14.4274 10.7873 13.4633 12.0491L17.7071 16.2929C18.0976 16.6834 18.0976 17.3166 17.7071 17.7071C17.3166 18.0976 16.6834 18.0976 16.2929 17.7071L12.0491 13.4633Z"
                          fill="none"/>
                </svg>

                Поиск
            </a>
        </li>
        <li>
            <a href="{{ route('cart') }}" class="mobile-bar__list-link">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M4.94436 5C4.94436 3.34315 6.30607 2 7.98583 2H10.0135C11.6932 2 13.0549 3.34315 13.0549 5V7H4.94436V5ZM2.91672 7V5C2.91672 2.23858 5.18623 0 7.98583 0H10.0135C12.8131 0 15.0826 2.23858 15.0826 5V7H16.4786C17.4515 7 18.1742 7.88862 17.9632 8.8254L16.1608 16.8254C16.0062 17.5117 15.3891 18 14.6763 18H3.3237C2.61093 18 1.9938 17.5117 1.83918 16.8254L0.0368304 8.8254C-0.174218 7.88863 0.548463 7 1.52135 7H2.91672ZM3.73033 16L2.15327 9H15.8467L14.2697 16H3.73033Z"
                          fill="none"/>
                </svg>

                Корзина
            </a>
        </li>
        <li>
            <a href=" {{ route('login') }}" class="mobile-bar__list-link lk-entry">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M10.9995 4.78948C10.9995 3.74455 10.1025 2.89478 8.99953 2.89478C7.89653 2.89478 6.99953 3.74455 6.99953 4.78948C6.99953 5.83442 7.89653 6.68419 8.99953 6.68419C10.1025 6.68419 10.9995 5.83442 10.9995 4.78948ZM13 4.78942C13 6.87928 11.206 8.57883 9 8.57883C6.794 8.57883 5 6.87928 5 4.78942C5 2.69955 6.794 1 9 1C11.206 1 13 2.69955 13 4.78942ZM2 17C2 13.14 5.141 10 9 10C12.859 10 16 13.14 16 17C16 17.552 15.553 18 15 18C14.447 18 14 17.552 14 17C14 14.243 11.757 12 9 12C6.243 12 4 14.243 4 17C4 17.552 3.553 18 3 18C2.447 18 2 17.552 2 17Z"
                          fill="none"/>
                </svg>
                @auth Профиль @else Войти @endauth
            </a>
        </li>
        <li>
            <a href="#" class="mobile-bar__list-link" data-menu>
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M2 2H6V6H2V2ZM0 0H2H6H8V2V6V8H6H2H0V6V2V0ZM2 12H6V16H2V12ZM0 10H2H6H8V12V16V18H6H2H0V16V12V10ZM16 2H12V6H16V2ZM12 0H10V2V6V8H12H16H18V6V2V0H16H12ZM12 12H16V16H12V12ZM10 10H12H16H18V12V16V18H16H12H10V16V12V10Z"
                          fill="none"/>
                </svg>
                Меню
            </a>
        </li>
    </ul>
</nav>


            <div class="mobile-content">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="mobile-content__header">
                                <div class="mobile-content__header-title">Меню</div>
                                <div class="mobile-content__close" data-close>
                                    <img src="/svg/mobile-menu/menu-close.svg" alt="close menu">
                                </div>
                            </div>
                            <ul class="mobile-content__list">
                                <li>
                                    <a href="{{ route('main') }}" class="mobile-content__list-link">Главная</a>
                                </li>
                                <li>
                                    <a href="{{ route('promotions') }}" class="mobile-content__list-link">Акции</a>
                                </li>
                                <li>
                                    <a href="{{ route('about') }}" class="mobile-content__list-link">О сервисе</a>
                                </li>
                                <li>
                                    <a href="{{ Route::currentRouteName() === 'about' ? '#delivery-cost' : route('about') . '#delivery-cost' }}"
                                       class="mobile-content__list-link">Доставка</a>
                                </li>
                                <li>
                                    <a href="{{ route('couriers') }}" class="mobile-content__list-link">Курьерам</a>
                                </li>
                                <li>
                                    <a href="{{ route('suppliers') }}" class="mobile-content__list-link">Поставщикам</a>
                                </li>
                                <li>
                                    <a href="#" class="mobile-content__list-link">Доп. услуги</a>
                                </li>
                            </ul>
                            <div class="mobile-content__info">
                                <a href="tel:+79005882222">+7 (900) 588 22 22</a>
                                <a href="mailto:beeclub@example.com">beeclub@example.com</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>




@auth
    <div class="lk-modal">
        <div class="lk-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="sticky-top">
                            <div class="lk-sidebar">
                                <div class="lk-sidebar__header">
                                    <div class="lk-sidebar__img">
                                        <img src="/svg/lk/user-avatar.svg" alt="user-avatar">
                                    </div>
                                    <p class="lk-sidebar__user">
                                        {{ auth()->user()->full_name }}
                                    </p>
                                    <div class="lk-sidebar__close" data-close="">
                                        <img src="/svg/mobile-menu/menu-close.svg" alt="">
                                    </div>
                                </div>
                                <ul>
                                    <li>
                                        <a class="{{ Route::currentRouteName() === 'lk' ? 'active' : '' }}"
                                           href="{{ route('lk') }}">
                                            <img src="/svg/lk/main.svg" alt="">
                                            Личный счет ({{ (auth()->user()->privateAccount->getTotalAmount()) / 100 }}
                                            ₽)
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
                                            Уведомления
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
                            <div class="lk-help">
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
    </div>
@endauth

<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>

@if($passwordChanged)
    <script>
        jQuery($ => {
            $('#passwordChanged').modal('show')
        })
    </script>
@endif


<script>

    // Footer Accordion

    const footerTriggers = document.querySelectorAll('.footer__header');
    const footerLinks = document.querySelectorAll('.footer__link');

    footerTriggers.forEach((trigger) => {

        footerLinks.forEach((link) => {
            trigger.addEventListener('click', (e) => {
                e.preventDefault();
                trigger.classList.toggle('active');
            });
        });

    });

    // Mobile Menu

    const menuTrigger = document.querySelector('[data-menu]');
    const menuClose = document.querySelector('[data-close]');
    const menuContent = document.querySelector('.mobile-content');



    menuTrigger.addEventListener('click', (e) => {
        e.preventDefault();
        menuContent.classList.toggle('active');
        menuTrigger.classList.toggle('active');
        document.body.classList.toggle('lock');
        lkModal.classList.remove('active');
        lkTrigger.classList.remove('active');
    });

    menuClose.addEventListener('click', () => {
        menuContent.classList.remove('active');
        menuTrigger.classList.remove('active');
        document.body.classList.remove('lock');
    });




    // Lk-modal

    const lkModal = document.querySelector('.lk-modal');
    const lkTrigger = document.querySelector('.lk-entry');

    if (lkModal && lkTrigger) {
        const lkClose = lkModal.querySelector('.lk-sidebar__close');

        lkTrigger.addEventListener('click', (e) => {
            e.preventDefault();
            lkModal.classList.toggle('active');
            lkTrigger.classList.toggle('active');
            document.body.classList.toggle('lock');
            menuContent.classList.remove('active');
            menuTrigger.classList.remove('active');
        });

        lkClose.addEventListener('click', () => {
            lkModal.classList.remove('active');
            lkTrigger.classList.remove('active');
            document.body.classList.remove('lock');
        });
    }

</script>
</body>

</html>
