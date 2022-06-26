// html список товаров
function readProductsTemplate(data, keywords) {

    var read_products_html=`
        <!-- при нажатии загружается форма создания продукта -->
        <div id="create-product" class="btn btn-primary pull-right m-b-15px create-product-button">
            <span class="glyphicon glyphicon-plus"></span> Создать товар
        </div>

        <!-- начало таблицы -->
        <table class="table table-bordered table-hover">

            <!-- создание заголовков таблицы -->
            <tr>
            <th class="w-5-pct">id</th>
            <th class="w-15-pct">Название</th>
            <th class="w-10-pct">Цена</th>
            <th class="w-15-pct">Картинка</th>
            <th class="w-5-pct">id категории</th>
            <th class="w-5-pct text-align-center">Действие</th>
            </tr>`;

    // перебор возвращаемого списка данных
    $.each(data.records, function(key, val) {

        // создание новой строки таблицы для каждой записи
        read_products_html+=`<tr>

            <td>` + val.id + `</td>
            <td>` + val.name + `</td>
            <td>` + val.price + `</td>
            <td>` + val.img+ `</td>
            <td>` + val.category_id+ `</td>

            <!-- кнопки "действий" -->
            <td>
                <!-- кнопка для удаления товара -->
                <button class="btn btn-danger delete-product-button" data-id="` + val.id + `">
                    <span class="glyphicon glyphicon-remove"></span> Удалить
                </button>
            </td>
        </tr>`;
    });

    // конец таблицы
    read_products_html+=`</table>`;

    // добавим в «page-content» нашего приложения
    $("#page-content").html(read_products_html);
}