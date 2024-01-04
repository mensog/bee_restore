<x-admin.header/>

<div id="content">
    <section>
        <div class="section-body">
            <h2>Работа парсера</h2>
            <p>Собрано товаров: {{ $total }}</p>
            <p>Леруа Мерлен: {{ $products[1] ?? 0 }}</p>
            <p>Оби: {{ $products[2] ?? 0 }}</p>
            <p>Петрович: {{ $products[3] ?? 0 }}</p>
            <p>Castorama: {{ $products[4] ?? 0 }}</p>
        </div>
    </section>
</div>

<x-admin.footer/>

