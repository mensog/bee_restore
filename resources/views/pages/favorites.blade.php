<x-header/>

<main id="content" role="main" class="cart-page">

    <div class="container">

        <ul class="breadcrumb">
            <li class="breadcrumb__item">
                <a class="breadcrumb__link" href="{{ route('main') }}">Главная</a>
            </li>
            <li class="breadcrumb__item">/</li>
            <li class="breadcrumb__item">
                <a class="breadcrumb__link" href="#">Избранное</a>
            </li>
        </ul>

        <x-favorites :products="$products" :inCartProductIds="$inCartProductIds"/>

    </div>



</main>

<x-app-banner/>


<x-footer/>
