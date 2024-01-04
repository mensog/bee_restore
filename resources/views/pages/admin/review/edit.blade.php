<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">

            <form id="updateReview" class="form"
                  action="{{ route('admin_review_update', $review->id) }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                <div class="card card-bordered style-default-light no-shadow">
                    <div class="card-head">
                        <header>
                            Редактирование отзыва № {{ $review->id }} на товар "{{ $review->product->name }}"
                        </header>
                    </div>

                    <div class="card-body style-default-bright floating-label">

                        <div class="row">
                            <div class="col-lg-6">
                                <p>Оценка: {{ $review->rating }}/5</p>
                                <p>Дата отправки: {{ date('d.m.Y H:i', strtotime($review->created_at)) }}</p>
                                <p>Имя автора: {{ $review->user->full_name }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <textarea type="text" name="advantages"
                                           class="form-control"
                                           id="advantages">{{ old('advantages') ?? $review->advantages }}</textarea>
                                    @error('advantages')
                                    <span class="text-danger invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="advantages">Достоинства</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <textarea type="text" name="disadvantages"
                                           class="form-control"
                                           id="disadvantages">{{ old('disadvantages') ?? $review->disadvantages }}</textarea>
                                    @error('disadvantages')
                                    <span class="text-danger invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="disadvantages">Недостатки</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <textarea type="text" name="comment"
                                           class="form-control"
                                           id="comment">{{ old('comment') ?? $review->comment }}</textarea>
                                    @error('comment')
                                    <span class="text-danger invalid-field" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="comment">Комментарий</label>
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

            <form id="deleteReview" class="form"
                  action="{{ route('admin_review_delete', $review->id) }}" method="post">
                @csrf
                <div class="card card-bordered style-default-light no-shadow">
                    <div class="card-head">
                        <header>
                            Удаление отзыва
                        </header>
                    </div>

                    <div class="card-actionbar style-default-bright">
                        <div class="card-actionbar-row" style="text-align: left">
                            <button type="submit" onclick="return confirm('Удаление отзыва - Вы уверены? Восстановить будет невозможно')" class="btn btn-flex ink-reaction btn-warning">
                                Удалить отзыв
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
    })
</script>

<x-admin.footer/>

