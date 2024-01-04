<x-header/>

<main id="content" role="main" class="couriers">

    <section class="main-screen">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">Главная</a></li>
                <li class="breadcrumb__item">/</li>
                <li class="breadcrumb__item"><a class="breadcrumb__link" href="#">Курьерам</a></li>
            </ul>
            <h1 class="main-screen__title">Работайте и зарабатывайте вместе с нами</h1>
            <h2 class="main-screen__subtitle">Мы доставляем товары из строительных магазинов по Москве и ближайшему Подмосковью</h2>
            <div class="main-screen__benefits">
                <div class="main-screen__benefits-item">
                    <div class="main-screen__benefits-title">150-300 ₽</div>
                    <div class="main-screen__benefits-descr">за доставленный заказ</div>
                    <span class="main-screen__benefits-add">бензин оплачиваем отдельно</span>
                </div>
                <div class="main-screen__benefits-item">
                    <div class="main-screen__benefits-title">8-14 <span>заказов</span></div>
                    <div class="main-screen__benefits-descr">в среднем доставляет курьер BeeClub в день</div>
                </div>
            </div>
            <a href="#income" class="main-screen__btn btn btn-primary">Начать работу</a>
        </div>
    </section>

    <section class="expectations">
        <div class="container">
            <h2 class="expectations__title">Что BeeClub ожидает от Вас?</h2>
            <div class="row">
                <div class="col-4">
                    <div class="expectations__item expectations__item_gray">
                        <div class="expectations__item-title">Собственный автомобиль</div>
                        <div class="expectations__item-text">
                            <span>Чистый автомобиль с вместительным грузовым отсеком</span>
                        </div>
                        <img src="/img/couriers/cars.png" alt="cars" class="expectations__item-img">
                    </div>
                </div>
                <div class="col-4">
                    <div class="expectations__item expectations__item_dark-gray">
                        <div class="expectations__item-title expectations__item-title_white">Хорошую <br> физическую
                            форму
                        </div>
                        <div class="expectations__item-text expectations__item-text_white">
                            <span>Средний вес заказа - 12 кг</span>
                            <span>Необходимо самостоятельно разгрузить и доставить заказ до клиента</span>
                        </div>
                        <img src="/svg/couriers/dumbbell.svg" alt="dumbbell" class="expectations__item-img">
                    </div>
                </div>
                <div class="col-4">
                    <div class="expectations__item expectations__item_yellow">
                        <div class="expectations__item-title">Аккуратность и ответственность</div>
                        <div class="expectations__item-text">
                            <span>Опрятный внешний вид</span>
                            <span>Доставляем аккуратно, как для себя</span>
                        </div>
                        <img src="/svg/couriers/smile.svg" alt="smile" class="expectations__item-img">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="terms" class="terms">
        <div class="container">
            <h2 class="terms__title">Условия и бонусы</h2>
            <div class="row">
                <div class="col-lg-4">
                    <div class="terms__item">
                        <div class="terms__item-img">
                            <img src="/svg/couriers/ruble.svg" alt="ruble">
                        </div>
                        <div>
                            <div class="terms__item-title">Достойная заработная плата</div>
                            <div class="terms__item-text">
                              Официально, 2 раза в месяц
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="terms__item">
                        <div class="terms__item-img">
                            <img src="/svg/couriers/user.svg" alt="user">
                        </div>
                        <div>
                            <div class="terms__item-title">Официальное трудоустройство</div>
                            <div class="terms__item-text">
                              Согласно ТК РФ
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="terms__item">
                        <div class="terms__item-img">
                            <img src="/svg/couriers/height.svg" alt="height">
                        </div>
                        <div>
                            <div class="terms__item-title">Возможности карьерного роста</div>
                            <div class="terms__item-text">
                              При работе на постоянной основе,
                              у нас есть возможности для вашего роста
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="income" class="income">
        <div class="container">
            <div class="row">
                <div class="col-8">
                    <div id="choice" class="choice">
                        <h2 class="choice__title">Сколько я буду зарабатывать?</h2>
                        <h3 class="choice__subtitle">Вид транспорта </h3>
                        <div class="choice__inner">
                            <div class="choice__item">
                                <div class="choice__item-title">Легковая машина</div>
                                <input type="text" class="choice__input" placeholder="Марка авто, модель">
                            </div>
                            <div class="choice__item">
                                <div class="choice__item-title">Грузовая машина</div>
                                <input type="text" class="choice__input" placeholder="Марка авто, модель">
                            </div>
                        </div>
                        <h3 class="choice__subtitle">Условия работы</h3>
                        <div class="choice__inner">
                            <input type="number" id="orderPerDay" class="choice__input choice__input_mr"
                                   placeholder="Доставленных заказов в день">
                            <input type="number" id="daysInWeek" class="choice__input"
                                   placeholder="Рабочих дней в неделю" max="7" min="1">
                        </div>
                        <div class="choice__inner">
                            <div class="choice__box">
                                <h3 class="choice__subtitle">Готов работать под брендом BeeClub</h3>
                                <div class="choice__text">Фирменные оклейка машины и униформа</div>
                            </div>
                            <div class="choice__box">
                                <input id="choice-checkbox" type="checkbox" class="choice__box-radio beeclub-switcher"
                                       placeholder="Рабочих дней в неделю">
                                <label for="choice-checkbox" class="choice__box-label">Нет</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="request">
                        <div class="request__header">
                            <h2 class="request__header-title">
                                <span>Я заработаю за месяц*</span>
                                ~<span data-income="35 023" class="incomePrice" id="incomePrice">35 023</span> ₽
                            </h2>
                            <div id="incomeText" class="request__header-descr">
                                *За расчет берется средний месяц, <br> в котором 30.5 дней
                            </div>
                        </div>
                        <form action="#" class="request__form">
                            <h3 class="request__form-title">Заявка на вакансию</h3>
                            <div class="request__form-text">
                                Оставьте контактные данные и мы вышлем информацию о вакансии
                                <br> курьера с зарплатой <span id="incomeData">35 023 ₽</span>
                            </div>
                            <input class="request__form-input" type="text" placeholder="Имя">
                            <input class="request__form-input" type="text" placeholder="Телефон">
                            <button class="request__form-btn btn btn-primary" type="submit">Получить вакансию</button>
                            <div class="request__form-descr">
                                Отправляя свои данные, вы соглашаетесь на обработку персональных данных
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
