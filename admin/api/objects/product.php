<?php
class Product {

    // подключение к базе данных и таблице "products"
    private $conn;
    private $table_name = "products";

    // свойства объекта
    public $id;
    public $name;
    public $price;
    public $img;
    public $category_id;
  
 

    // конструктор для соединения с базой данных
    public function __construct($db){
        $this->conn = $db;
    }

   // метод read() - получение товаров
function read() {

    // выбираем все записи
    $query = "SELECT
                p.id, p.name, p.price, p.img, p.category_id
            FROM
                " . $this->table_name . " p
               ";

    // подготовка запроса
    $stmt = $this->conn->prepare($query);

    // выполняем запрос
    $stmt->execute();

    return $stmt;
}

// метод create - создание товаров
function create(){

    // запрос для вставки (создания) записей
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                id=:id, name=:name, price=:price, img=:img, category_id=:category_id";

    // подготовка запроса
    $stmt = $this->conn->prepare($query);

    // очистка
    $this->id=htmlspecialchars(strip_tags($this->id));
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->price=htmlspecialchars(strip_tags($this->price));
    $this->img=htmlspecialchars(strip_tags($this->img));
    $this->category_id=htmlspecialchars(strip_tags($this->category_id));

    // привязка значений
    $stmt->bindParam(":id", $this->id);
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":price", $this->price);
    $stmt->bindParam(":img", $this->img);
    $stmt->bindParam("category_id", $this->category_id);

    // выполняем запрос
    if ($stmt->execute()) {
        return true;
    }

    return false;
}

// используется при заполнении формы обновления товара
function readOne() {

    // запрос для чтения одной записи (товара)
    $query = "SELECT
            p.id, p.name, p.price, p.img, p.category_id
            FROM
                " . $this->table_name . " p
            LIMIT
                0,1";

    // подготовка запроса
    $stmt = $this->conn->prepare( $query );

    // привязываем id товара, который будет обновлен
    $stmt->bindParam(1, $this->id);

    // выполняем запрос
    $stmt->execute();

    // получаем извлеченную строку
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    // установим значения свойств объекта
    $this->name = $row["name"];
    $this->price = $row["price"];
    $this->img = $row["img"];
    $this->category_id = $row["category_id"];

}



// метод delete - удаление товара
function delete(){

    // запрос для удаления записи (товара)
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";

    // подготовка запроса
    $stmt = $this->conn->prepare($query);

    // очистка
    $this->id=htmlspecialchars(strip_tags($this->id));

    // привязываем id записи для удаления
    $stmt->bindParam(1, $this->id);

    // выполняем запрос
    if ($stmt->execute()) {
        return true;
    }

    return false;
}

}
?>