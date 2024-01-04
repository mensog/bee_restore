<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">

            <div class="card no-shadow">
                <div class="card-head">
                    <header>
                        Структура категорий
                    </header>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8"></div>
                        <div class="col-lg-4 mb-3">
                            <a href="{{ route('admin_create_category') }}" class="btn btn-block ink-reaction btn-info" type="button">Добавить новую категорию</a>
                        </div>
                        <div class="col-lg-12">
                            <div class="dd nestable-list">
                                <ol class="dd-list">
                                @foreach($rootCategory as $category)
                                <x-admin.category.category-block
                                        :categories=$categories id="{{ $category['id'] }}"
                                        name="{{ $category['name'] }}"
                                        friendlyUrl="{{ $category['friendly_url_name'] }}"
                                        parentId="0"
                                />
                                @endforeach
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('.dd').on('change', function(e) {
            let result = findEditedCategory($('.dd').nestable('serialize'), 0);
            if (result) {
                $("li[data-id='" + result.id + "']").data('parent-id', result.newParent);
                let data = {
                    parent: result.newParent
                };
                let url = "{{ route('admin_category_update_parent', 'CATID') }}";
                url = url.replace('CATID', result.id);
                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: JSON.stringify(data),
                    contentType: 'application/json',
                    success: res => {

                    },
                    error: e => {
                        console.log(e)
                    }
                })
            }
        });
    });

    function findEditedCategory(categories, currentParent) {
        for (let i = 0; i < categories.length; i++) {
            if (categories[i].parentId !== currentParent) {
                let result = {
                    id: categories[i].id,
                    newParent: currentParent
                };
                return result;
            }
            if (categories[i].children !== undefined) {
                let result = findEditedCategory(categories[i].children, categories[i].id);
                if (result !== undefined) {
                    return result;
                }
            }
        }
    }
</script>

<x-admin.footer/>
