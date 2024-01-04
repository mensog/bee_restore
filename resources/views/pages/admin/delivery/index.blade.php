<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-title">
                        <header>
                            Способы доставки
                        </header>
                        <div class="tools">
                            <div class="btn-group">
                                <a href="{{ route('admin_create_delivery_page') }}"
                                   class="btn btn-block ink-reaction btn-warning">
                                    Добавить способ доставки
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="table-responsive text-center">
                                <table id="datatableProducts" class="table table-hover w-100 table-border-bottom">
                                    <thead>
                                    <tr>
                                        <th class="sort-alpha">Название</th>
                                        <th class="sort-alpha">Описание</th>
                                        <th class="sort-alpha">Начало доставки</th>
                                        <th class="sort-alpha">Конец доставки</th>
                                        <th class="sort-alpha">Цена</th>
                                        <th class="sort-alpha">Задержка доставки (в часах)</th>
                                        <th class="sort-alpha">Номер</th>
                                        <th class="sort-alpha">Редактирование</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($deliveries as $delivery)
                                            <tr>
                                                <td class="sort-alpha">{{$delivery->title}}</td>
                                                <td class="sort-alpha">{{$delivery->description}}</td>
                                                <td class="sort-alpha">{{$delivery->start}}</td>
                                                <td class="sort-alpha">{{$delivery->end}}</td>
                                                <td class="sort-alpha">{{$delivery->price / 100}}</td>
                                                <td class="sort-alpha">{{$delivery->delay}}</td>
                                                <td class="sort-alpha">{{$delivery->serial_number}}</td>
                                                <td class="sort-alpha"><a href="{{ route('admin_delivery', [$delivery->id]) }}">редактировать</a></td>
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
