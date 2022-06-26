<?php

// Объявляем нужные константы
define('DB_HOST', 'localhost');
define('DB_USER', 'p104819_root');
define('DB_PASSWORD', 'rootYHDB25546000');
define('DB_NAME', 'p104819_YHDB');

 
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
// Категория и цены
$categoryId = (isset($_GET['category'])) ? (int)$_GET['category'] : 0;
$minPrice = (isset($_GET['min_price'])) ? (int)$_GET['min_price'] : 0;
$maxPrice = (isset($_GET['max_price'])) ? (int)$_GET['max_price'] : 1000000;

 
    // Сортировка
    $sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'price_asc';
    $sort = explode('_', $sort);
    $sortBy = $sort[0];
    $sortDir = $sort[1];
    $needsData = (isset($_GET['needs_data'])) ? explode(',', $_GET['needs_data']) : array();
 
    return array(
        'category_id' => $categoryId,
        'sort_by' => $sortBy,
        'sort_dir' => $sortDir,
        'min_price' => $minPrice,
        'max_price' => $maxPrice,
        'needs_data' => $needsData
    );
}
 
// Получение товаров
function getGoods1($options, $conn) {
    // Обязательные параметры
    $minPrice = $options['min_price'];
    $maxPrice = $options['max_price'];
    $sortBy = $options['sort_by'];
    $sortDir = $options['sort_dir'];

    // Необязательные параметры
    $categoryId = $options['category_id'];
    $categoryWhere =
        ($categoryId = 1)
            ? " g.category_id = $categoryId and "
            : '';

    $query = "
        select
            g.id as id,
            g.name as name,
            g.category_id as category_id,
            g.price as price,
            g.img as img
        from
            products as g
        where
            $categoryWhere
            (g.price between $minPrice and $maxPrice)
        order by $sortBy $sortDir
    ";

    $data = $conn->query($query);
    return $data->fetch_all(MYSQLI_ASSOC);
}

// Получение товаров
function getGoods2($options, $conn) {
    // Обязательные параметры
    $minPrice = $options['min_price'];
    $maxPrice = $options['max_price'];
    $sortBy = $options['sort_by'];
    $sortDir = $options['sort_dir'];

    // Необязательные параметры
    $categoryId = $options['category_id'];
    $categoryWhere =
        ($categoryId = 2)
            ? " g.category_id = $categoryId and "
            : '';

    $query = "
        select
            g.id as id,
            g.name as name,
            g.category_id as category_id,
            g.price as price,
            g.img as img
        from
            products as g
        where
            $categoryWhere
            (g.price between $minPrice and $maxPrice)
        order by $sortBy $sortDir
    ";

    $data = $conn->query($query);
    return $data->fetch_all(MYSQLI_ASSOC);
}

// Получение товаров
function getGoods3($options, $conn) {
    // Обязательные параметры
    $minPrice = $options['min_price'];
    $maxPrice = $options['max_price'];
    $sortBy = $options['sort_by'];
    $sortDir = $options['sort_dir'];

    // Необязательные параметры
    $categoryId = $options['category_id'];
    $categoryWhere =
        ($categoryId = 3)
            ? " g.category_id = $categoryId and "
            : '';

    $query = "
        select
            g.id as id,
            g.name as name,
            g.category_id as category_id,
            g.price as price,
            g.img as img
        from
            products as g
        where
            $categoryWhere
            (g.price between $minPrice and $maxPrice)
        order by $sortBy $sortDir
    ";

    $data = $conn->query($query);
    return $data->fetch_all(MYSQLI_ASSOC);
}

// Получение товаров
function getGoods4($options, $conn) {
    // Обязательные параметры
    $minPrice = $options['min_price'];
    $maxPrice = $options['max_price'];
    $sortBy = $options['sort_by'];
    $sortDir = $options['sort_dir'];

    // Необязательные параметры
    $categoryId = $options['category_id'];
    $categoryWhere =
        ($categoryId = 4)
            ? " g.category_id = $categoryId and "
            : '';

    $query = "
        select
            g.id as id,
            g.name as name,
            g.category_id as category_id,
            g.price as price,
            g.img as img
        from
            products as g
        where
            $categoryWhere
            (g.price between $minPrice and $maxPrice)
        order by $sortBy $sortDir
    ";

    $data = $conn->query($query);
    return $data->fetch_all(MYSQLI_ASSOC);
}

// Получение товаров
function getGoods5($options, $conn) {
    // Обязательные параметры
    $minPrice = $options['min_price'];
    $maxPrice = $options['max_price'];
    $sortBy = $options['sort_by'];
    $sortDir = $options['sort_dir'];

    // Необязательные параметры
    $categoryId = $options['category_id'];
    $categoryWhere =
        ($categoryId = 5)
            ? " g.category_id = $categoryId and "
            : '';

    $query = "
        select
            g.id as id,
            g.name as name,
            g.category_id as category_id,
            g.price as price,
            g.img as img
        from
            products as g
        where
            $categoryWhere
            (g.price between $minPrice and $maxPrice)
        order by $sortBy $sortDir
    ";

    $data = $conn->query($query);
    return $data->fetch_all(MYSQLI_ASSOC);
}
 
try {
  // Подключаемся к базе данных
$conn = connectDB();
 
// Получаем данные от клиента
$options = getOptions();
 
// Получаем товары
$goods1 = getGoods1($options, $conn);

$goods2 = getGoods2($options, $conn);

$goods3 = getGoods3($options, $conn);

$goods4 = getGoods4($options, $conn);

$goods5 = getGoods5($options, $conn);
 
// Возвращаем клиенту успешный ответ
echo json_encode(array(
    'code' => 'success',
    'options' => $options,
    'goods1' => $goods1,
    'goods2' => $goods2,
    'goods3' => $goods3,
    'goods4' => $goods4,
    'goods5' => $goods5

));
}
catch (Exception $e) {
    // Возвращаем клиенту ответ с ошибкой
    echo json_encode(array(
        'code' => 'error',
        'message' => $e->getMessage()
    ));
}