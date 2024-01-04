<x-header/>

<main id="content" role="main">
    <div class="container mt-3">
        <div class="mb-4">
            <h1 class="text-center">{{ is_null($page) ? $pageName : $page->title }}</h1>
        </div>
        <div class="mb-10">
            {{ is_null($page) ? "Запись \"$pageName\" ($dbPageName) не добавлена" : $page->content }}
        </div>
    </div>
</main>

<x-footer/>
