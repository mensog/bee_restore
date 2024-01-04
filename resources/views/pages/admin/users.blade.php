<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card no-shadow">
                        <div class="card-head">
                            <header>
                                Пользователи
                            </header>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable1" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="sort-alpha">ID</th>
                                        <th class="sort-alpha">ФИО</th>
                                        <th class="sort-numeric">Телефон</th>
                                        <th class="sort-alpha">Email</th>
                                        <th class="sort-numeric">Последний заказ</th>
                                        <th class="sort-numeric">Личный счет</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr class="gradeX clickable-row"
                                            data-href="{{ route('admin_user', $user->id) }}">
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }} {{ $user->surname }}</td>
                                            <td>Телефон</td>
                                            <td>{{ $user->email }}</td>
                                            <td class="remove">
                                                @foreach($user->orders as $order)
                                                    @if ($loop->last)
                                                        <a href="{{ route('admin_order', $order->id) }}">№{{ $order->id }}</a>
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>{{ ($user->privateAccount->refund_amount + $user->privateAccount->bonus_amount) / 100 }}</td>
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
