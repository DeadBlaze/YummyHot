'use strict';
 
// Модуль каталога для работы с БД
var catalogDB = (function($) {
 
    var ui = {
        $form: $('#filters-form'),
        $prices: $('#prices'),
        $pricesLabel: $('#prices-label'),
        $minPrice: $('#min-price'),
        $maxPrice: $('#max-price'),
        $categoryBtn: $('.js-category'),
        $sort: $('#sort'),
        $goodshf: $('#goods-hf'),
        $goodscc: $('#goods-cc'),
        $goodsbr: $('#goods-br'),
        $goodsfc: $('#goods-fc'),
        $goodssl: $('#goods-sl'),
        $goodsTemplate: $('#goods-template')

    };
    var selectedCategory = 1,
    goodsTemplate = _.template(ui.$goodsTemplate.html());
   
    // Инициализация модуля
    function init() {
        _initPrices({
            minPrice: 0,
            maxPrice: 1000000
        });
        _bindHandlers();
        _getData();
    }

    // Навешиваем события
    function _bindHandlers() {
    ui.$categoryBtn.on('click', _changeCategory);
    ui.$sort.on('change', _getData);
    
}
 
  // Сброс фильтров, только брендов и цен
  function _resetFilters() {
    ui.$minPrice.val(0);
    ui.$maxPrice.val(1000000);
}

// Смена категории
function _changeCategory() {
    var $this = $(this);
    ui.$categoryBtn.removeClass('active');
    $this.addClass('active');
    selectedCategory = $this.attr('data-category');
    _resetFilters();
    _getData({needsData: 'prices'});
}

// Ошибка получения данных
function _catalogError(responce) {
    console.error('responce', responce);
    // Далее обработка ошибки, зависит от фантазии
}

// Успешное получение данных
function _catalogSuccess(responce) {
    ui.$goodshf.html(goodsTemplate({goods: responce.goods1})),
    ui.$goodscc.html(goodsTemplate({goods: responce.goods2})),
    ui.$goodsbr.html(goodsTemplate({goods: responce.goods3})),
    ui.$goodsfc.html(goodsTemplate({goods: responce.goods4})),
    ui.$goodssl.html(goodsTemplate({goods: responce.goods5}));
}


  // Обновление цен
  function _updatePricesUI(options) {
    ui.$pricesLabel.html(options.minPrice + ' - ' + options.maxPrice + ' руб.');
    ui.$minPrice.val(options.minPrice);
    ui.$maxPrice.val(options.maxPrice);
}

    // Инициализация цен с помощью jqueryUI
    function _initPrices(options) {
        ui.$prices.slider({
            range: true,
            min: options.minPrice,
            max: options.maxPrice,
            values: [options.minPrice, options.maxPrice],
            change: _getData
        });
        _updatePricesUI(options);
    }


// Получение данных
function _getData(options) {  
    var catalogData = 'category=' + selectedCategory + '&' + ui.$form.serialize();

    if (options && options.needsData) {
        catalogData += '&needs_data=' + options.needsData;
    }
    $.ajax({
        url: 'scripts/catalog.php',
        data: catalogData,
        type: 'GET',
        cache: false,
        dataType: 'json',
        error: _catalogError,
        success: function(responce) {
            if (responce.code === 'success') {
                _catalogSuccess(responce);
            } else {
                _catalogError(responce);
            }
        }
    });
}

    // Экспортируем наружу
    return {
        init: init
    }
     
})(jQuery);