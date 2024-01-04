<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-title">
                        <header>
                            Товары
                        </header>
                    </div>
                    <div class="card" style="overflow: visible">
                        <div class="card-body no-padding">
                            <div class="table-responsive" style="overflow: visible">
                                <table id="orders" class="table w-100 table-hover">
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
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($orders as $order)
                                        <tr class="gradeX clickable-row"
                                            data-href="{{ route('admin_order', $order->id) }}">
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
                                            <td class="remove"
                                                data-toggle="tooltip" data-placement="bottom"
                                                data-trigger="hover"
                                                data-original-title="Удалить">
                                                <x-admin.remove-with-modal
                                                    type="icon"
                                                    :action="route('admin_order', $order->id)"
                                                    :text="'заказ №' . $order->id">
                                                </x-admin.remove-with-modal>
                                            </td>
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
