jQuery(function($) {

    // будет работать, если была нажата кнопка удаления
    $(document).on("click", ".delete-product-button", function() {
        // получение ID товара
        var product_id = $(this).attr("data-id");
        
            // отправим запрос на удаление в API / удаленный сервер
            $.ajax({
                url: "https://yammyhot.ru/admin/api/product/delete.php",
                type : "POST",
                dataType : "json",
                data : JSON.stringify({ id: product_id }),
                success : function(result) {
        
                    // покажем список всех товаров
                    showProducts();
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
});
});
