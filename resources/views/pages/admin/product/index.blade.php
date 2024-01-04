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
                        <div class="tools">
                            <div class="btn-group">
                                <a href="{{ route('admin_create_product_page') }}"
                                   class="btn btn-block ink-reaction btn-warning">
                                    Добавить товар
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
                                        <th></th>
                                        <th class="sort-alpha">Товар</th>
                                        <th class="sort-alpha">Категория</th>
                                        <th class="sort-alpha">Стоимость</th>
                                        <th class="sort-alpha">Поставщик</th>
                                        <th class="sort-alpha">Модерация</th>
                                        <th class="sort-alpha">Видимость</th>
                                        <th class="sort-alpha">Последнее изменение</th>
                                    </tr>
                                    </thead>
                                    <tbody>
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

        $('#datatableProducts').DataTable({
            "dom": 'lCfrtip',
            "order": [],
            "colVis": {
                "buttonText": "Columns",
                "overlayFade": 0,
                "align": "right"
            },
            "language": {
                "lengthMenu": '_MENU_ кол-во на страницу',
                "search": '<i class="fa fa-search"></i>',
                "zeroRecords": "Результаты не найдены",
                "infoEmpty": "Сейчас тут пусто",
                "info": "Страница _PAGE_ из _PAGES_ ",
                "infoFiltered": " - выбрано из _MAX_ товаров",
                "paginate": {
                    "previous": '<i class="fa fa-angle-left"></i>',
                    "next": '<i class="fa fa-angle-right"></i>'
                }
            },
            serverSide: true,
            ajax: {
                url: '{{ route('admin_products_api') }}',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            },
            "createdRow": function (row, data, index) {
                $(row).attr('data-href', data['editLink']);
                let nameCell = $(row).find('td:eq(1)');
                nameCell.attr('data-toggle', 'tooltip');
                nameCell.attr('data-placement', 'bottom');
                nameCell.attr('data-trigger', 'hover');
                nameCell.attr('data-original-title', data['name']);
            },
            columns: [
                {
                    data: 'img_url',
                    render: (data, type, row) => {
                        return '<img alt="" src="' + data + '"/>'

                    }
                },
                // {data: 'sku'},
                {
                    data: 'name',
                    render: function (data, type, row) {
                        return (
                            data.substr(0, 25)
                        )
                    }
                },
                // {
                //     data: 'storeLink',
                //     render: function (data, type, row) {
                //         return '<a href="' + data + '">Ссылка</a>'
                //     }
                // },
                {data: 'category'},
                {data: 'price'},
                {data: 'partner'},
                {data: 'moderation'},
                {data: 'visible'},
                {data: 'updatedAt'}
            ],
            "columnDefs": [
                {"orderable": false, "targets": 7}
            ]
        });
        $('#datatableProducts').on('draw.dt', function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
        $('#datatableProducts').on('click', '.clickable-row', function () {
            window.location = $(this).data('href');
        });
    })
</script>
<x-admin.footer/>
