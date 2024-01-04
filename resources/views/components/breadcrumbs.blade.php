<ul class="breadcrumb" id="breadcrumbs">
    <li class="breadcrumb__item">
        <a class="breadcrumb__link" href="{{ route('main') }}">Главная</a>
    </li>
    <li class="breadcrumb__item">/</li>
    <li class="breadcrumb__item">
        <a class="breadcrumb__link" href="{{ $pageRootRoute }}">
            {{ $pageRootName }}
        </a>
    </li>
    @foreach($breadcrumbs as $key => $crumb)
        @if($loop->last)
            <li class="breadcrumb__item">/</li>
            <li class="breadcrumb__item">
                {{ $crumb }}
            </li>
        @else
            <li class="breadcrumb__item">/</li>
            <li class="breadcrumb__item">
                <a class="breadcrumb__link"
                   href="{{ route('category', ['name'=> $key]) }}">
                    {{ $crumb }}
                </a>
            </li>
        @endif
    @endforeach
</ul>
