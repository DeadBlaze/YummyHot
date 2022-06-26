jQuery(function($){

    // показать html форму при нажатии кнопки «создать товар»
    $(document).on("click", ".create-product-button", function() {
        // загрузка списка категорий
$.getJSON("https://yammyhot.ru/admin/api/product/read.php", function(data) {
    var create_product_html=`
    <!-- кнопка для показа всех товаров -->
    <div id="read-products" class="btn btn-primary pull-right m-b-15px read-products-button">
        <span class="glyphicon glyphicon-list"></span> Все товары
    </div>
    <!-- html форма «Создание товара» -->
    <form id="create-product-form" action="#" method="post" border="0">
    <table class="table table-hover table-responsive table-bordered">

        <tr>
            <td>id</td>
            <td><input type="number" min="1" name="id" class="form-control" required /></td>
        </tr>

        <tr>
            <td>Название</td>
            <td><input type="text" name="name" class="form-control" required /></td>
        </tr>

        <tr>
            <td>Цена</td>
            <td><input type="number" min="1" name="price" class="form-control" required /></td>
        </tr>

        <tr>
        <td>Имя и формат изображения</td>
        <td><input type="text" name="img" class="form-control" required /></td>
        </tr>

        <tr>
            <td>id категории</td>
            <td><input type="number" min="1" name="category_id" class="form-control" required /></td>
        </tr>

        <!-- кнопка отправки формы -->
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Создать товар
                </button>
            </td>
        </tr>

    </table>
</form>`;
// вставка html в «page-content» нашего приложения
$("#page-content").html(create_product_html);

// изменяем тайтл
changePageTitle("Создание товара");
});
    });
// будет работать, если создана форма товара
$(document).on("submit", "#create-product-form", function(){
    // получение данных формы
    var form_data=JSON.stringify($(this).serializeObject());

    // отправка данных формы в API
    $.ajax({
        url: "https://yammyhot.ru/admin/api/product/create.php",
        type : "POST",
        contentType : "application/json",
        data : form_data,
        success : function(result) {
            // продукт был создан, вернуться к списку продуктов
            showProducts();
        },
        error: function(xhr, resp, text) {
            // вывести ошибку в консоль
            console.log(xhr, resp, text);
        }
    });
    
    return false;
});
});