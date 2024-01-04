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

                    <form id="productForm" class="form" method="post">
                        @csrf
                        <div class="card card-bordered style-default-light no-shadow">

                            <div class="card-head">
                                <header>
                                    Редактирование промокода "{{ $promocode->name }}"
                                </header>
                            </div>

                            <div class="card-body style-default-bright floating-label">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" id="name" value="{{ $promocode->name }}" required>
                                            <label for="name">Название промокода</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input type="text" id="amount" name="amount" class="form-control" value="{{ $promocode->amount / 100 }}" required>
                                            <label for="amount">Размер скидки</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-actionbar style-default-bright">
                                <div class="card-actionbar-row" style="text-align: left">
                                    <button type="submit" formaction="{{ route('admin_promocode_update', $promocode->id) }}" class="btn btn-flex ink-reaction btn-warning">
                                        Сохранить
                                    </button>
                                </div>
                                <div class="card-actionbar-row" style="text-align: left">
                                    <button type="submit" formaction="{{ route('admin_promocode_delete', $promocode->id) }}" class="btn btn-flex ink-reaction btn-danger">
                                        Удалить
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
    document.addEventListener('DOMContentLoaded', function() {

    })
</script>
<x-admin.footer/>

