@if($type && $type === 'button')
    <a href="#" class="btn btn-flex btn-danger ink-reaction"
       data-action="{{ $action }}"
       data-text="{{ $text }}"
       data-toggle="modal" data-target="#deleteModal">
        Удалить
    </a>
@else
    <a href="#" class="btn btn-flat ink-reaction btn-danger"
       data-action="{{ $action }}"
       data-text="{{ $text }}"
       data-toggle="modal" data-target="#deleteModal">
        <i class="fa fa-trash"></i>
    </a>
@endif

