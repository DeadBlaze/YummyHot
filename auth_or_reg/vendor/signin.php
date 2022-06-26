<?php

session_start();
require_once 'connect.php';

$login = $_POST['login'];
$pass = $_POST['pass'];

$error_fields = [];

if ($login === '') {
    $error_fields[] = 'login';
}

if ($pass === '') {
    $error_fields[] = 'pass';
}

if (!empty($error_fields)) {
    $response = [
        "status" => false,
        "type" => 1,
        "message" => "Проверьте правильность полей",
        "fields" => $error_fields
    ];

    echo json_encode($response);

    die();
}

$pass = md5($pass);

$check_user = mysqli_query($connect, "SELECT * FROM `clients` WHERE `login` = '$login' AND `pass` = '$pass'");
$check_admins = mysqli_query($connect, "SELECT * FROM `admins` WHERE `login` = '$login' AND `pass` = '$pass'");
if (mysqli_num_rows($check_user) > 0) {

    $user = mysqli_fetch_assoc($check_user);
   
    $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['name'],
        "email" => $user['email']
    ];

    $response = [
        "status" => true
    ];
    echo json_encode($response);
} 

else if (mysqli_num_rows($check_admins) > 0) {

    $admins = mysqli_fetch_assoc($check_admins);
    $admin=1;
    $_SESSION['admins'] = [
        "id" => $admins['id']
    ];

    $response = [
        "status" => true
    ];
    echo json_encode($response);
 
}

else {

    $response = [
        "status" => false,
        "message" => 'Не верный логин или пароль'
    ];

    echo json_encode($response);
}
?>
