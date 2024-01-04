@if(isset($storeCatalog['']) && count($storeCatalog['']) > 0)
    <div class="categories">
    <div class="container">
        <h2 class="categories__heading">Категории</h2>
        <div class="categories__items">
            @foreach($storeCatalog[''] as $category)

                <a href="{{ route('category', ['storeId' => $currentStore->id, 'name' => $category->friendly_url_name]) }}" class="categories__item">
                    <span class="categories__item-descr">{{ $category->name }}</span>
                        @if(!is_null($category->icon_path))
                        <img class="categories__item-img" src="{{ asset($category->icon_path) }}" alt="">
                        @endif
                </a>
                @if($loop->iteration == 4)
                        @if($loop->remaining > 0)
                        <a href="{{ route('catalog',['storeId' => $currentStore->id]) }}" class="categories__item categories__item_empty">
                            <span class="categories__item-descr">Ещё {{ $loop->remaining }} {{ Lang::choice('категория|категории|категорий', $loop->remaining, [], 'ru') }}</span>
                        </a>
                        @endif
                    @break
                @endif
            @endforeach
        </div>
    </div>
</div>
@endif
