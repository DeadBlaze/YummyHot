'use strict';

// Модуль каталога
var catalog = (function($) {

    // Инициализация модуля
    function init() {
        _render();
    }

    // Рендерим каталог горячих блюд
    function _render() {
        var template = _.template($('#catalog-template').html()),
            $goods = $('#goods_hot');

            $.getJSON('data/goods_hot.json', function(data) {
            
            $goods.html(template({goods: data}));

            $goods = $('#goods_cupcake');

            $.getJSON('data/goods_cupcake.json', function(data) {
                $goods.html(template({goods: data}));
         

            $goods = $('#goods_beverage');

            $.getJSON('data/goods_beverage.json', function(data) {
                $goods.html(template({goods: data}));
            

            $goods = $('#goods_food-container');

            $.getJSON('data/goods_food-container.json', function(data) {
                $goods.html(template({goods: data}));
            

            $goods = $('#goods_salad');

            $.getJSON('data/goods_salad.json', function(data) {
                $goods.html(template({goods: data}));
            });
        });
        });
        });
        });
    }


     

    // Экспортируем наружу
    return {
        init: init
    }
    
})(jQuery);