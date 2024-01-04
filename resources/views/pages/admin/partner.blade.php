<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card card-bordered style-default-light no-shadow order-info">
                        <ul class="card-head nav nav-tabs nav-justified" data-toggle="tabs">
                            <li class="active">
                                <a href="#first1">{{ $partner->company_name }}</a>
                            </li>
                            <li>
                                <a href="#second1">Изменить</a>
                            </li>
                        </ul>
                        <div class="card-body style-default-bright tab-content">
                            <div class="tab-pane active" id="first1">
                                <div>
                                    ФИО
                                    <span class="pull-right">
                                   {{ $partner->full_name }}
                                </span>
                                </div>
                                <div>
                                    Телефон
                                    <span class="pull-right">
                                   {{ $partner->phone }}
                                </span>
                                </div>
                                <div>
                                    Адрес склада
                                    <span class="pull-right">
                                   {{ $partner->address }}
                                </span>
                                </div>
                                <div>
                                    Юр. адрес
                                    <span class="pull-right">
                                   {{ $partner->address }}
                                </span>
                                </div>
                                <div>
                                    ИНН
                                    <span class="pull-right">

                                </span>
                                </div>
                                <div>
                                    КПП
                                    <span class="pull-right">

                                </span>
                                </div>
                                <div>
                                    Расчетный счет
                                    <span class="pull-right">

                                </span>
                                </div>
                                <div>
                                    Название филиала банка
                                    <span class="pull-right">

                                </span>
                                </div>
                                <div>
                                    Корр. счет
                                    <span class="pull-right">

                                </span>
                                </div>
                                <div>
                                    БИК
                                    <span class="pull-right">

                                </span>
                                </div>
                                <div>
                                    Условие сотрудничества
                                    <span class="pull-right">
                                   {{ $partner->commission }}%
                                </span>
                                </div>
                                <div class="btn-group" style="margin-top: 15px;" data-toggle="buttons">
                                    <label class="btn ink-reaction btn-primary">
                                        <input type="radio" name="options" id="option1"><i class="md md-done"></i>
                                        Включен
                                    </label>
                                    <label class="btn ink-reaction btn-primary active">
                                        <input type="radio" name="options" id="option3"><i
                                            class="md md-highlight-remove"></i> Выключен
                                    </label>
                                </div>
                            </div>
                            <div class="tab-pane floating-label" id="second1">
                                <form class="form" action="">
                                    <div class="form-group">
                                        <input type="text" name="fullName" value="{{ $partner->full_name }}"
                                               class="form-control" id="fullName">
                                        <label for="fullName">ФИО</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" value="{{ $partner->phone }}"
                                               class="form-control" id="phone">
                                        <label for="phone">Телефон</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address" value="{{ $partner->address }}"
                                               class="form-control" id="address">
                                        <label for="address">Адрес склада</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="address" value="{{ $partner->address }}"
                                               class="form-control" id="address">
                                        <label for="address">Юр. адрес</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="inn" class="form-control" id="inn">
                                        <label for="inn">ИНН</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="kpp" class="form-control" id="kpp">
                                        <label for="kpp">КПП</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="check" class="form-control" id="check">
                                        <label for="check">Расчетный счет</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="bank" class="form-control" id="bank">
                                        <label for="bank">Название филиала банка</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="corr-check" class="form-control" id="corr-check">
                                        <label for="corr-check">Корр. счет</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="bik" class="form-control" id="bik">
                                        <label for="bik">БИК</label>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" name="commission" value="{{ $partner->commission }}"
                                               class="form-control" id="commission">
                                        <label for="commission">Условие сотрудничества (%)</label>
                                    </div>
                                    <button type="submit" class="btn btn-block ink-reaction btn-warning"
                                            style="margin-top: 15px;">
                                        Сохранить изменения
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="table-responsive">
                        <table id="datatable1" class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Артикул</th>
                                <th class="sort-alpha">Название</th>
                                <th class="sort-numeric">Стоимость</th>
                                <th class="sort-alpha">Категория</th>
                                <th>Посл. изменение</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($partner->products ?? '')
                                @foreach($partner->products as $product)
                                    <tr class="gradeX clickable-row"
                                        data-href="{{ route('product', ['name' => $product->friendly_url_name, 'storeSlug' => $partner->slug]) }}">
                                        <td>
                                            <a href="{{ route('product', ['name' => $product->friendly_url_name, 'storeSlug' => $partner->slug]) }}">
                                                {{ $product->sku }}
                                            </a>
                                        </td>
                                        <td data-toggle="tooltip" data-placement="bottom"
                                            data-trigger="hover"
                                            data-original-title="{{ $product->name }}">
                                            {{ Str::limit($product->name, 25) }}
                                        </td>
                                        <td>{{ $product->price / 100 }} руб</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ date('d.m.Y H:i',strtotime($product->updated_at)) }}</td>
                                        <td class="remove">
                                            <x-admin.remove-with-modal
                                                type="icon"
                                                :action="route('product', ['name' => $product->friendly_url_name, 'storeSlug' => $partner->slug])"
                                                :text="$product->name">
                                            </x-admin.remove-with-modal>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<x-admin.footer/>

