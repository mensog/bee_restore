<x-header/>

<main id="content" class="bg-white" role="main">

    <div class="breadcrumb-container">
        <div class="container">
            <x-breadcrumbs :pageRootRoute="$productsRender->pageRootRoute" :pageRootName="$productsRender->pageName" :breadcrumbs="$productsRender->breadcrumbs"/>
            {{--<div class="delivery__box">--}}
                {{--<img class="delivery__box-img" src="{{ $store->image_path }}" alt="">--}}
                {{--<h3 class="delivery__box-title"><span>Доставка из</span>{{ $store->company_name }}</h3>--}}
            {{--</div>--}}
        </div>
    </div>
@if($productsRender->skipQuery)
        <div class="catalog">
            <div class="container text-center">
                <h3 class="catalog__title">Ничего не найдено</h3>
                <div class="row">
                    К сожалению по вашему запросу товаров не найдено
                </div>
                <a href="{{ route('catalog') }}" class="btn btn-primary">Вернуться в каталог</a>
            </div>
        </div>
@else
    <div class="catalog">
        <div class="container">
            <h3 class="catalog__title">{{ (is_null($productsRender->currentCategory)) ? $productsRender->pageName : $productsRender->currentCategory->name }}</h3>
            <div class="row">
                <div class="col-lg-3">
                    <div class="catalog__aside">
                        <div class="catalog__subtitle subtitle">Категории</div>
                        @isset($commonCatalog)
                            <x-category-sidebar :categories="$commonCatalog" :activeCategorySlugs="$productsRender->activeCategorySlugs"
                            :routeName="$productsRender->sidebarRouteName"/>
                        @endisset
                        <div class="price-filter">
                            <h4 class="price-filter__title subtitle">Цена</h4>
                            <div class="price-filter__wrap">
                                <div class="price-filter__box">
                                    <span>от</span>
                                    <input name="priceCatalog" data-type="priceFrom" type="text" placeholder="500" value="{{ ($productsRender->filterPriceFrom) ? $productsRender->filterPriceFrom / 100 : '' }}">
                                </div>
                                <div class="price-filter__box">
                                    <span>до</span>
                                    <input name="priceCatalog" data-type="priceTo" type="text" placeholder="1500" value="{{ ($productsRender->filterPriceTo) ? $productsRender->filterPriceTo / 100 : '' }}">
                                </div>
                            </div>
                        </div>
                        <div class="checkboxes">
                            <h4 class="checkboxes__subtitle subtitle">Магазин</h4>
                            <div class="checkboxes__wrap">
                                @foreach($productsRender->stores as $filterStore)
                                <div class="checkboxes__item">
                                    <input type="checkbox" data-store="{{ $filterStore->id }}" id="store{{ $filterStore->id }}" name="filterStore"
                                    {{ in_array($filterStore->id, $productsRender->storeIds) ? ' checked' : '' }}>
                                    <label for="store{{ $filterStore->id }}">{{ $filterStore->company_name }}</label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="tabs">
                        <div class="tabs__control">
                            @isset($productsRender->currentCategory)
                                @isset($productsRender->storeCatalog[$currentCategory->id])
                                    @foreach($productsRender->storeCatalog[$currentCategory->id] as $cat)
                                        <a href="{{ route('category', ['name' => $cat->friendly_url_name]) }}"
                                           class="tabs__control-btn">{{  $cat->name }}</a>
                                    @endforeach
                                @endisset
                            @else
                                @isset($productsRender->storeCatalog[''])
                                    @foreach($productsRender->storeCatalog[''] as $cat)
                                        <a href="{{ route('category', ['name' => $cat->friendly_url_name]) }}"
                                           class="tabs__control-btn">{{  $cat->name }}</a>
                                    @endforeach
                                @endisset
                            @endisset
                        </div>
                    </div>
                    <div id="productsContainer">
                        <x-products-list :products="$productsRender->products" :cartContent="$productsRender->cartContent" :favoritesListContent="$productsRender->favoritesListContent"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
    <x-delivery/>

    <div class="container">
        <x-improve/>
    </div>

</main>

<x-app-banner/>

<x-footer/>
