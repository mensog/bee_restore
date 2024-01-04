<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card no-shadow">
                        <div class="card-head">
                            <header>
                                Неразобранные категории
                            </header>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatable1" class="table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th class="sort-alpha">Название</th>
                                        <th class="sort-alpha">Поставщик</th>
                                        <th>Задать категорию</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($parsedCategories as $category)
                                    <tr class="gradeX">
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->partner->company_name }}</td>
                                        <td>
                                            <div class="input-group category-select-group">
                                                <div class="input-group-content">
                                                    <input type="text" class="form-control select2-category"
                                                            name="categoryId"
                                                            data-placeholder="Выберите категорию">
                                                </div>
                                                <div class="input-group-btn">
                                                    <button class="btn ink-reaction btn-icon-toggle btn-primary move-category"
                                                        data-category-id="{{ $category->id }}">
                                                        <i class="md md-check"></i>
                                                    </button>
                                                </div>
                                            </div>
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let categoriesData = [
            @foreach($categories as $category)
            {
                id: {{ $category->id }},
                text: "{{ $category->name }}"
            },
            @endforeach
        ];
        $('.select2-category').select2({
            allowClear: true,
            data: categoriesData
        });

        $('.move-category').on('click', function (e) {
            e.preventDefault();
            let categoryToMoveId = $(this).data('category-id');
            let categoryRow = $('#datatable1').DataTable().row($(this).parents('tr'));
            let newCategoryId = $(this).closest('.category-select-group').find('.select2-category').val();
            let data = {
                newCategoryId: newCategoryId
            };
            let url = "{{ route('admin_category_move_unsorted', 'CATID') }}";
            url = url.replace('CATID', categoryToMoveId);
            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: JSON.stringify(data),
                contentType: 'application/json',
                success: res => {
                    categoryRow.remove().draw();
                },
                error: e => {
                    console.log(e)
                }
            })
        })
    })
</script>
<x-admin.footer/>
