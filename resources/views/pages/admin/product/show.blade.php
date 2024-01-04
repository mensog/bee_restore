<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">
            <div class="row">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-lg-3">
                    <div class="card card-bordered style-default-light no-shadow">
                        <div class="card-head">
                            <header>
                                Партнер
                            </header>
                        </div>
                        <div class="card-body style-default-bright">
                            <div>
                                Название партнера
                                <span class="pull-right">
                                    {{ $product->store->company_name }}
                                </span>
                            </div>
                            <div>
                                ФИО
                                <span class="pull-right">
                                    {{ $product->store->full_name }}
                                </span>
                            </div>
                            <div>
                                Телефон
                                <span class="pull-right">
                                    {{ $product->store->phone }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="panel-group" id="accordion1" style="display: none">
                        <div class="card panel">
                            <div class="card-head collapsed" data-toggle="collapse" data-parent="#accordion1"
                                 data-target="#accordion1-1" aria-expanded="false">
                                <header>Парсер выключен</header>
                                <div class="tools">
                                    <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
                                </div>
                            </div>
                            <div id="accordion1-1" class="collapse" aria-expanded="false" style="height: 0px;">
                                <div class="card-body">
                                    <div>
                                        Дата обновления
                                        <span class="pull-right">
                                            {{ date('d.m.Y H:i',strtotime($product->last_parse)) }}
                                        </span>
                                    </div>
                                    <form action="" class="form" method="">
                                        <div class="btn-group mb"
                                             style="margin-bottom: 15px; margin-top: 15px;"
                                             data-toggle="buttons">
                                            <label class="btn ink-reaction btn-default">
                                                <input type="radio" class="parserToggle" name="parserOn"
                                                       id="parserOn"><i
                                                    class="md md-done "></i>
                                                Вкл
                                            </label>
                                            <label class="btn ink-reaction btn-default">
                                                <input type="radio" class="parserToggle" name="parserOff" checked
                                                       id="parserOff"><i
                                                    class="md md-highlight-remove"></i> Выкл
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-styled">
                                            <label>
                                                <input id="parseTitle" class="parserOption" name="parseTitle"
                                                       type="checkbox">
                                                <span>Парсить заголовок</span>
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-styled">
                                            <label>
                                                <input id="parseDesc" class="parserOption" name="parseDesc"
                                                       type="checkbox">
                                                <span>Парсить описание</span>
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-styled">
                                            <label>
                                                <input id="parseImage" class="parserOption" name="parseImage"
                                                       type="checkbox">
                                                <span>Парсить картинки</span>
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-styled">
                                            <label>
                                                <input id="parseAttr" class="parserOption" name="parseAttr"
                                                       type="checkbox">
                                                <span>Парсить атрибуты</span>
                                            </label>
                                        </div>
                                        <div class="checkbox checkbox-styled">
                                            <label>
                                                <input id="parsePrice" class="parserOption" name="parsePrice"
                                                       type="checkbox">
                                                <span>Парсить цену</span>
                                            </label>
                                        </div>
                                        <button class="btn btn-block ink-reaction btn-warning">
                                            Сохранить
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <form id="productForm" class="form"
                          action="{{ route('admin_product_update', $product->id) }}"
                          method="post">
                        @csrf
                        <div class="card card-bordered style-default-light no-shadow">
                            <div class="card-head">
                                <header>
                                    {{ $product->name }}
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
                                                    <option value="{{ $partner->id }}"{{ ($partner->id == $product->store_id) ? ' selected' : '' }}>
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
                                                <option value="{{ \App\Models\ProductModerationStatus::WAITING }}"{{ ($product->moderation == \App\Models\ProductModerationStatus::WAITING) ? ' selected' : '' }}>{{ __('product_moderation_status.' . \App\Models\ProductModerationStatus::WAITING) }}</option>
                                                <option value="{{ \App\Models\ProductModerationStatus::DONE }}"{{ ($product->moderation == \App\Models\ProductModerationStatus::DONE) ? ' selected' : '' }}>{{ __('product_moderation_status.' . \App\Models\ProductModerationStatus::DONE) }}</option>
                                                <option value="{{ \App\Models\ProductModerationStatus::REJECTED }}"{{ ($product->moderation == \App\Models\ProductModerationStatus::REJECTED) ? ' selected' : '' }}>{{ __('product_moderation_status.' . \App\Models\ProductModerationStatus::REJECTED) }}</option>
                                            </select>
                                            <label for="moderation">Модерация</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="name" value="{{ $product->name }}"
                                                   class="form-control"
                                                   id="name" required>
                                            <label for="name">Название товара</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="checkbox" id="visible" name="visible" class="form-control"{{ ($product->visible) ? ' checked' : '' }}>
                                            <label for="status">Видимость</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="friendlyUrlName" class="form-control" id="friendlyUrlName" onkeyup="return forceLower(this);" value="{{ $product->friendly_url_name }}" required>
                                            <label for="friendlyUrlName">ЧПУ</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <select name="categoryId" class="form-control select2-list" data-placeholder="Выберите категорию">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}"{{ ($product->category_id == $category->id) ? ' selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <label>Выберите категорию</label>
                                            <div id="breadcrumbs">{{ $categoryBreadcrumbs }}</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="price" value="{{ $product->price / 100 }}"
                                                   class="form-control" id="price" data-rule-digits="true" required>
                                            <label for="price">Стоимость товара (руб)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea name="description" id="description" class="form-control"
                                              rows="2">{{ $product->description }}</textarea>
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
                                        Сохранить
                                    </button>
                                    {{--<x-admin.remove-with-modal--}}
                                        {{--type="button"--}}
                                        {{--:action="route('admin_product', $product->friendly_url_name)"--}}
                                        {{--:text="$product->name">--}}
                                    {{--</x-admin.remove-with-modal>--}}
                                </div>
                            </div>
                        </div>
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
                                            @if($attributes)
                                                @foreach($attributes as $attribute)
                                                    <x-admin.product.attribute
                                                            isTemplate="0"
                                                            id="{{ $attribute['id'] }}"
                                                            name="{{ $attribute['name'] }}"
                                                            value="{{ $attribute['value'] }}"
                                                    />
                                                @endforeach
                                            @endif
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
                    </form>
                    <div class="panel-group" id="accordion2">
                        <div class="card panel">
                            <div class="card-head collapsed" data-toggle="collapse" data-parent="#accordion2"
                                 data-target="#accordion2-1" aria-expanded="false">
                                <header>Отзывы</header>
                                <div class="tools">
                                    <a class="btn btn-icon-toggle"><i class="fa fa-angle-down"></i></a>
                                </div>
                            </div>
                            <div id="accordion2-1" class="collapse" aria-expanded="false" style="height: 0px;">
                                <div class="card-body no-shadow">
                                    <div class="table-responsive" style="overflow: visible">
                                        <table id="orders" class="table table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="sort-numeric">id</th>
                                                <th class="sort-numeric">Дата</th>
                                                <th class="sort-alpha">Автор</th>
                                                <th class="sort-alpha">Отзыв</th>
                                                {{--TODO ограничение комментария + тултип--}}
                                                <th class="sort-numeric">Оценка</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($product->reviews->sortByDesc('created_at') as $review)
                                            <tr>
                                                <td>{{ $review->id }}</td>
                                                <td>{{ date('d.m.Y H:i', strtotime($review->created_at)) }}</td>
                                                <td>{{ $review->user->full_name }}</td>
                                                <td>
                                                    <div>
                                                        <p class="font-italic">Достоинства:</p>
                                                        <p>{{ $review->advantages }}</p>
                                                    </div>
                                                    <div>
                                                        <p class="font-italic">Недостатки:</p>
                                                        <p>{{ $review->disadvantages }}</p>
                                                    </div>
                                                    <div>
                                                        <p class="font-italic">Комментарий:</p>
                                                        <p>{{ $review->comment }}</p>
                                                    </div>
                                                </td>
                                                <td>{{ $review->rating }}/5</td>
                                                <td data-toggle="tooltip" data-placement="bottom"
                                                    data-trigger="hover"
                                                    data-original-title="Редактировать">
                                                    <a href="{{ route('admin_review_update_page', $review->id) }}">
                                                        <i class="md md-edit"></i>
                                                    </a>
                                                </td>
                                                <td data-toggle="tooltip" data-placement="bottom"
                                                    data-trigger="hover"
                                                    data-original-title="Удалить">
                                                    <x-admin.remove-with-modal
                                                        type="icon"
                                                        action="{{ route('admin_review_delete', $review->id) }}"
                                                        :text="'отзыв'">
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

