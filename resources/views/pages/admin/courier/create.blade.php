<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">

            <form id="productForm" class="form"
                  action="{{ route('admin_create_courier') }}"
                  method="post">
                @csrf
                <div class="card card-bordered style-default-light no-shadow">

                    <div class="card-head">
                        <header>
                            Новый курьер
                        </header>
                    </div>

                    <div class="card-body style-default-bright floating-label">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="fullName"
                                           class="form-control"
                                           id="fullName" required>
                                    <label for="fullName">ФИО курьера</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="phone"
                                           class="form-control"
                                           id="phone" required>
                                    <label for="phone">Телефон</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="carSize"
                                           class="form-control"
                                           id="carSize">
                                    <label for="CarSize">Размер машины</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="commission"
                                           class="form-control"
                                           id="commission" required>
                                    <label for="commission">Условия сотрудничества</label>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="card-actionbar style-default-bright">
                        <div class="card-actionbar-row" style="text-align: left">
                            <button type="submit" class="btn btn-flex ink-reaction btn-warning">
                                Добавить курьера
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
</div>

<x-admin.footer/>

