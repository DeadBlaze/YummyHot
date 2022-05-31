<?php

// Объявляем нужные константы
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'YHDB');

// Подключаемся к базе данных
function connectDB() {
    $errorMessage = 'Невозможно подключиться к серверу базы данных';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn)
        throw new Exception($errorMessage);
    else {
        $query = $conn->query('set names utf8');
        if (!$query)
            throw new Exception($errorMessage);
        else
            return $conn;
    }
}

// Получение данных из массива _GET
function getOptions() {
    // Категория, цены и дополнительные данные
    $categoryId = (isset($_GET['category'])) ? (int)$_GET['category'] : 0;
    $minPrice = (isset($_GET['min_price'])) ? (int)$_GET['min_price'] : 0;
    $maxPrice = (isset($_GET['max_price'])) ? (int)$_GET['max_price'] : 1000000;
    $needsData = (isset($_GET['needs_data'])) ? explode(',', $_GET['needs_data']) : array();

}

// Получение товаров
function getGoods($options, $conn) {
    // Обязательные параметры
    $minPrice = $options['min_price'];
    $maxPrice = $options['max_price'];
    $sortBy = $options['sort_by'];
    $sortDir = $options['sort_dir'];

    // Необязательные параметры
    $categoryId = $options['category_id'];
    $categoryWhere =
        ($categoryId !== 0)
            ? " g.category_id = $categoryId and "
            : '';

    $brands = $options['brands'];
    $brandsWhere =
        ($brands !== null)
            ? " g.brand_id in ($brands) and "
            : '';

    $query = "
        select
            g.id as good_id,
            g.good as good,
            g.category_id as category_id,
            b.brand as brand,
            g.price as price,
            g.rating as rating,
            g.photo as photo
        from
            goods as g,
            brands as b
        where
            $categoryWhere
            $brandsWhere
            g.brand_id = b.id and
            (g.price between $minPrice and $maxPrice)
        order by $sortBy $sortDir
    ";

    $data = $conn->query($query);
    return $data->fetch_all(MYSQLI_ASSOC);
}


// Получение всех данных
function getData($options, $conn) {
    $result = array(
        'goods' => getGoods($options, $conn)
    );

    $needsData = $options['needs_data'];
    if (empty($needsData)) return $result;


    return $result;
}


try {
    // Подключаемся к базе данных
    $conn = connectDB();

    // Получаем данные от клиента
    $options = getOptions();

    // Получаем товары
    $data = getData($options, $conn);

    // Возвращаем клиенту успешный ответ
    echo json_encode(array(
        'code' => 'success',
        'data' => $data
    ));
}
catch (Exception $e) {
    // Возвращаем клиенту ответ с ошибкой
    echo json_encode(array(
        'code' => 'error',
        'message' => $e->getMessage()
    ));
}
