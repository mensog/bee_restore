<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-title">
                        <header>
                            Промокоды
                        </header>
                        <div class="tools">
                            <div class="btn-group">
                                <a href="{{ route('admin_promocode_create_page') }}"
                                   class="btn btn-block ink-reaction btn-warning">
                                    Добавить промокод
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body no-padding">
                            <div class="table-responsive">
                                <table id="datatableProducts" class="table table-hover w-100 table-border-bottom">
                                    <thead>
                                    <tr>
                                        <th class="sort-alpha">Название</th>
                                        <th class="sort-alpha">размер скидки</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($promocodes as $promocode)
                                        <tr class="clickable-row" data-href="{{ route('admin_promocode_update_page', $promocode->id) }}">
                                            <td>{{ $promocode->name }}</td>
                                            <td>{{ $promocode->amount / 100 }}</td>
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
<script>
    document.addEventListener('DOMContentLoaded', function () {

    })
</script>
<x-admin.footer/>
