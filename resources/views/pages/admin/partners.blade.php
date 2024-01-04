<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card no-shadow">
                        <div class="card-head">
                            <header>
                                Партнеры
                            </header>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable1" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="sort-numeric">ID</th>
                                        <th class="sort-alpha">Компания</th>
                                        <th class="sort-alpha">ФИО</th>
                                        <th>Телефон</th>
                                        <th>Дата регистрации</th>
                                        <th>Адрес склада</th>
                                        <th>Условия сотрудничества</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($partners as $partner)
                                        <tr class="gradeX clickable-row"
                                            data-href="{{ route('admin_partner', $partner->id) }}">
                                            <td>{{ $partner->id }}</td>
                                            <td>{{ $partner->company_name }}</td>
                                            <td>{{ $partner->full_name }}</td>
                                            <td>{{ $partner->phone }}</td>
                                            <td>{{ date('d.m.Y H:i',strtotime($partner->created_at)) }}</td>
                                            <td>{{ $partner->address }}</td>
                                            <td>{{ $partner->commission }}% комиссия от стоимости</td>
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
