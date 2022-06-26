<?php
    session_start();
    if ($_SESSION['user']) {
        header('Location: /');
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="/auth_or_reg/assets/css/main.css">
</head>
<body>

    <!-- Форма регистрации -->

    <form>
        <label>Имя</label>
        <input type="text" name="name" placeholder="Введите свое имя">
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите адрес своей почты">
        <label>Пароль</label>
        <input type="pass" name="pass" placeholder="Введите пароль">
        <label>Подтверждение пароля</label>
        <input type="pass" name="pass_confirm" placeholder="Подтвердите пароль">
        <button type="submit" class="register-btn">Зарегистрироваться</button>
        <p>
            У вас уже есть аккаунт? - <a href="/auth_or_reg/index.php">авторизируйтесь</a>!
        </p>
        <p class="msg none">Lorem ipsum.</p>
    </form>
    <script src="/auth_or_reg/assets/js/jquery-3.4.1.min.js"></script>
    <script src="/auth_or_reg/assets/js/main.js"></script>
</body>
</html>