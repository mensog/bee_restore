<div class="dropdown__menu">
    <ul>
        @foreach($childCategories as $category)
                @isset($categories[$category->id])
                <li class="dropdown__menu-item">
                <a class="dropdown__menu-link" href="{{ route('category', ['name' => $category->friendly_url_name]) }}">{{ $category->name }}</a>
                    @php
                        $childCategories = $categories[$category->id];
                    @endphp
                    <x-category-header-item :categories="$categories" :childCategories="$childCategories"/>
                @else
                <li class="dropdown__menu-item menu-last">
                <a class="dropdown__menu-link" href="{{ route('category', ['name' => $category->friendly_url_name]) }}">{{ $category->name }}</a>
                @endisset
            </li>
        @endforeach
    </ul>
</div>
