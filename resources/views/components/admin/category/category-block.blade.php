<li class="dd-item" data-id="{{ $id }}" data-parent-id="{{ $parentId }}">
    <div class="dd-handle btn btn-default-light">
        <div style="display: flex; justify-content: space-between">
            <div>{{$id}} {{ $name }} ({{ $friendlyUrl }})</div>
            <div class="dd-nodrag"><a href="{{ route('admin_edit_category_page', $id) }}">Редактировать</a></div>
        </div>
    </div>
    @isset($categories[$id])
    @foreach($categories[$id] as $childCategory)
    <ol class="dd-list">
    <x-admin.category.category-block
            :categories=$categories id="{{ $childCategory['id'] }}"
            name="{{ $childCategory['name'] }}"
            friendlyUrl="{{ $childCategory['friendly_url_name'] }}"
            parentId="{{ $id }}"
    />
    </ol>
    @endforeach
    @endisset
</li>


