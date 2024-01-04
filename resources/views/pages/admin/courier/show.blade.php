<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card  no-shadow">
                        <div class="card-head">
                            <header>
                                {{ $courier->full_name }}
                            </header>
                        </div>
                        <div class="card-body">
                            <div>
                                Телефон
                                <span class="pull-right">
                                    {{ $courier->phone }}
                                </span>
                            </div>
                            <div>
                                Размер машины
                                <span class="pull-right">
                                    {{ $courier->car_size }}
                                </span>
                            </div>
                            <div>
                                Условие сотрудничества
                                <span class="pull-right">
                                    {{ $courier->commission }}%
                                </span>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a href="{{route('admin_update_courier_page', $courier->id)}}" class="btn btn-primary">Редактировать</a>
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
                            <div class="table-responsive">
                                <table id="datatable2" class="table order-column hover">
                                    <thead>
                                    <tr>
                                        <th></th>
                                        <th>№</th>
                                        <th>Статус</th>
                                        <th>Товар</th>
                                        <th>Стоимость</th>
                                        <th>Кол-во</th>
                                        <th>Итог</th>
                                        <th>Поставщик</th>
                                        <th>Ссылка на сайте</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="gradeX">
                                        <td class=" details-control"></td>
                                        <td>№</td>
                                        <td>Статус</td>
                                        <td>Товар</td>
                                        <td>Стоимость</td>
                                        <td>Кол-во</td>
                                        <td>Итог</td>
                                        <td>Поставщик</td>
                                        <td>Ссылка на сайте</td>
                                    </tr>
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

