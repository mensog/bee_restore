<x-header/>

<main id="content" role="main">

    <div class="container mt-3">
        <div class="row mb-8">
            <div class="d-none d-xl-block col-xl-3 col-wd-2gdot5">
                <div class="mb-6 border border-width-2 border-color-3 borders-radius-6">
                    <ul id="sidebarNav" class="list-unstyled mb-0 sidebar-navbar view-all">
                        <li>
                            <div class="dropdown-title">Категории товаров</div>
                        </li>
                        @isset($storeCatalog)
                            <x-category-sidebar :categories="$storeCatalog" :store="$store"/>
                        @endisset
                    </ul>
                </div>
            </div>

            <div class="col-xl-9 col-wd-9gdot5">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane mb-8 fade pt-2 show active" id="pills-two-example1" role="tabpanel"
                         aria-labelledby="pills-two-example1-tab" data-target-group="groups">
                        <ul class="row list-unstyled products-group no-gutters">
                            @foreach ($products as $key => $product)
                                <li id="product_{{ $product->id }}"
                                    class="col-6 col-md-3 col-wd-2gdot4 product-item {{ $key + 1 % 4 ? 'remove-divider-md-lg remove-divider-xl' : ''}} {{ ($key + 1) % 5  === 0 ? 'remove-divider-wd' : '' }}">
                                    <div class="product-item__outer h-100">
                                        <div class="product-item__inner px-xl-4 p-3">
                                            <div class="product-item__body pb-xl-2">
                                                <div class="mb-2"><a
                                                        href="{{ route('product', ['name' => $product->friendly_url_name, 'storeSlug' => $currentStore->slug]) }}"
                                                        class="font-size-12 text-gray-5">{{ $product->category->name }}</a>
                                                </div>
                                                <h5 class="mb-1 product-item__title"><a
                                                        href="{{ route('product', ['name' => $product->friendly_url_name, 'storeSlug' => $currentStore->slug]) }}"
                                                        class="text-blue font-weight-bold">{{ $product->name }}</a></h5>
                                                <div class="mb-2">
                                                    <a href="{{ route('product', ['name' => $product->friendly_url_name, 'storeSlug' => $currentStore->slug]) }}"
                                                       class="d-block text-center"><img
                                                            class="img-fluid" src="{{ $product->img_url }}"
                                                            alt="{{ $product->name }}"></a>
                                                </div>
                                                <p class="font-size-12 p-0 text-gray-110 mb-4">{{ Str::of($product->description)->limit(75, ' ...') }}</p>
                                                <div class="text-gray-20">
                                                    Артикул: {{ $product-> sku }}</div>
                                                <div class="flex-center-between mb-1">
                                                    <div class="product-price">
                                                        <div class="text-gray-100">{{ $product->price / 100 }} руб</div>
                                                    </div>
                                                    <div class="d-none d-xl-block product-add-cart">
                                                        @if(isset($cartContent[$product->id]))
                                                            <button data-id="{{ $product->id }}" data-quantity="1"
                                                                    class="btn-add-cart border-0 btn-primary transition-3d-hover">
                                                                <i class="ec ec-shopping-bag"></i>
                                                            </button>
                                                        @else
                                                            <button data-id="{{ $product->id }}" data-quantity="1"
                                                                    class="btn-add-cart border-0 add-to-cart btn-primary transition-3d-hover">
                                                                <i class="ec ec-add-to-cart"></i>
                                                            </button>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="product-item__footer">
                                                <div class="border-top pt-2 flex-center-between flex-wrap">
                                                    <a href="#" class="text-gray-6 font-size-13"><i
                                                            class="ec ec-compare mr-1 font-size-15"></i> Сравнить</a>
                                                    @if(in_array($product->id, $favoritesListContent))
                                                        <button data-id="{{ $product->id }}" data-action="remove"
                                                                class="btn-add-to-favorites add-to-favorites btn btn-link p-0 text-gray-6 font-size-13">
                                                            <i class="ec heart mr-1 font-size-15"></i>
                                                        </button>
                                                    @else
                                                        <button data-id="{{ $product->id }}" data-action="add"
                                                                class="btn-add-to-favorites add-to-favorites btn btn-link p-0 text-gray-6 font-size-13">
                                                            <i class="ec ec-favorites mr-1 font-size-15"></i>
                                                        </button>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

</main>

<x-app-banner/>

<x-footer/>

