jQuery(function($){

    // показать список товаров при первой загрузке
    showProducts();

    // при нажатии кнопки
    $(document).on("click", ".read-products-button", function(){
    showProducts();
});
});

// функция для отображения списка товаров
function showProducts() {

    // получаем список товаров из API
    $.getJSON("https://yammyhot.ru/admin/api/product/read.php", function(data){

        // HTML для перечисления товаров
        readProductsTemplate(data, "");

        // изменяем заголовок страницы
        changePageTitle("Все товары");

    });
}