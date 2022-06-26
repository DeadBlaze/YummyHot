jQuery(function($) {

    // обрабатываем нажатие кнопки «Просмотр товара»
    $(document).on("click", ".read-one-product-button", function() {
        // get product id
        var id = $(this).attr("data-id");
        // чтение записи товара на основе данного идентификатора
        $.getJSON("https://yammyhot.ru/admin/api/product/read.php" + id, function(data) {
       // начало html
        var read_one_product_html=`
        <!-- при нажатии будем отображать список товаров -->
        <div id="read-products" class="btn btn-primary pull-right m-b-15px read-products-button">
        <span class="glyphicon glyphicon-list"></span> Все товары
        </div>
        <!-- полные данные о товаре будут показаны в этой таблице -->
        <table class="table table-bordered table-hover">

        <tr>
        <td>id</td>
        <td>` + data.id + `</td>
        </tr>

        <tr>
        <td class="w-30-pct">Название</td>
        <td class="w-70-pct">` + data.name + `</td>
        </tr>

        <tr>
        <td>Цена</td>
        <td>` + data.price + `</td>
        </tr>

        <tr>
        <td>Путь к картинке</td>
        <td>` + data.img + `</td>
        </tr>

</table>`;
// вставка html в «page-content» нашего приложения
$("#page-content").html(read_one_product_html);

// изменяем заголовок страницы
changePageTitle("Просмотр товара");
});
    });

});