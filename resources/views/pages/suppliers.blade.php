<x-header/>

<main id="content" role="main" class="suppliers bg-white">
    <section class="main-screen">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">Главная</a></li>
                <li class="breadcrumb__item">/</li>
                <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">Поставщикам</a></li>
            </ul>
            <h1 class="main-screen__title">Продавайте товары и зарабатывайте вместе с нами</h1>
            <h2 class="main-screen__subtitle">Дополнительные продажи товара, большие объемы, партнерские условия</h2>
            <div class="main-screen__benefits">
                <div class="main-screen__benefits-item">
                    <div class="main-screen__benefits-title">Большой оборот</div>
                    <div class="main-screen__benefits-descr">У вас хороший ассортимент? Мы его реализуем</div>
                </div>
                <div class="main-screen__benefits-item">
                    <div class="main-screen__benefits-title">Узнаваемость бренда</div>
                    <div class="main-screen__benefits-descr">Вашу продукцию увидят и купят тысячи клиентов</div>
                </div>
                <div class="main-screen__benefits-item">
                    <div class="main-screen__benefits-title">Без конкурентов</div>
                    <div class="main-screen__benefits-descr">Ведем нишевой отбор поставщиков. Гарантируем сохранить ваши позиции без конкурентов</div>
                </div>
            </div>
            <a href="{{ Route::currentRouteName() === 'suppliers' ? '#terms' : route('suppliers') . '#become' }}"
               class="main-screen__btn btn btn-primary">Начать работу</a>
        </div>
    </section>



    <section id="become" class="become">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="become__wrapper become__wrapper_bg">
                        <h2 class="become__title">Хотите стать нашим Партнером?</h2>
                        <p class="become__text">Свяжитесь по номеру <a href="tel:+79005882222">+7 (900) 588 22 22</a> или оставьте заявку на сайте</p>
                        <button class="btn btn-primary become__btn">Стать поставщиком</button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="become__wrapper">
                        <h4 class="become__subtitle">Остались вопросы?</h4>
                        <p class="become__text become__text_gray">Оставьте контактные данные, мы перезвоним</p>
                        <form action="#">
                            <input class="become__input" type="text" placeholder="Имя">
                            <input class="become__input" type="text" placeholder="Телефон">
                            <button class="btn btn-primary become__btn">Перезвоните мне</button>
                            <div class="become__text become__text_small">Отправляя свои данные, вы соглашаетесь на
                                обработку персональных данных
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-improve/>
</main>

<x-footer/>
