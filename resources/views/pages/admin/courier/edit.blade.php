<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">

            <form id="productForm" class="form"
                  action="{{ route('admin_update_courier', $courier->id) }}"
                  method="post">
                @csrf
                <div class="card card-bordered style-default-light no-shadow">

                    <div class="card-head">
                        <header>
                            {{ $courier->full_name }}
                        </header>
                    </div>

                    <div class="card-body style-default-bright floating-label">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="fullName"
                                           class="form-control"
                                           id="fullName"
                                           value="{{ old('fullName') ?? $courier->full_name}}"
                                           required>
                                    <label for="fullName">ФИО курьера</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="phone"
                                           class="form-control"
                                           id="phone"
                                           value="{{ old('phone') ?? $courier->phone}}"
                                           required>
                                    <label for="phone">Телефон</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="carSize"
                                           class="form-control"
                                           id="carSize"
                                           value="{{ old('carSize') ?? $courier->car_size}}"
                                    required>
                                    <label for="CarSize">Размер машины</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="commission"
                                           class="form-control"
                                           id="commission"
                                           value="{{ old('commission') ?? $courier->commission}}"
                                           required>
                                    <label for="commission">Условия сотрудничества</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-actionbar style-default-bright">
                        <div class="card-actionbar-row" style="text-align: left">
                            <button type="submit" class="btn btn-flex ink-reaction btn-warning">
                                Сохранить изменения
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
</div>

<x-admin.footer/>

