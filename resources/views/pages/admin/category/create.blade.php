<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">

            <form id="createCategory" class="form" action="{{ route('admin_create_category') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-bordered style-default-light no-shadow">
                    <div class="card-head">
                        <header>
                            Добавление категории
                        </header>
                    </div>

                    <div class="card-body style-default-bright floating-label">

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="name"
                                           class="form-control"
                                           id="name"
                                           value="{{ old('name') }}"
                                           required>
                                    @error('name')
                                    <span class="text-danger invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="name">Название</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="friendlyUrlName"
                                           class="form-control"
                                           id="friendlyUrlName"
                                           value="{{ old('friendlyUrlName') }}"
                                           required>
                                    <label for="friendlyUrlName">ЧПУ</label>
                                    @error('friendlyUrlName')
                                    <span class="text-danger invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="checkbox" name="visible"
                                           class="form-control"
                                           id="visible"
                                           value="1"
                                           {{ (old('visible')) ? ' checked' : '' }}>
                                    <label for="visible">Видимость в каталоге</label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <select class="form-control select2-category" id="parent" name="parent" required>
                                        <option value="0">Нет</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}"{{ ($category->id == old('categoryId')) ? ' selected' : '' }}>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <label for="parent">Родительская категория</label>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="categoryIcon">Иконка (в формате svg)</label>
                                    <input type="file" name="icon" id="categoryIcon">
                                    @error('icon')
                                    <span class="text-danger invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-actionbar style-default-bright">
                        <div class="card-actionbar-row" style="text-align: left">
                            <button type="submit" class="btn btn-flex ink-reaction btn-warning">
                                Добавить категорию
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </section>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('input').on('input', function () {
            $(this).siblings('.invalid-field').hide();
        });

        $('.select2-category').select2({
            allowClear: true,
        });
    })
</script>

<x-admin.footer/>

