<x-header/>

<main id="content" role="main">
    <div class="main-map">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pr-0">
                    <h2 class="main-map__header">
                        Сервис по доставке строительных материалов
                    </h2>
                    <div class="main-map__descr">Выберите магазин, закажите нужные стройматериалы и <br>
                        мы доставим их уже сегодня
                    </div>

                </div>
                <div class="col-lg-6 main-map-points">
                    <svg id="leroy-merlin" class="main-map-points__item active" width="412" height="430"
                         viewBox="0 0 412 430"
                         fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="179" cy="42" r="5" fill="#00A454"/>
                        <circle cx="56" cy="111" r="5" fill="#00A454"/>
                        <circle cx="91" cy="94" r="5" fill="#00A454"/>
                        <circle cx="136" cy="17" r="5" fill="#00A454"/>
                        <circle cx="73" cy="28" r="5" fill="#00A454"/>
                        <circle cx="275" cy="214" r="5" fill="#00A454"/>
                        <circle cx="280.229" cy="175.778" r="5" fill="#00A454"/>
                        <circle cx="200" cy="159" r="5" fill="#00A454"/>
                        <circle cx="207.622" cy="171.817" r="5" fill="#00A454"/>
                        <circle cx="156" cy="300" r="5" fill="#00A454"/>
                        <circle cx="40" cy="268" r="5" fill="#00A454"/>
                        <circle cx="17" cy="103" r="5" fill="#00A454"/>
                        <circle cx="163.397" cy="203.501" r="5" fill="#00A454"/>
                        <circle cx="175" cy="133" r="5" fill="#00A454"/>
                    </svg>
                    <svg id="petrovich" class="main-map-points__item" width="474" height="446" viewBox="0 0 474 446"
                         fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <circle cx="149" cy="5" r="5" fill="#E3E3E3"/>
                        <circle cx="5" cy="91" r="5" fill="#E3E3E3"/>
                        <circle cx="308.827" cy="79.9536" r="5" fill="#E3E3E3"/>
                        <circle cx="297.607" cy="190.844" r="5" fill="#E3E3E3"/>
                        <circle cx="178.796" cy="286.554" r="5" fill="#E3E3E3"/>
                        <circle cx="180.115" cy="212.626" r="5" fill="#E3E3E3"/>
                    </svg>
                    <svg id="obi" class="main-map-points__item" width="418" height="390" viewBox="0 0 418 390"
                         fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <circle cx="112.03" cy="127.957" r="5" fill="#E3E3E3"/>
                        <circle cx="120.611" cy="87.6934" r="5" fill="#E3E3E3"/>
                        <circle cx="71" cy="187" r="5" fill="#E3E3E3"/>
                        <circle cx="109.391" cy="252.708" r="5" fill="#E3E3E3"/>
                        <circle cx="172.095" cy="216.405" r="5" fill="#E3E3E3"/>
                        <circle cx="272.426" cy="194.624" r="5" fill="#E3E3E3"/>
                        <circle cx="26" cy="21" r="5" fill="#E3E3E3"/>
                        <circle cx="5" cy="96" r="5" fill="#E3E3E3"/>
                        <circle cx="72" cy="5" r="5" fill="#E3E3E3"/>
                    </svg>
                    <svg id="castorama" class="main-map-points__item" width="413" height="175" viewBox="0 0 413 175"
                         fill="none"
                         xmlns="http://www.w3.org/2000/svg">
                        <circle cx="5.41992" cy="5.30273" r="5" fill="#E3E3E3"/>
                        <circle cx="153.936" cy="110.253" r="5" fill="#E3E3E3"/>
                        <circle cx="269" cy="20" r="5" fill="#E3E3E3"/>
                    </svg>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="main-map-shops">
                        @foreach($headerAllStores as $store)
                            <a class="main-map-shops__item {{ $loop->first ? 'active' : '' }} {{ $store->slug }} main-map-toggle"
                               data-map="{{ $store->slug }}"
                               href="{{ route('store_main', $store->slug) }}">
                                <img src="{{ $store->image_path ?? '' }}" alt="$store->slug">
                            </a>
                        @endforeach
                        <a href="{{ route('catalog') }}" class="main-map-shops__item">
                            <p>Другие магазины</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-steps">
        <div class="container">
            <h3 class="main-steps__header">
                Доставка от 2 часов по Москве
            </h3>

            <div class="main-steps-row">
                <div class="main-steps-row__col">
                    <div class="main-steps-row__img">
                        <img src="/img/main/steps/step1.jpg" alt="">
                        <span class="main-steps-row__badge">1-й шаг</span>
                    </div>
                    <div>
                        <p class="main-steps-row__header">
                            Вы оформляйте заказ
                        </p>
                        <p class="main-steps-row__text">
                            Мы доставим ваш заказ быстро и в удобное время
                        </p>
                    </div>
                </div>
                <div class="main-steps-row__col">
                    <div class="main-steps-row__img">
                        <img src="/img/main/steps/step2.jpg" alt="">
                        <span class="main-steps-row__badge">2-й шаг</span>
                    </div>
                    <div>
                        <p class="main-steps-row__header">
                            Мы собираем заказ
                        </p>
                        <p class="main-steps-row__text">
                            Мы проверим товарный вид и целостность каждого товара в заказе
                        </p>
                    </div>
                </div>
                <div class="main-steps-row__col">
                    <div class="main-steps-row__img">
                        <img src="/img/main/steps/step3.jpg" alt="">
                        <span class="main-steps-row__badge">3-й шаг</span>
                    </div>
                    <div>
                        <p class="main-steps-row__header">
                            Доставляем Вам в удобное время
                        </p>
                        <p class="main-steps-row__text">
                            Мы доставим ваш заказ быстро и в удобное время
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-promotions/>

    <x-delivery/>

    <div class="main-qa">
        <div class="container">
            <h3 class="main-qa__header">
                Часто задаваемые вопросы
            </h3>

            <div class="row">
                <div class="col-lg-6 col-12">
                    <p class="main-qa__small">
                        О сервисе, доставка
                    </p>
                    <div class="accordion" id="accordionService">
                        <div class="main-qa-card">
                            <div class="main-qa-card__header" data-toggle="collapse" data-target="#accordionServiceOne"
                                 aria-expanded="true" aria-controls="accordionServiceOne">
                                <header>
                                    Зачем мне пользоваться сервисом BeeClub?
                                    <img src="/svg/main/accordion-arrow.svg" alt="">
                                </header>
                            </div>
                            <div id="accordionServiceOne" class="collapse show" aria-labelledby="accordionServiceOne"
                                 data-parent="#accordionService">
                                <div class="main-qa-card__body">
                                    <ol>
                                        <li>Экономим ваше время. Теперь не нужно ездить по магазинам и тратить на это
                                            целый день.
                                        </li>
                                        <li>Считаем ваши деньги. Вы заказываете товары из любимых магазинов и платите за
                                            доставку всего 1 раз.
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="main-qa-card">
                            <div class="main-qa-card__header collapsed" data-toggle="collapse"
                                 data-target="#accordionServiceTwo"
                                 aria-expanded="true" aria-controls="accordionServiceTwo">
                                <header>
                                    Сколько стоит доставка?
                                    <img src="/svg/main/accordion-arrow.svg" alt="">
                                </header>
                            </div>
                            <div id="accordionServiceTwo" class="collapse" aria-labelledby="accordionServiceTwo"
                                 data-parent="#accordionService">
                                <div class="main-qa-card__body">
                                    <p>
                                        Узнать стоимость доставки можно <a
                                            href="{{route('about')}}#delivery-cost">тут</a>.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="main-qa-card">
                            <div class="main-qa-card__header collapsed" data-toggle="collapse"
                                 data-target="#accordionServiceThree"
                                 aria-expanded="true" aria-controls="accordionServiceThree">
                                <header>
                                    Если я закажу товары из разных магазинов, сколько раз мне платить за доставку?
                                    <img src="/svg/main/accordion-arrow.svg" alt="">
                                </header>
                            </div>
                            <div id="accordionServiceThree" class="collapse" aria-labelledby="accordionServiceThree"
                                 data-parent="#accordionService">
                                <div class="main-qa-card__body">
                                    <p>
                                        Всего 1 раз. Вы заказываете товары из любимых магазинов, мы привозим.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <p class="main-qa__small">
                        Заказ, отслеживание
                    </p>
                    <div class="accordion" id="accordionOrder">
                        <div class="main-qa-card">
                            <div class="main-qa-card__header collapsed" data-toggle="collapse"
                                 data-target="#accordionOrderOne"
                                 aria-expanded="true" aria-controls="accordionOrderOne">
                                <header>
                                    Нужно ли мне регистрироваться для оформления заказа?
                                    <img src="/svg/main/accordion-arrow.svg" alt="">
                                </header>
                            </div>
                            <div id="accordionOrderOne" class="collapse" aria-labelledby="accordionOrderOne"
                                 data-parent="#accordionOrder">
                                <div class="main-qa-card__body">
                                    <p>
                                        Да, нужно. Чтобы сделать заказ необходимо зарегистрироваться.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="main-qa-card">
                            <div class="main-qa-card__header collapsed" data-toggle="collapse"
                                 data-target="#accordionOrderTwo"
                                 aria-expanded="true" aria-controls="accordionOrderTwo">
                                <header>
                                    Как отследить мой заказ?
                                    <div class="main-qa-card__img">
                                        <img src="/svg/main/accordion-arrow.svg" alt="">
                                    </div>
                                </header>
                            </div>
                            <div id="accordionOrderTwo" class="collapse" aria-labelledby="accordionOrderTwo"
                                 data-parent="#accordionOrder">
                                <div class="main-qa-card__body">
                                    <p>
                                        Чтобы отследить заказ нужно перейти в Личный кабинет и найти раздел
                                        <a href="/lk/orders">Заказы</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact">
        <div class="container">
            <div class="contact__inner">
                <h2 class="contact__title">Если остались вопросы - <br> обязательно ответим</h2>
                <div class="contact__wrap">
                    <form action="#" class="contact__form form floating-label">
                        <div class="contact__form-group">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <div class="form-control-container">
                                        <input class="form-control bg-white" id="name" placeholder=" " type="text"
                                               name="name">
                                        <label for="name">Имя</label>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-control-container">
                                        <input class="form-control bg-white" placeholder=" " id="phone"
                                               type="text" name="phone">
                                        <label for="phone">Телефон</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="form-control-container">
                                        <textarea class="form-control bg-white" rows="3" id="questions" name="questions"
                                                  placeholder=" "></textarea>
                                        <label for="questions">Ваш вопрос</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="contact__form-btn btn btn-primary" type="submit">Отправить</button>
                        <span class="contact__form-send">Отправляя свои данные, вы соглашаетесь на обработку персональных данных</span>
                    </form>
                    <div class="contact__box">
                        <div class="contact__box-descr">Или свяжитесь с нами любым удобным способом</div>
                        <a class="contact__box-phone" href="tel:+79000000000">+7(900) 000-00-00</a>
                        <div class="contact__social">
                            <a href="#" class="contact__social-item">WhatsApp</a>
                            <a href="#" class="contact__social-item">Telegram</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-improve/>
    </div>

</main>

<x-app-banner/>

<x-footer/>
