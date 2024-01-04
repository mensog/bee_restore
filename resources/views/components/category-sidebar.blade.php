<ul class="catalog__list">
    @isset($categories[''])
    @foreach($categories[''] as $category)
        @isset($categories[$category->id])
            <li class="catalog__list-item{{ in_array($category->friendly_url_name, $activeCategorySlugs) ? ' active' : '' }}">
            <a class="catalog__list-link" href="{{ route($routeName, ['name' => $category->friendly_url_name] + request()->query()) }}" data-category-name="{{ $category->friendly_url_name }}">{{ $category->name }}</a>
            @php
                $childCategories = $categories[$category->id];
            @endphp
            <x-category-sidebar-item :categories="$categories" :childCategories="$childCategories" :activeCategorySlugs="$activeCategorySlugs"
            :routeName="$routeName"/>
        @else
            <li class="catalog__list-item menu-last{{ in_array($category->friendly_url_name, $activeCategorySlugs) ? ' active' : '' }}">
            <a class="catalog__list-link" href="{{ route($routeName, ['name' => $category->friendly_url_name] + request()->query()) }}" data-category-name="{{ $category->friendly_url_name }}">{{ $category->name }}</a>
        @endisset
    </li>
    @endforeach
    @endisset
</ul>
