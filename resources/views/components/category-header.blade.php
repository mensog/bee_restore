<ul class="dropdown__mainmenu">
    @isset($categories[''])
    @foreach($categories[''] as $category)
            @isset($categories[$category->id])
                <li class="dropdown__mainmenu-item">
                <a class="dropdown__mainmenu-link" href="{{ route('category', ['name' => $category->friendly_url_name]) }}">{{ $category->name }}</a>
                @php
                    $childCategories = $categories[$category->id];
                @endphp
                <x-category-header-item :categories="$categories" :childCategories="$childCategories"/>
            @else
                <li class="dropdown__mainmenu-item menu-last">
                <a class="dropdown__mainmenu-link" href="{{ route('category', ['name' => $category->friendly_url_name]) }}">{{ $category->name }}</a>
            @endisset
        </li>
    @endforeach
    @endisset
</ul>
