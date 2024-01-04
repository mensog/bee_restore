@extends('layouts.lk')

@section('content')
    <div>
        @if($orders->total() !== 0)
            <div class="lk-orders">
                <h2 class="lk-orders__heading">Заказы ({{ $orders->total() }})</h2>
                <div class="accordion" id="accordionOrders">
                    @foreach($orders as $key=> $order)
                        <div class="lk-orders__item {{ $loop->first ? '' : 'collapsed' }}" data-toggle="collapse"
                             data-target="#accordionOrders{{ $order->id }}"
                             aria-expanded="{{ $loop->first ? 'true' : 'false' }}" aria-controls="accordionOrders1">
                            <div class="lk-orders__item-wrap">
                                <div class="lk-orders__item-box">
                                    <div class="lk-orders__item-date">Заказ
                                        от {{ date('d.m.Y H:i',strtotime($order->created_at)) }}</div>
                                    <div class="lk-orders__item-number">№{{ $order->id }}</div>
                                </div>
                                <div class="lk-orders__item-inner">

                                    <div class="lk-orders__item-statusbox">
                                        <div class="lk-orders__item-icon lk-orders__item-icon_blue">
                                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                      d="M7.50039 0.399902H3.40039V5.3999H2.00039C1.66902 5.3999 1.40039 5.66853 1.40039 5.9999C1.40039 6.33127 1.66902 6.5999 2.00039 6.5999H3.40039V7.3999H2.00039C1.66902 7.3999 1.40039 7.66853 1.40039 7.9999C1.40039 8.33127 1.66902 8.5999 2.00039 8.5999H3.40039V10.9999C3.40039 11.3313 3.66902 11.5999 4.00039 11.5999C4.33176 11.5999 4.60039 11.3313 4.60039 10.9999V8.5999H8.00039C8.33176 8.5999 8.60039 8.33127 8.60039 7.9999C8.60039 7.66853 8.33176 7.3999 8.00039 7.3999H4.60039V6.5999H7.50039C9.21247 6.5999 10.6004 5.21199 10.6004 3.4999C10.6004 1.78782 9.21247 0.399902 7.50039 0.399902ZM7.50039 5.3999H4.60039V1.5999H7.50039C8.54973 1.5999 9.40039 2.45056 9.40039 3.4999C9.40039 4.54924 8.54973 5.3999 7.50039 5.3999Z"
                                                      fill="white"/>
                                            </svg>
                                        </div>
                                        <p class="lk-orders__item-link lk-orders__item-link_blue mb-0" href="#">
                                            {{ __('order_status.' . $order->status) }}
                                        </p>
                                    </div>
                                    @if($deliveryType = $order->delivery()->withTrashed()->first())
                                        <div class="lk-orders__item-statusbox">
                                            <div class="lk-orders__item-icon">
                                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M10.2003 10.1668C10.2003 10.5041 9.93152 10.7779 9.60032 10.7779C9.26912 10.7779 9.00032 10.5041 9.00032 10.1668C9.00032 9.82944 9.26912 9.55566 9.60032 9.55566C9.93152 9.55566 10.2003 9.82944 10.2003 10.1668ZM6.00043 8.33279H1.20043L1.21003 2.22168H7.80043L7.79083 8.33279H6.00043ZM2.99968 10.1668C2.99968 10.5041 2.73088 10.7779 2.39968 10.7779C2.06848 10.7779 1.79968 10.5041 1.79968 10.1668C1.79968 9.82944 2.06848 9.55566 2.39968 9.55566C2.73088 9.55566 2.99968 9.82944 2.99968 10.1668ZM10.8003 6.79369V8.33369H9.00032V5.32764L10.8003 6.79369ZM11.775 6.02272L9 3.76161V2.22222C9 1.54817 8.5122 1 7.9122 1H1.0872C0.4878 1 0 1.54817 0 2.22222V8.33333C0 8.86683 0.3078 9.31661 0.7326 9.48344C0.6486 9.69489 0.6 9.92467 0.6 10.1667C0.6 11.1774 1.4076 12 2.4 12C3.3924 12 4.2 11.1774 4.2 10.1667C4.2 9.95094 4.1568 9.74744 4.089 9.55556H6H7.911C7.8432 9.74744 7.8 9.95094 7.8 10.1667C7.8 11.1774 8.6076 12 9.6 12C10.5924 12 11.4 11.1774 11.4 10.1667C11.4 9.95094 11.3568 9.74744 11.289 9.55556H11.4C11.7318 9.55556 12 9.28239 12 8.94444V6.5C12 6.31422 11.9172 6.13883 11.775 6.02272Z"
                                                          fill="white"/>
                                                </svg>
                                            </div>
                                            <p class="lk-orders__item-link lk-orders__item-link_gray mb-0">
                                                {{ $deliveryType->title }}/{{ $order->delivery_amount / 100}} руб.
                                            </p>
                                        </div>
                                    @endif

                                </div>
                            </div>
                            <div class="lk-orders__item-wrap">
                                <div class="lk-orders__item-box">
                                    <div class="lk-orders__item-price">{{ $order->getSum()/100 }} ₽</div>
                                    <div class="lk-orders__item-statusprice">Оплачено, картой онлайн</div>
                                </div>
                                <div class="lk-orders__item-open">
                                    <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M17.7071 13.7071C17.3166 14.0976 16.6834 14.0976 16.2929 13.7071L9 6.41421L1.70711 13.7071C1.31658 14.0976 0.683418 14.0976 0.292892 13.7071C-0.0976314 13.3166 -0.0976313 12.6834 0.292893 12.2929L8.29289 4.29289C8.68342 3.90237 9.31658 3.90237 9.70711 4.29289L17.7071 12.2929C18.0976 12.6834 18.0976 13.3166 17.7071 13.7071Z"
                                              fill="black"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div id="accordionOrders{{ $order->id }}"
                             class="collapse cart {{ $loop->first ? 'show' : '' }}"
                             aria-labelledby="accordionOrders{{ $order->id }}"
                             data-parent="#accordionOrders{{ $order->id }}">
                            <div class="cart__wrap p-0">
                                @foreach($groupedOrders[$key] as $storeId => $items)
                                    <div>
                                        <h3 class="cart__subheading">
                                            {{ $stores[$storeId]->full_name }} ({{ count($items) }})</h3>
                                        @foreach($items as $item)
                                            <div class="cart__inner">
                                                <div class="cart__product">
                                                    <div class="cart__product-wrapper">
                                                        <div class="cart__product-img">
                                                            <a href="{{ route('product', ['name' => $item->product->friendly_url_name, 'storeSlug' => $item->product->store->slug]) }}">
                                                                <img
                                                                    src="{{ $item->product->img_url ?: '/img/cart/placeholder150.png' }}"
                                                                    alt="{{ $item->product->name }}">
                                                            </a>
                                                        </div>
                                                        <div class="cart__product-wrap">
                                                            <div class="cart__product-descr">
                                                                <a href="{{ route('product', ['name' => $item->product->friendly_url_name, 'storeSlug' => $item->product->store->slug]) }}">
                                                                    {{ $item->product->name }}
                                                                </a>
                                                            </div>
                                                            <div
                                                                class="cart__product-shop">{{ $item->product->weight ? $item->product->weight/1000 . ' кг |' : '' }}
                                                                из {{ $item->product->store->company_name }}</div>
                                                        </div>
                                                    </div>
                                                    <div class="cart__product-wrapper">
                                                        <div class="cart__product-wrap">
                                                            <div class="lk-orders__item-statusbox">
                                                                <div
                                                                    class="lk-orders__item-icon lk-orders__item-icon_blue">
                                                                    <svg width="12" height="12" viewBox="0 0 12 12"
                                                                         fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                              d="M7.50039 0.399902H3.40039V5.3999H2.00039C1.66902 5.3999 1.40039 5.66853 1.40039 5.9999C1.40039 6.33127 1.66902 6.5999 2.00039 6.5999H3.40039V7.3999H2.00039C1.66902 7.3999 1.40039 7.66853 1.40039 7.9999C1.40039 8.33127 1.66902 8.5999 2.00039 8.5999H3.40039V10.9999C3.40039 11.3313 3.66902 11.5999 4.00039 11.5999C4.33176 11.5999 4.60039 11.3313 4.60039 10.9999V8.5999H8.00039C8.33176 8.5999 8.60039 8.33127 8.60039 7.9999C8.60039 7.66853 8.33176 7.3999 8.00039 7.3999H4.60039V6.5999H7.50039C9.21247 6.5999 10.6004 5.21199 10.6004 3.4999C10.6004 1.78782 9.21247 0.399902 7.50039 0.399902ZM7.50039 5.3999H4.60039V1.5999H7.50039C8.54973 1.5999 9.40039 2.45056 9.40039 3.4999C9.40039 4.54924 8.54973 5.3999 7.50039 5.3999Z"
                                                                              fill="white"/>
                                                                    </svg>
                                                                </div>
                                                                <p class="lk-orders__item-link lk-orders__item-link_blue mb-0"
                                                                   href="#">
                                                                    {{ __('order_item_status.' . $item->status) }}
                                                                </p>
                                                            </div>
                                                            <div class="cart__product-box">
                                                                @if(in_array($item->product_id, $favoritesListContent, true))
                                                                    <button data-id="{{ $item->product_id }}"
                                                                            data-action="add"
                                                                            class="btn-add-to-favorites add-to-favorites cart__product-link in-favorite"
                                                                            style="max-width: 100%">
                                                                        <i class="heart-on"></i>
                                                                        <span>В избранном</span>
                                                                    </button>
                                                                @else
                                                                    <button data-id="{{ $item->product_id }}"
                                                                            data-action="add"
                                                                            class="btn-add-to-favorites add-to-favorites cart__product-link"
                                                                            style="max-width: 100%">
                                                                        <i class="heart-off"></i>
                                                                        <span>В избранное</span>
                                                                    </button>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="cart__product-wrap">
                                                            <div class="cart__product-price">
                                                                {{ $item->getSum() / 100 }} ₽
                                                                @if($item->quantity > 1)
                                                                    <p>{{ $item->price / 100 }} ₽/ за шт</p>
                                                                @endif
                                                            </div>
                                                            <div class="cart__product-box">
                                                                <button type="button"
                                                                        class="cart__product-link">
                                                                <span
                                                                    class="cart__product-icon">
                                                                    <svg width="14" height="14" viewBox="0 0 14 14"
                                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                                              d="M5.99349 1.32775C6.29723 1.02401 6.29723 0.531547 5.99349 0.227806C5.68975 -0.0759353 5.19729 -0.0759353 4.89355 0.227806L0.501865 4.61949C0.0462534 5.0751 0.0462533 5.81379 0.501865 6.2694L4.89355 10.6611C5.19729 10.9648 5.68975 10.9648 5.99349 10.6611C6.29723 10.3573 6.29723 9.86488 5.99349 9.56114L2.65457 6.22222H11.6657V13.2222C11.6657 13.6518 12.014 14 12.4435 14C12.8731 14 13.2213 13.6518 13.2213 13.2222V6.22222C13.2213 5.36311 12.5248 4.66667 11.6657 4.66667H2.65457L5.99349 1.32775Z"
                                                                              fill="#9F9F9F"/>
                                                                    </svg>
                                                                </span>
                                                                    Вернуть товар
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <x-empty-list page="orders"/>
        @endif

    </div>
@endsection

