<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModal"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
                <h4 class="modal-title" id="formModalLabel">Удаление</h4>
            </div>
            <div class="modal-body">
                <p>Вы действительно хотите удалить <span id="deleteModalFormText"></span>?</p>
            </div>
            <div class="modal-footer">
                <form id="deleteModalForm" action="" class="form" method="post">
                    @csrf
                    <button onclick="event.preventDefault()" type="button" class="btn btn-default"
                            data-dismiss="modal">Отменить
                    </button>
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script type="text/javascript" src="{{ mix('js/admin/app.js') }}"></script>
</body>
