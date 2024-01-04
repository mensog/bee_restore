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

                    <form id="productForm" class="form" action="{{ route('admin_create_product') }}" method="post">
                        @csrf
                        <div class="card card-bordered style-default-light no-shadow">

                            <div class="card-head">
                                <header>
                                    Добавление товара
                                </header>
                            </div>

                            <div class="card-body style-default-bright floating-label">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select id="partnerId" name="partnerId" class="form-control select2-partner" data-placeholder="Выберите партнера">
                                                <option selected disabled>

                                                </option>
                                                @foreach($partners as $partner)
                                                    <option value="{{ $partner->id }}">
                                                        {{ $partner->company_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label for="partnerId">Выберите партнера</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select id="moderation" name="moderation" class="form-control" required>
                                                <option value="" disabled selected></option>
                                                <option value="{{ \App\ProductModerationStatus::WAITING }}">{{ __('product_moderation_status.' . \App\ProductModerationStatus::WAITING) }}</option>
                                                <option value="{{ \App\ProductModerationStatus::DONE }}">{{ __('product_moderation_status.' . \App\ProductModerationStatus::DONE) }}</option>
                                                <option value="{{ \App\ProductModerationStatus::REJECTED }}">{{ __('product_moderation_status.' . \App\ProductModerationStatus::REJECTED) }}</option>
                                            </select>
                                            <label for="moderation">Модерация</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" id="name" required>
                                            <label for="name">Название товара</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="checkbox" id="visible" name="visible" class="form-control">
                                            <label for="status">Видимость</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="friendlyUrlName" class="form-control" id="friendlyUrlName" onkeyup="return forceLower(this);" required>
                                            <label for="friendlyUrlName">ЧПУ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select name="categoryId" class="form-control select2-list" data-placeholder="Выберите категорию">
                                                @foreach($categories as $category)
                                                <option value="{{$category->id}}">
                                                    {{ $category->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label>Выберите категорию</label>
                                            <div id="breadcrumbs"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="number" name="price" class="form-control" id="price" data-rule-digits="true" required>
                                            <label for="price">Стоимость товара (руб)</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <textarea name="description" id="description" class="form-control"
                                              rows="2"></textarea>
                                    <label for="description">Описание</label>
                                </div>
                                <div class="form-group">
                                    <input type="file" data-max-files="3" multiple
                                           id="createProductImage">
                                </div>
                            </div>

                            <div class="card-actionbar style-default-bright">
                                <div class="card-actionbar-row" style="text-align: left">
                                    <button type="submit" class="btn btn-flex ink-reaction btn-warning">
                                        Опубликовать
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="panel-group" id="accordion-attrs">
                        <div class="card panel" id="createAttr">
                            <div class="card-head collapsed" data-toggle="collapse" data-parent="#accordion-attrs"
                                 data-target="#accordion-attrs-1" aria-expanded="false">
                                <header>
                                    Редактирование атрибутов
                                </header>
                                <div class="tools">
                                    <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
                                </div>
                            </div>
                            <div id="accordion-attrs-1" class="collapse" aria-expanded="false" style="height: 0px;">
                                <div class="card-body no-shadow floating-label">
                                    <div id="attrSet" class="row">
                                        <x-admin.product.attribute isTemplate="1"/>
                                    </div>
                                    <div class="row">
                                        <div class="card-body floating-label">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input name="attrName" class="form-control" id="attrName" required>
                                                    <label for="attrName">Название атрибута</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <input type="text" name="attrVal" class="form-control" id="attrVal">
                                                    <label for="attrVal">Значение атрибута</label>
                                                </div>
                                            </div>
                                            <input type="button" value="Добавить атрибут" class="btn btn-block ink-reaction btn-warning add-attribute">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

