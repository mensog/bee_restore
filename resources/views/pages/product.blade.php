<x-header/>

<main id="content" class="product-page" role="main">

    <div class="breadcrumbs">
        <div class="container">
            <p class="breadcrumbs-block">
                <a class="breadcrumbs-block__link" href="{{ route('main', ['storeSlug' => $product->store->slug]) }}">Главная</a>
                /
                <a class="breadcrumbs-block__link"
                   href="{{ route('store_main', ['storeSlug' => $product->store->slug]) }}">{{ $product->store->company_name }}</a>
                /
                <a class="breadcrumbs-block__link"
                   href="{{ route('catalog') }}">Каталог</a>
                /
                @foreach($categoryBreadcrumbs as $url => $catName)
                    <a class="breadcrumbs-block__link"
                       href="{{ route('category', ['name' => $url, 'storeId' => $product->store->id]) }}">
                        {{ $catName }}
                    </a>
                    /
                @endforeach
                {{ $product->name }}
            </p>
        </div>
    </div>

    <div class="product">
        <div class="container">
            <div class="product-card">
                <div class="product-card__body">

                    <div class="product-card-gallery">
                        <img class="product-card-gallery__image" src="{{ $product->img_url }}"
                             alt="{{ $product->name }}">
                    </div>

                    <div class="product-card-info">
                        <div class="product-card-info-header">
                            <h3>
                                {{ $product->name }}
                            </h3>
                            <div class="product-card-info-header__inner">
                                <x-star-rating rating="{{ $product->getRating() }}"
                                               class="product-card-info-header__rating" :interaction=false/>
                                <span class="product-card-info-header__score">
                                    {{ number_format($product->getRating(), 1) }}
                                </span>
                                    <span class="product-card-info-header__sku"><span>|</span> Артикул: {{ $product-> sku }}</span>
                            </div>
                            <hr>
                        </div>

                        <div class="product-card-info-body">
                            <div class="product-card-info-body-props">
                                <header>
                                    О товаре
                                </header>

                                <ul class="props-list">
                                    @if(isset($attributes) && is_array($attributes) && count($attributes) > 0)
                                        @foreach($attributes as $attribute)
                                            @if ($loop->index <= 5)
                                                <li>
                                                    <p>{{ $attribute['name'] }}</p>
                                                    <p>{{ $attribute['value'] }}</p>
                                                </li>
                                            @endif
                                        @endforeach
                                    @endif
                                </ul>
                                <a href="#description">
                                    <img src="/svg/product/description.svg" alt=""> Перейти к описанию
                                </a>
                            </div>

                            <div class="product-card-info-body-cart">
                                <div class="product-card-info-body-cart__price">
                                    <p>{{ $product->price / 100 }} ₽ <span>/за шт</span></p>
                                    <a target="_blank" href="{{ $product->getStoreProductLink() }}"><img
                                            src="/svg/product/search.svg" alt=""> Проверить цену
                                        в {{ $product->store->full_name }}</a>
                                </div>
                                <x-product-add-to-cart :inCartQuantity="$inCartQuantity" :productId="$product->id"/>
                                @if($inFavoritesList)
                                    <button data-id="{{ $product->id }}" data-action="remove"
                                            class="btn-add-to-favorites add-to-favorites btn btn-outline-black"
                                            style="max-width: 100%">
                                        <i class="heart-on"></i>
                                        <span>В избранном</span>
                                    </button>
                                @else
                                    <button data-id="{{ $product->id }}" data-action="add"
                                            class="btn-add-to-favorites add-to-favorites btn btn-outline-black">
                                        <i class="heart-off"></i>
                                        <span>В избранное</span>
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <div class="product-card__footer">
                    <div class="product-card-requirements">
                        <div class="product-card-requirements__item  product-card-requirements__delivery">
                            <img src="{{ $product->store->image_path }}" alt="">
                            <p>
                                <small>Доставка из:</small>
                                {{ $product->store->company_name }}
                            </p>
                        </div>
                        <div class="product-card-requirements__item">
                            <img src="/svg/product/price.svg" alt="">
                            <p>
                                <small>Ближайшее время доставки</small>
                                От 45 минут
                            </p>
                        </div>
                        <div class="product-card-requirements__item">
                            <img src="/svg/product/price.svg" alt="">
                            <p>
                                <small>Сумма заказа</small>
                                от 1 000 Р
                            </p>
                        </div>
                        <div class="product-card-requirements__item">
                            <img src="/svg/product/weight.svg" alt="">
                            <p>
                                <small>Вес заказа</small>
                                до 30 кг
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="description" class="product-description">
        <div class="container">
            <div class="product-description-card">
                <h4 class="product-description-card__header">О товаре</h4>
                <p class="product-description-card__description">{{ $product->description }}</p>
                @if(isset($attributes) && is_array($attributes) && count($attributes) > 0)
                    <h4 class="product-description-card__header">Характеристики</h4>
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <ul class="props-list mb-0">
                                @foreach($attributes as $key => $attribute)
                                    <li>
                                        <p>{{ $attribute['name'] }}</p>
                                        <p>{{ $attribute['value'] }}</p>

                                    </li>
                                    @if($key + 1 === (int) round(count($attributes) / 2))
                            </ul>
                        </div>
                        <div class="col-lg-6 col-12">
                            <ul class="props-list mb-0 props-list_hidden">
                            @endif
                            @endforeach
                        </div>
                        <button class="btn btn-outline-black btn-props">Показать все</button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="comments">
        <div class="container">
            <div class="comments-card">
                <div class="comments-card__header">
                    <div class="row">
                        <div class="col-lg-8 col-12">
                            @if($product->reviews->count() > 0)
                                <h4>Отзывы ({{ $product->reviews->count() }})</h4>
                                <x-star-rating rating="{{ $product->getRating() }}" class="comments-card__rating"
                                               :interaction="false"/>
                                <span class="comments-card__score">{{ number_format($product->getRating(), 1) }}</span>
                                <span class="comments-card__count">({{ $product->reviews->count() }})</span>
                            @else
                                <h4>Отзывов пока нет, оцените товар первым!</h4>
                            @endif
                        </div>
                        @can('createReview', $product)
                            <div class="col-lg-4 col-12">
                                <button type="button" data-toggle="collapse" data-target="#review"
                                        aria-expanded="false" aria-controls="comment"
                                        class="btn btn-outline-black">
                                    Оставить отзыв
                                </button>
                            </div>
                        @endcan
                    </div>
                    @can('createReview', $product)
                        <form class="form mt-3 floating-label collapse" method="post" id="review"
                              action="{{ route('add_review', ['id' => $product->id]) }}">
                            @csrf
                            <div class="form-group row">
                                <div class="col-lg-6 col-12">
                                    <fieldset class="rating">
                                        <div class="rating__group">
                                            <input class="rating__input" type="radio" name="rating" id="rating-1"
                                                   value="1" required>
                                            <label class="rating__star" for="rating-1" aria-label="Ужасно"></label>

                                            <input class="rating__input" type="radio" name="rating" id="rating-2"
                                                   value="2" required>
                                            <label class="rating__star" for="rating-2" aria-label="Сносно"></label>

                                            <input class="rating__input" type="radio" name="rating" id="rating-3"
                                                   value="3" required>
                                            <label class="rating__star" for="rating-3" aria-label="Нормально"></label>

                                            <input class="rating__input" type="radio" name="rating" id="rating-4"
                                                   value="4" required>
                                            <label class="rating__star" for="rating-4" aria-label="Хорошо"></label>

                                            <input class="rating__input" type="radio" name="rating" id="rating-5"
                                                   value="5" required>
                                            <label class="rating__star" for="rating-5" aria-label="Отлично"></label>

                                            <div class="rating__focus"></div>
                                        </div>
                                    </fieldset>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-control-container">
                                        <textarea id="advantages" type="text" class="form-control" rows="3"
                                                  name="advantages" placeholder=" "
                                        >{{ old('advantages') }}</textarea>
                                        <label for="advantages">Достоинства</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-control-container">
                                         <textarea id="disadvantages" type="text" class="form-control" rows="3"
                                                   name="disadvantages" placeholder=" "
                                         >{{ old('disadvantages') }}</textarea>
                                        <label for="disadvantages">Недостатки</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6 col-12">
                                    <div class="form-control-container">
                                        <textarea id="commentText" type="text" class="form-control" rows="3"
                                                  name="comment" placeholder=" "
                                        >{{ old('comment') }}</textarea>
                                        <label for="comment">Комментарий</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <button class="btn btn-primary" type="submit">Оставить отзыв</button>
                                </div>
                            </div>
                        </form>
                    @endcan
                </div>
                @if($product->reviews->count() > 0)
                    <div class="comments-card__body">
                        <div class="comments-list">
                            @foreach($product->reviews as $review)
                                <div class="comment {{ ($loop->iteration > 2) ? 'd-none' : '' }}">
                                    <div class="comment__header">
                                        <img class="comment__img" src="/svg/product/user.svg" alt="">
                                        <div>
                                            <p>{{ $review->user->full_name ?? 'Аноним' }}
                                                <span>{{ date('d.m.Y', strtotime($review->created_at)) }}</span></p>
                                            <x-star-rating rating="{{ $review->rating }}" class="comment__rating"
                                                           :interaction="false"/>
                                        </div>
                                    </div>
                                    <div class="comment__body">
                                        <div class="comment__text">
                                            <p>Достоинства</p>
                                            <p>{{ $review->advantages }}</p>
                                        </div>
                                        <div class="comment__text">
                                            <p>Недостатки:</p>
                                            <p>{{ $review->disadvantages }}</p>
                                        </div>
                                        <div class="comment__text">
                                            <p>Комментарий:</p>
                                            <p>{{ $review->comment }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @if($product->reviews->count() > 2)
                            <button id="showComments" class="btn btn-outline-black mt-4">Показать все отзывы</button>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>

    <x-delivery/>

</main>

<x-app-banner/>

<x-footer/>

<script>

    // Full Properties

    const btnProps = document.querySelector('.btn-props');
    const propsList = document.querySelector('.props-list_hidden');

    if (btnProps) {
        btnProps.addEventListener('click', () => {
            propsList.classList.toggle('show');
            btnProps.classList.toggle('show');

            if (btnProps.classList.contains('show')) {
                btnProps.textContent = 'Скрыть';
            } else {
                btnProps.textContent = 'Показать все';
            }
        });
    }


</script>
