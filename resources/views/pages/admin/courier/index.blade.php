<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card no-shadow">
                        <div class="card-head">
                            <header>
                                Курьеры
                            </header>
                            <div class="tools">
                                <div class="btn-group">
                                    <a href="{{ route('admin_create_courier_page') }}"
                                       class="btn btn-block ink-reaction btn-warning">
                                        Добавить курьера
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable1" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="sort-numeric">ID</th>
                                        <th class="sort-alpha">ФИО</th>
                                        <th class="sort-alpha">Телефон</th>
                                        <th>Дата регистрации</th>
                                        <th>Заказы</th>
                                        <th class="sort-numeric">Габариты машины</th>
                                        <th class="sort-numeric">Условия сотрудничества</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($couriers as $courier)
                                        <tr class="gradeX clickable-row"
                                            data-href="{{ route('admin_courier', $courier->id) }}">
                                            <td>{{ $courier->id }}</td>
                                            <td>{{ $courier->full_name }}</td>
                                            <td>{{ $courier->phone }}</td>
                                            <td>{{ date('d.m.Y H:i',strtotime($courier->created_at)) }}</td>
                                            <td class="order-hover order-hover-link">
                                                Список заказов
                                                <div class="card order-card-hover" style="z-index: 5">
                                                    <div class="card-body no-padding">
                                                        <ul class="list">
                                                            <li class="tile">
                                                                <a href="{{ route('admin_order', 1) }}"
                                                                   class="ink-reaction btn btn-default-bright btn-block">
                                                                    <div class="tile-content">
                                                                        <div class="tile-icon">
                                                                            order ID: 1
                                                                        </div>
                                                                        <div class="tile-text">
                                                                            Дата заказа
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            {{--                                                            @foreach($order->items as $item)--}}
                                                            {{--                                                                <li class="tile">--}}
                                                            {{--                                                                    <a href="{{ route('order', $order->id) }}"--}}
                                                            {{--                                                                       class="ink-reaction btn btn-default-bright btn-block">--}}
                                                            {{--                                                                        <div class="tile-content">--}}
                                                            {{--                                                                            <div class="tile-icon">--}}
                                                            {{--                                                                                ID: {{ $item->product_id }}--}}
                                                            {{--                                                                            </div>--}}
                                                            {{--                                                                            <div class="tile-text">--}}
                                                            {{--                                                                                {{ $item->product->name }}--}}
                                                            {{--                                                                                <small>--}}
                                                            {{--                                                                                    {{ $item->quantity }} шт--}}
                                                            {{--                                                                                    * {{ $item->price / 100 }} руб--}}
                                                            {{--                                                                                    = {{ $item->getSum() / 100 }} руб--}}
                                                            {{--                                                                                </small>--}}
                                                            {{--                                                                            </div>--}}
                                                            {{--                                                                        </div>--}}
                                                            {{--                                                                    </a>--}}
                                                            {{--                                                                </li>--}}
                                                            {{--                                                            @endforeach--}}
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $courier->car_size }}</td>
                                            <td>{{ $courier->commission }}% комиссия от стоимости</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<x-admin.footer/>
