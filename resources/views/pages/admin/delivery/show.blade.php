<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">

                    <form id="productForm" class="form" enctype="multipart/form-data" action="{{ route('admin_update_delivery' , [$delivery->id]) }}" method="post">
                        @csrf
                        <div class="card card-bordered style-default-light no-shadow">

                            <div class="card-head">
                                <header>
                                    {{ $delivery->title }}
                                </header>
                            </div>

                            <div class="card-body style-default-bright floating-label">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="title" value="{{ $delivery->title }}" class="form-control" id="title" required>
                                            <label for="title">Название</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select id="color" name="color" class="form-control">
                                                <option value="{{ \App\DeliveryColors::COLOR_WHITE }}">{{ __('delivery_moderation_color.' . \App\DeliveryColors::COLOR_WHITE) }}</option>
                                                <option value="{{ \App\DeliveryColors::COLOR_BLUE }}">{{ __('delivery_moderation_color.' . \App\DeliveryColors::COLOR_BLUE) }}</option>
                                                <option value="{{ \App\DeliveryColors::COLOR_YELLOW }}">{{ __('delivery_moderation_color.' . \App\DeliveryColors::COLOR_YELLOW) }}</option>
                                            </select>
                                            <label for="color">Цвет</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="description" id="description" class="form-control"
                                              rows="2">{{ $delivery->description }}</textarea>
                                            <label for="description">Описание</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="number" name="price" value="{{ $delivery->price / 100 }}" class="form-control" id="price" data-rule-digits="true" required>
                                            <label for="price">Стоимость доставки (руб)</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="number" name="serial_number" value="{{ $delivery->serial_number }}" class="form-control" id="serial_number" data-rule-digits="true" required>
                                            <label for="serial_number">Порядковый номер</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="time" name="start" class="form-control" value="{{ $delivery->start }}" id="start" data-rule-time="true" value="00:00" required>
                                            <label for="start">Начало доставки</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="time" name="end" class="form-control" value="{{ $delivery->end }}" id="end" data-rule-time="true" value="00:00" required>
                                            <label for="end">Окончание доставки</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="number" name="delay" class="form-control" id="delay" data-rule-digits="true" value="{{ $delivery->delay }}">
                                            <label for="delay">Задержка доставки (в часах)</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                         <div class="form-group">
                                             <label for="icon_path">Иконка</label>
                                             <input type="file" data-max-files="1" name="icon_path" id="icon_path">
                                         </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-actionbar style-default-bright">
                                <div class="card-actionbar-row" style="text-align: left">
                                    <button type="submit" class="btn btn-flex ink-reaction btn-warning">
                                        Обновить
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form id="deleteCategory" class="form"
                          action="{{ route('admin_delivery_delete', $delivery->id) }}" method="post">
                        @csrf
                        <div class="card card-bordered style-default-light no-shadow">

                            <div class="card-actionbar style-default-bright">
                                <div class="card-actionbar-row" style="text-align: left">
                                    <button type="submit" onclick="return confirm('Удаление доставки - Вы уверены? Восстановить будет невозможно')" class="btn btn-flex ink-reaction btn-warning">
                                        Удалить способ доставки
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    function forceLower(strInput) {
        strInput.value = strInput.value.toLowerCase();
    }
    document.addEventListener('DOMContentLoaded', function() {
        $('#attrName').select2({
            allowClear: true,
            minimumInputLength: 1,
            ajax: {
                url: '{{ route('admin_product_attributes_search') }}',
                data: function (params) {
                    var query = {
                        query: params,
                    }
                    return query;
                },
                results: function (data, params) {
                    return {
                        results: data,
                        "pagination": {
                            "more": false
                        }
                    };
                },
                cache: true
            }
        });
        $('.add-attribute').on('click', function () {
            let attrId = $('#attrName').val();
            if(!attrId) {
                return;
            }
            let attrName = $('#createAttr').find('.select2-chosen').text();
            let attrVal = $('#attrVal').val();
            if (!attrVal) {
                return;
            }
            deleteAttr(attrId);
            let createdAttribute = $('.attr-row-template')
                .clone()
                .appendTo('#attrSet');
            createdAttribute.attr('data-attr-id', attrId);
            createdAttribute.removeClass('attr-row-template');
            createdAttribute.addClass('attr-row-' + attrId);
            let inputId = 'attr-' + attrId;
            createdAttribute.find('.attr-value').val(attrVal);
            createdAttribute.find('.attr-value').attr('id', inputId);
            createdAttribute.find('.attr-value').attr('name', 'attr[' + attrId + ']');
            createdAttribute.find('.attr-name').text(attrName);
            createdAttribute.find('.attr-name').attr('for', inputId);
            createdAttribute.css('display', 'block');
            $('#attrName').val(null).trigger('change');
            $('#attrVal').val('');
            $('#createAttr').find('.select2-chosen').text('');
        });

        function deleteAttr(attrId) {
            $('.attr-row-' + attrId).remove();
        }

        $('#attrSet').on('click', '.delete-attr', function () {
            let attrId = $(this).closest('.attr-row').data('attr-id');
            console.log(attrId);
            deleteAttr(attrId);
        })

        $('#mySelect2').on('change', function (e) {
        });

        $('.select2-list').on('change', function (e) {
            let breadcrumbsField = $('#breadcrumbs');
            breadcrumbsField.text('');
            let categoryId = $(this).val();
            if (!categoryId) {
                return;
            }
            let url = "{{ route('admin_category_breadcrumbs', 'CATID') }}";
            url = url.replace('CATID', categoryId);
            $.ajax({
                type: 'GET',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                contentType: 'application/json',
                success: res => {
                    breadcrumbsField.text(res.join(' / '))
                },
                error: e => {
                    console.log(e)
                }
            });
        });
    })
</script>
<x-admin.footer/>

