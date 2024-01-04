<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card no-shadow">
                        <div class="card-head">
                            <header>
                                {{ $user->name }} {{ $user->surname }}
                            </header>
                        </div>
                        <div class="card-body">
                            <div>
                                Телефон
                                <span class="pull-right">
                                   {{ $user->getPhone() }}
                                </span>
                            </div>
                            <div>
                                Адрес доставки
                                <span class="pull-right">
                                   {{ $user->getAddress() }}
                                </span>
                            </div>
                            <div>
                                Почта
                                <span class="pull-right">
                                    {{ $user->email }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="card no-shadow">
                        <div class="card-head">
                            <header>
                                Заказы
                            </header>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow: visible">
                                <table id="orders" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="sort-numeric">№</th>
                                        <th class="sort-alpha">Статус</th>
                                        <th>Дата заказа</th>
                                        <th>Инфо</th>
                                        <th class="sort-numeric">Сумма</th>
                                        <th>Дата доставки</th>
                                        <th>Курьер</th>
                                        <th class="sort-alpha">Данные покупателя</th>
                                        <th class="sort-numeric">После. изменение</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($user->orders as $order)
                                        <tr class="gradeX clickable-row" data-href="{{ route('admin_order', $order->id) }}">
                                            <td>{{ $order->id }}</td>
                                            <td>{{ __('order_status.' . $order->status) }}</td>
                                            <td>{{ date('d.m.Y H:i',strtotime($order->created_at)) }}</td>

                                            <td class="order-hover">
                                                Инфо
                                                <div class="card order-card-hover" style="z-index: 5">
                                                    <div class="card-body no-padding">
                                                        <ul class="list">
                                                            @foreach($order->items as $item)
                                                                <li class="tile">
                                                                    <div class="tile-content">
                                                                        <div class="tile-icon">
                                                                            ID: {{ $item->product_id }}
                                                                        </div>
                                                                        <div class="tile-text">
                                                                            {{ $item->product->name }}
                                                                            <small>
                                                                                {{ $item->quantity }} шт
                                                                                * {{ $item->price / 100 }} руб
                                                                                = {{ $item->getSum() / 100 }} руб
                                                                            </small>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{ $order->getSum() / 100 }} руб</td>
                                            <td>{{ date('d.m.Y H:i',strtotime($order->delivery_date)) }} {{ date('H:i',strtotime($order->delivery_start_time)) }} - {{ date('H:i',strtotime($order->delivery_end_time)) }}</td>
                                            <td>{{ $order->courier->full_name ?? 'Не назначен'}}</td>
                                            <td>{{ $order->full_name }}</td>
                                            <td>{{ date('d.m.Y H:i',strtotime($order->updated_at)) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
                                        <span class="text-medium">Произошло событие <a class="text-primary" href="#">пример</a><br/></span>
                                        <span class="opacity-50">
													Среда, Июля 16, 2020
												</span>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="timeline-circ circ-xl style-default-dark"><i class="fa fa-quote-left"></i></div>
                            <div class="timeline-entry">
                                <div class="card style-default-dark">
                                    <div class="card-body small-padding">
                                        <img class="img-circle img-responsive pull-left width-1"
                                             src="../../assets/img/avatar7.jpg?1404026721" alt=""/>
                                        <span class="text-medium">Что-то произошло <span class="text-primary">тут</span></span><br/>
                                        <span class="opacity-50">
													Среда, Июля 16, 2020
												</span>
                                    </div>
                                    <div class="card-body">
                                        <p><em>А тут описание например</em></p>
                                        <img class="img-responsive" src="../../assets/img/img14.jpg?1404589160" alt=""/>
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

<x-admin.footer/>

