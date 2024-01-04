<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body order">
{{--            <div class="card-title">--}}
{{--                <header>--}}
{{--                    Заказ № {{ $order->id }}--}}
{{--                </header>--}}
{{--            </div>--}}
{{--            <div class="card">--}}
{{--                <div class="card-body">--}}
{{--                    <div class="order-status">--}}
{{--                        <div>--}}
{{--                            Cтатус:--}}
{{--                            <p>{{ __('order_status.' . $order->status) }}</p>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <button class="btn btn-warning">Редактировать</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="order-props">--}}
{{--                        <div>--}}
{{--                            <p>{{ $order->full_name }}</p>--}}
{{--                            <p>{{ $order->phone }}</p>--}}
{{--                            <p>{{ $order->email }}</p>--}}

{{--                            <p>Информация по личному счету</p>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <p>--}}
{{--                                <span>Дата заказа</span><span>{{ date('d.m.Y',strtotime($order->created_at)) }}</span>--}}
{{--                            </p>--}}
{{--                            <div class="order-props-list">--}}
{{--                                <p class="order-props-list__item">--}}
{{--                                    <span class="order-props-list__item--label">Кол-во позиций</span>--}}
{{--                                    <span class="order-props-list__item--value">{{ count($order->items) }}</span>--}}
{{--                                </p>--}}
{{--                                <p class="order-props-list__item">--}}
{{--                                    <span class="order-props-list__item--label">Оплаченная сумма</span>--}}
{{--                                    <span class="order-props-list__item--value">{{ $order->getSum() / 100 }} руб</span>--}}
{{--                                </p>--}}
{{--                                <p class="order-props-list__item">--}}
{{--                                    <span class="order-props-list__item--label">К возврату</span>--}}
{{--                                    <span class="order-props-list__item--value">--}}
{{--                                        {{ ($order->getSum() - $order->getFinalSum()) / 100 }} руб--}}
{{--                                    </span>--}}
{{--                                </p>--}}
{{--                                <p class="order-props-list__item">--}}
{{--                                    <span class="order-props-list__item--label">Из нее возвращено</span>--}}
{{--                                    <span class="order-props-list__item--value">--}}
{{--                                        {{ $order->refunded_amount / 100 }} руб--}}
{{--                                    </span>--}}
{{--                                </p>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <p>Детали доставки до клиента</p>--}}
{{--                            <p id="mapAddress" data-address="{{ $order->address }}">--}}
{{--                                {{ $order->address }}--}}
{{--                                <span>Показать на карте</span>--}}
{{--                            </p>--}}
{{--                            <p>--}}
{{--                                {{ date('H:i',strtotime($order->delivery_start_time)) }}--}}
{{--                                <span>в интервале </span>--}}
{{--                                {{ date('H:i',strtotime($order->delivery_end_time)) }}--}}
{{--                            </p>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="row">
                <div class="col-lg-3">
                    <div class="card card-bordered style-default-light no-shadow order-info">
                        <ul class="card-head nav nav-tabs nav-justified" data-toggle="tabs">
                            <li>
                                <a href="#first1" class="active">Заказ № {{ $order->id }}</a>
                            </li>
                            <li>
                                <a href="#second1">Изменить</a>
                            </li>
                        </ul>
                        <div class="card-body style-default-bright tab-content">
                            <div class="tab-pane active" id="first1">
                                <div>
                                    Статус заказа
                                    <span class="pull-right">
                                    {{ __('order_status.' . $order->status) }}
                                </span>
                                </div>
                                <hr>
                                <div>
                                    Дата заказа
                                    <span class="pull-right">
                                    {{ date('d.m.Y',strtotime($order->created_at)) }}
                                </span>
                                </div>
                                <div>
                                    Адрес доставки
                                    <span id="mapAddress" data-address="{{ $order->address }}" class="pull-right">
                                     {{ $order->address }}
                                </span>
                                </div>
                                <div>
                                    Дата Доставки
                                    <span class="pull-right">
                                    {{ date('d.m.Y',strtotime($order->delivery_date)) }}
                                </span>
                                </div>
                                <div>
                                    Интервал доставки
                                    <span class="pull-right">
                                    {{ date('H:i',strtotime($order->delivery_start_time)) }} - {{ date('H:i',strtotime($order->delivery_end_time)) }}
                                </span>
                                </div>
                                <div>
                                    @if($delivery)
                                        {{ $delivery->title }}
                                        <span class="pull-right">
                                        {{ $order->delivery_amount / 100 }} руб
                                     @endif
                                </span>
                                </div>
                                <hr>
                                <div>
                                    ФИО
                                    <span class="pull-right">
                                     {{ $order->full_name }}
                                </span>
                                </div>
                                <div>
                                    Телефон
                                    <span class="pull-right">
                                    {{ $order->phone }}
                                </span>
                                </div>
                                <div>
                                    Почта
                                    <span class="pull-right">
                                    {{ $order->email }}
                                </span>
                                </div>
                                <div>
                                    Личный счет
                                    <span class="pull-right">
                                    {{ ($account->bonus_amount + $account->refund_amount) / 100 }} руб
                                </span>
                                </div>
                                <div>
                                    Возвратные
                                    <span class="pull-right">
                                    {{ $account->refund_amount / 100 }} руб
                                </span>
                                </div>
                                <div>
                                    Бонусные
                                    <span class="pull-right">
                                    {{ $account->bonus_amount / 100 }} руб
                                </span>
                                </div>
                                <hr>
                                <div>
                                    Кол-во позиций
                                    <span class="pull-right">
                                    {{ count($order->items) }}
                                </span>
                                </div>
                                <div>
                                    Оплаченная сумма
                                    <span class="pull-right">
                                    {{ $order->getSum() / 100 }} руб
                                </span>
                                </div>
                                <hr>
                                <div>
                                    Итоговая сумма заказа
                                    <span class="pull-right">
                                        <span id="finalSum">{{ $order->getFinalSum() / 100 }}</span> руб
                                    </span>
                                </div>
                                <div>
                                    К возврату
                                    <span class="pull-right">
                                    <span id="refundSum">{{ ($order->getSum() - $order->getFinalSum()) / 100 }}</span> руб
                                    </span>
                                </div>
                                <div>
                                    Из неё возвращено
                                    <span class="pull-right">
                                    <span id="refundSum">{{ $order->refunded_amount / 100 }}</span> руб
                                    </span>
                                </div>
                            </div>
                            <div class="tab-pane floating-label" id="second1">
                                <form id="editOrderForm" class="form"
                                      action="{{ route('admin_change_order', $order->id) }}"
                                      method="post">
                                    @csrf
                                    <div class="form-group floating-label">
                                        <select id="status" name="status" class="form-control">
                                            <option
                                                value="{{ $order->status }}">{{ __('order_status.' . $order->status) }}</option>
                                            <option
                                                value="{{ \App\OrderStatus::CANCELED }}">{{ __('order_status.' . \App\OrderStatus::CANCELED) }}</option>
                                            <option
                                                value="{{ \App\OrderStatus::PAID }}">{{ __('order_status.' . \App\OrderStatus::PAID) }}</option>
                                            <option
                                                value="{{ \App\OrderStatus::READY_FOR_DELIVERY }}">{{ __('order_status.' . \App\OrderStatus::READY_FOR_DELIVERY) }}</option>
                                            <option
                                                value="{{ \App\OrderStatus::GIVEN_TO_COURIER }}">{{ __('order_status.' . \App\OrderStatus::GIVEN_TO_COURIER) }}</option>
                                            <option
                                                value="{{ \App\OrderStatus::RE_DELIVERY }}">{{ __('order_status.' . \App\OrderStatus::RE_DELIVERY) }}</option>
                                            <option
                                                value="{{ \App\OrderStatus::REFUNDED }}">{{ __('order_status.' . \App\OrderStatus::REFUNDED) }}</option>
                                            <option
                                                value="{{ \App\OrderStatus::ORDERED }}">{{ __('order_status.' . \App\OrderStatus::ORDERED) }}</option>
                                            <option
                                                value="{{ \App\OrderStatus::COMPLETED }}">{{ __('order_status.' . \App\OrderStatus::COMPLETED) }}</option>
                                        </select>
                                        <label for="status">Статус заказа</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address" value="{{ $order->address }}"
                                               class="form-control" id="address">
                                        <label for="address">Адрес доставки</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group date date-picker">
                                            <div class="input-group-content">
                                                <input type="text" name="date"
                                                       value="{{ date('d/m/Y',strtotime($order->delivery_date)) }}"
                                                       class="form-control">
                                            </div>
                                            <span class="input-group-addon"><i
                                                    class="fa fa-calendar"></i></span>
                                        </div>
                                        <label for="date">Дата доставки</label>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-content">
                                                <input type="time" name="timeFrom"
                                                       value="{{ date('H:i',strtotime($order->delivery_start_time)) }}"
                                                       class="form-control" required>
                                            </div>
                                            <div class="input-group-content">
                                                <input type="time" name="timeTo"
                                                       value="{{ date('H:i',strtotime($order->delivery_end_time)) }}"
                                                       class="form-control" required>
                                            </div>
                                        </div>
                                        <label for="date">Интервал доставки</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="fullName" value="{{ $order->full_name }}"
                                               class="form-control" id="fullName" required>
                                        <label for="fullName">ФИО</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" value="{{ preg_replace('~^7~', '', $order->phone) }}"
                                               class="form-control" id="phone" required>
                                        <label for="phone">Телефон</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" value="{{ $order->email }}"
                                               class="form-control" id="email" required>
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="balance" value="{{ $order->email }}"
                                               class="form-control" id="balance">
                                        <label for="balance">Личный счет</label>
                                    </div>
                                    <div>
                                        Кол-во позиций
                                        <span class="pull-right">
                                             {{ count($order->items) }}
                                        </span>
                                    </div>
                                    <div>
                                        Оплаченная сумма
                                        <span class="pull-right">
                                            {{ $order->getSum() / 100 }} руб
                                        </span>
                                    </div>
                                    <div>
                                        Итоговая сумма заказа
                                        <span class="pull-right">
                                            {{ $order->getFinalSum() / 100 }} руб
                                        </span>
                                    </div>
                                    <div>
                                        К возврату
                                        <span class="pull-right">
                                            {{ ($order->getSum() - $order->getFinalSum()) / 100 }} руб
                                        </span>
                                    </div>
                                    <button type="submit" class="btn btn-block ink-reaction btn-warning"
                                            style="margin-top: 15px;">
                                        Сохранить изменения
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="panel-group" id="accordion1">
                        <div class="card panel">
                            <div class="card-head collapsed" data-toggle="collapse" data-parent="#accordion1"
                                 data-target="#accordion1-1" aria-expanded="false">
                                <header>Курьеры</header>
                                <div class="tools">
                                    <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
                                </div>
                            </div>
                            <div id="accordion1-1" class="collapse" aria-expanded="false" style="height: 0px;">
                                <div class="card-body">
                                    <div id="courierData">
                                        @if($order->courier_id > 0)
                                            <x-admin.order.courier-data
                                                fullName="{{$order->courier->full_name}}"
                                                phone="{{$order->courier->phone}}"
                                                carSize="{{$order->courier->car_size}}"
                                            />
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control select2-list"
                                                name="courier"
                                                data-placeholder="Выберите курьера" id="couriers">
                                            <optgroup label="Курьеры">
                                                <option value="0">
                                                    Не выбран
                                                </option>
                                                @foreach($couriers as $courier)
                                                    <option
                                                        value="{{ $courier->id }}"{{ ($courier->id == $order->courier_id) ? ' selected' : '' }}>
                                                        {{ $courier->full_name }}
                                                    </option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                        <label>Выберите курьера</label>
                                    </div>
                                    <button class="btn btn-block ink-reaction btn-warning" id="chooseCourier">
                                        Применить
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-group" id="accordion2">
                        <div class="card panel">
                            <div class="card-head collapsed" data-toggle="collapse" data-parent="#accordion2"
                                 data-target="#accordion2-1" aria-expanded="false">
                                <header>Заметки</header>
                                <div class="tools">
                                    <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
                                </div>
                            </div>
                            <div id="accordion2-1" class="collapse" aria-expanded="false" style="height: 0px;">
                                <div class="card-body">
                                    <div class="form-group floating-label">
                                            <textarea name="notes" id="orderComment" class="form-control" rows="2"
                                                      placeholder="">{{ $order->comment }}</textarea>
                                        <label for="textarea2">Заметки</label>
                                    </div>
                                    <button class="btn btn-block ink-reaction btn-warning" id="saveOrderComment">
                                        Сохранить
                                    </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    @foreach($groupedOrder as $storeId => $items)
                        <div class="card no-shadow store-order" data-store-order-id="{{ $orderStores[$storeId]->id }}">
                            <div class="card-head">
                                <header>
                                    {{ $storeNames[$storeId] }}
                                </header>
                            </div>
                            <div class="card-body" style="padding-top: 0;">
                                <div>
                                    <div style="max-width: 200px">
                                    <span class="text-default-light current-store-order-status"
                                          style="vertical-align: sub;">
                                        {{ __('order_store_status.' . $orderStores[$storeId]->status) }}
                                    </span>
                                        <div class="btn-group pull-right">
                                            <a href="#" class="btn btn-icon-toggle dropdown-toggle"
                                               data-toggle="dropdown"><i class="fa fa-chevron-down"></i></a>
                                            <ul class="dropdown-menu animation-dock pull-right menu-card-styling"
                                                role="menu" style="text-align: left;width: fit-content;">
                                                <li>
                                                    <a class="store-order-status-control" href="javascript:void(0);"
                                                       data-status="{{ \App\OrderStoreStatus::CANCELED }}">
                                                        {{ __('order_store_status.' . \App\OrderStoreStatus::CANCELED) }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="store-order-status-control" href="javascript:void(0);"
                                                       data-status="{{ \App\OrderStoreStatus::PAID }}">
                                                        {{ __('order_store_status.' . \App\OrderStoreStatus::PAID) }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="store-order-status-control" href="javascript:void(0);"
                                                       data-status="{{ \App\OrderStoreStatus::READY_FOR_DELIVERY }}">
                                                        {{ __('order_store_status.' . \App\OrderStoreStatus::READY_FOR_DELIVERY) }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="store-order-status-control" href="javascript:void(0);"
                                                       data-status="{{ \App\OrderStoreStatus::ORDERED }}">
                                                        {{ __('order_store_status.' . \App\OrderStoreStatus::ORDERED) }}
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="store-order-status-control" href="javascript:void(0);"
                                                       data-status="{{ \App\OrderStoreStatus::CREATED }}">
                                                        {{ __('order_store_status.' . \App\OrderStoreStatus::CREATED) }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <form class="form floating-label" style="margin-top: 15px; max-width: 200px"
                                          action="">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="input-group-content">
                                                    <input type="text" class="form-control"
                                                           id="addId{{ $orderStores[$storeId]->id }}"
                                                           value="{{ $orderStores[$storeId]->store_order_id }}">
                                                    <label for="addId{{ $orderStores[$storeId]->id }}">Привязать
                                                        ID</label>
                                                </div>
                                                <div class="input-group-btn">
                                                    <button
                                                        class="btn ink-reaction btn-icon-toggle btn-primary store-order-id-update"
                                                        type="button"
                                                        data-store-order-id="{{ $orderStores[$storeId]->id }}">
                                                        <i class="md md-check"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="table-responsive">
                                    <table class="table order-table hover">
                                        <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Товар</th>
                                            <th>Статус</th>
                                            <th>Стоимость</th>
                                            <th>Кол-во</th>
                                            <th>Итог</th>
                                            <th>Ссылка на сайте</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($items as $key => $item)
                                            <tr class="gradeX {{ ($item->stock_quantity > 0) ? '' : ' deleted-item' }}"
                                                data-href="{{ route('admin_product', $item->product->friendly_url_name) }}">
                                                <td>{{ $key + 1 }}</td>
                                                <td data-toggle="tooltip" data-placement="bottom"
                                                    data-trigger="hover"
                                                    data-original-title="{{ $item->product->name }}">{{ Str::limit($item->product->name, 25) }}</td>
                                                <td>
                                                    <div class="form-group floating-label">
                                                        <select name="status" class="form-control order-item-status"
                                                                data-order-item-id="{{ $item->id }}">
                                                            <option
                                                                value="{{ \App\OrderItemStatus::CANCELED }}"{{ ($item->status == \App\OrderItemStatus::CANCELED) ? ' selected' : ''}}>{{ __('order_item_status.' . \App\OrderItemStatus::CANCELED) }}</option>
                                                            <option
                                                                value="{{ \App\OrderItemStatus::PAID }}"{{ ($item->status == \App\OrderItemStatus::PAID) ? ' selected' : ''}}>{{ __('order_item_status.' . \App\OrderItemStatus::PAID) }}</option>
                                                            <option
                                                                value="{{ \App\OrderItemStatus::READY_FOR_DELIVERY }}"{{ ($item->status == \App\OrderItemStatus::READY_FOR_DELIVERY) ? ' selected' : ''}}>{{ __('order_item_status.' . \App\OrderItemStatus::READY_FOR_DELIVERY) }}</option>
                                                            <option
                                                                value="{{ \App\OrderItemStatus::GIVEN_TO_COURIER }}"{{ ($item->status == \App\OrderItemStatus::GIVEN_TO_COURIER) ? ' selected' : ''}}>{{ __('order_item_status.' . \App\OrderItemStatus::GIVEN_TO_COURIER) }}</option>
                                                            <option
                                                                value="{{ \App\OrderItemStatus::RE_DELIVERY }}"{{ ($item->status == \App\OrderItemStatus::RE_DELIVERY) ? ' selected' : ''}}>{{ __('order_item_status.' . \App\OrderItemStatus::RE_DELIVERY) }}</option>
                                                            <option
                                                                value="{{ \App\OrderItemStatus::REFUNDED }}"{{ ($item->status == \App\OrderItemStatus::REFUNDED) ? ' selected' : ''}}>{{ __('order_item_status.' . \App\OrderItemStatus::REFUNDED) }}</option>
                                                            <option
                                                                value="{{ \App\OrderItemStatus::COMPLETED }}"{{ ($item->status == \App\OrderItemStatus::COMPLETED) ? ' selected' : ''}}>{{ __('order_item_status.' . \App\OrderItemStatus::COMPLETED) }}</option>
                                                        </select>
                                                    </div>
                                                </td>
                                                <td>{{ $item->price / 100 }} руб</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="dropdown-toggle" href="#" role="button"
                                                           id="dropdownQuantity{{ $item->id }}" data-toggle="dropdown"
                                                           aria-haspopup="true" aria-expanded="false">
                                                            <span
                                                                id="itemStockQuantity{{$item->id}}">{{ $item->stock_quantity }}</span>
                                                            ({{ $item->quantity }}) шт
                                                        </a>

                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <input class="form-control quantity-control" type="number"
                                                                   id="itemStockQuantityInput{{$item->id}}"
                                                                   min="0" max="{{ $item->quantity }}"
                                                                   value="{{ $item->stock_quantity }}"
                                                                   data-order-item-id="{{ $item->id }}">
                                                        </div>
                                                    </div>
                                                </td>
                                                {{--                                                <td>{{ $item->stock_quantity }} ({{ $item->quantity }}) шт</td>--}}
                                                <td><span
                                                        id="itemSubTotal{{$item->id}}">{{ $item->getSum() / 100 }}</span>
                                                    руб
                                                </td>
                                                <td class="remove"><a
                                                        href="{{ $item->product->getStoreProductLink() }}"
                                                        target="_blank">Ссылка в
                                                        магазине</a></td>
                                                <td class="remove"
                                                    data-toggle="tooltip" data-placement="bottom"
                                                    data-trigger="hover"
                                                    data-original-title="Удалить">
                                                    <a href="#" class="btn btn-flat btn-danger delete-item" data-order-item-id="{{ $item->id }}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="card no-shadow">
                        <div class="card-body no-padding">
                            <div id="map" style="overflow:hidden;width: 100%; height: 500px"></div>
                        </div>
                        <script type="text/javascript">
                            ymaps.ready(init);

                            const address = document.getElementById('mapAddress').getAttribute('data-address');

                            const addressObi = [
                                [55.789539, 37.596008],
                                [55.789210, 37.594719]
                            ]

                            const addressLerya = [
                                [55.749539, 37.576008],
                                [55.749210, 37.574719]
                            ]

                            function init() {
                                var myMap = new ymaps.Map('map', {
                                    center: [55.74, 37.58],
                                    zoom: 10,
                                    controls: []
                                });

                                addressObi.forEach(address => {
                                    myMap.geoObjects.add(new ymaps.Placemark(address, {
                                        balloonContent: 'ОБИ',
                                        iconCaption: 'ОБИ'
                                    }, {
                                        iconColor: '#b69800'
                                    }))
                                })

                                addressLerya.forEach(address => {
                                    myMap.geoObjects.add(new ymaps.Placemark(address, {
                                        balloonContent: 'Леруа',
                                        iconCaption: 'Леруа'
                                    }, {
                                        iconColor: '#FFB698'
                                    }))
                                })

                                let geocoderHome = ymaps.geocode(address, {results: 1});
                                geocoderHome.then(res => {
                                    const firstGeoObject = res.geoObjects.get(0);
                                    const coords = firstGeoObject.geometry.getCoordinates();

                                    myMap.geoObjects.add(new ymaps.Placemark(coords, {
                                        balloonContent: address,
                                        iconCaption: 'Клиент'
                                    }, {
                                        iconColor: '#0044bb'
                                    }))
                                    myMap.setCenter(coords, 10, [])
                                });

                            }

                            ymaps.ready(init);
                        </script>
                    </div>

                    <ul class="timeline collapse-lg timeline-hairline">
                        <li class="timeline-inverted">
                            <div class="timeline-circ circ-xl style-primary"><span
                                    class="glyphicon glyphicon-leaf"></span></div>
                            <div class="timeline-entry">
                                <div class="card style-default-bright">
                                    <div class="card-body small-padding">
                                        <img class="img-circle img-responsive pull-left width-1"
                                             src="../../assets/img/avatar9.jpg?1404026744" alt=""/>
                                        <span class="text-medium">Произошло событие <a class="text-primary"
                                                                                       href="#">пример</a><br/></span>
                                        <span class="opacity-50">
													Среда, Июля 16, 2020
												</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-circ circ-xl style-default-dark"><i class="fa fa-quote-left"></i>
                            </div>
                            <div class="timeline-entry">
                                <div class="card style-default-dark">
                                    <div class="card-body small-padding">
                                        <img class="img-circle img-responsive pull-left width-1"
                                             src="../../assets/img/avatar7.jpg?1404026721" alt=""/>
                                        <span class="text-medium">Что-то произошло <span
                                                class="text-primary">тут</span></span><br/>
                                        <span class="opacity-50">
													Среда, Июля 16, 2020
												</span>
                                    </div>
                                    <div class="card-body">
                                        <p><em>А тут описание например</em></p>
                                        <img class="img-responsive" src="../../assets/img/img14.jpg?1404589160"
                                             alt=""/>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </div>
        </div>
    </section>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        function updateAfterQuantityChange(itemId, quantity, itemTotal, refundSum, finalSum) {
            $('#itemStockQuantity' + itemId).text(quantity);
            $('#itemStockQuantityInput' + itemId).val(quantity);
            $('#itemSubTotal' + itemId).text(itemTotal / 100);
            $('#refundSum').text(refundSum / 100);
            $('#finalSum').text(finalSum / 100);
        }

        function changeQuantity(itemId, quantity) {
            let url = "{{ route('admin_order_item_update_quantity', 'ITEMID') }}";
            url = url.replace('ITEMID', itemId);
            console.log(url);
            let data = {
                quantity: quantity
            };
            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: res => {
                    updateAfterQuantityChange(itemId, quantity, res.itemTotal, res.refund, res.final)
                },
                error: e => {
                    console.log(e)
                }
            });
        }
        $('.delete-item').on('click', function (e) {
            e.preventDefault();
            let itemId = $(this).data('order-item-id');
            let quantity = 0;
            changeQuantity(itemId, quantity);
        });
        $('.quantity-control').change(function (e) {
            e.preventDefault();
            let itemId = $(this).data('order-item-id');
            let quantity = $(this).val();
            changeQuantity(itemId, quantity);
        });

        $('.order-item-status').change(function (e) {
            e.preventDefault();
            let itemId = $(this).data('order-item-id');
            let status = $(this).val();
            let data = {
                status: $(this).val()
            };
            let url = "{{ route('admin_order_item_update_status', 'ITEMID') }}";
            url = url.replace('ITEMID', itemId);
            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: res => {

                },
                error: e => {
                    console.log(e)
                }
            });
        });

        $('.store-order-id-update').on('click', function (e) {
            e.preventDefault();
            let storeOrderId = $(this).data('store-order-id');
            console.log(storeOrderId);
            let data = {
                externalStoreOrderId: $('#addId' + storeOrderId).val()
            };
            let url = "{{ route('admin_order_store_update_order_id', 'ORDERID') }}";
            url = url.replace('ORDERID', storeOrderId);
            console.log(url);
            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: res => {
                },
                error: e => {
                    console.log(e)
                }
            });
        });

        $('.store-order-status-control').on('click', function (e) {
            e.preventDefault();
            let storeOrderId = $(this).closest('.store-order').data('store-order-id');
            let data = {
                status: $(this).data('status')
            };
            let url = "{{ route('admin_order_store_update_status', 'ORDERID') }}";
            url = url.replace('ORDERID', storeOrderId);
            $(this).closest('.store-order').find('.current-store-order-status').text($(this).text());
            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: res => {

                },
                error: e => {
                    console.log(e)
                }
            });
        });

        $('#saveOrderComment').on('click', function (e) {
            e.preventDefault();
            let data = {
                comment: $('#orderComment').val()
            };
            let url = "{{ route('admin_order_update_comment', $order->id) }}";
            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: res => {

                },
                error: e => {
                    console.log(e)
                }
            });
        });

        $('#chooseCourier').on('click', function (e) {
            e.preventDefault();
            let data = {
                courierId: parseInt($('#couriers').val())
            };
            let url = "{{ route('admin_order_update_courier', $order->id) }}";
            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: res => {
                    $('#courierData').html(res);
                },
                error: e => {
                    console.log(e)
                }
            });
        });
    })
</script>
<x-admin.footer/>

