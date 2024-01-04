<div data-attr-id="{{ $id }}" class="col-lg-6 attr-row{{($isTemplate)? ' attr-row-template' : ' attr-row-' .$id}}"@if($isTemplate) style="display: none;"@endif>
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-content">
                <input type="text" value="{{ $value }}" name="attr[{{ $id }}]" class="form-control attr-value dirty" id="attr-{{ $id }}">
                <label class="attr-name" for="attr-{{ $id }}">{{ $name }}</label>
            </div>
            <div class="input-group-btn">
                <button class="btn btn-flat btn-danger btn-default delete-attr" type="button">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        </div>
    </div>
</div>
