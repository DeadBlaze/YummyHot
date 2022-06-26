<?php
session_start();

if ($_SESSION['user']) {
    header('Location: /');
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/auth_or_reg/assets/css/main.css">
    
</head>
<body>
<header class="header">
            <div class="container">
                <div class="header_inner">
                    <div class="header_logo">YummyHot</div>
                    <?php

                   
                   if($_SESSION['user']):
                       ?>
                          <nav class="nav">
                           <a class="nav_link" href="/">Главная</a>
                               <a class="nav_link" href="../review.php">Отзывы</a>
                               <a class="nav_link" href="#">О нас</a>
                               <a class="nav_link" href="../menu.php">Меню</a>
                               <a class="nav_link" href="/auth_or_reg/vendor/logout.php" class="logout">Выход</a>
                           </nav>

                           <?php elseif($_SESSION['admins']): ?>
                               <nav class="nav">
                           <a class="nav_link" href="/">Главная</a>
                               <a class="nav_link" href="../review.php">Отзывы</a>
                               <a class="nav_link" href="#">О нас</a>
                               <a class="nav_link" href="/admin/admin-page.php">Настройки[ADMIN]</a>
                               <a class="nav_link" href="../menu.php">Меню</a>
                               <a class="nav_link" href="/auth_or_reg/vendor/logout.php" class="logout">Выход</a>
                           </nav>
                           
                           <?php else:?>
                               <nav class="nav">
                           <a class="nav_link" href="/">Главная</a>
                               <a class="nav_link" href="../review.php">Отзывы</a>
                               <a class="nav_link" href="#">О нас</a>
                               <a class="nav_link" href="../menu.php">Меню</a>
                           </nav>
                        <?php endif;?>     
            </div>
        </header>

    <!-- Форма авторизации -->

    <form>
        <label>Логин</label>
        <input type="text" name="login" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input type="pass" name="pass" placeholder="Введите пароль">
        <button type="submit" class="login-btn">Войти</button>
        <p>
            У вас нет аккаунта? - <a href="/auth_or_reg/register.php">зарегистрируйтесь</a>!
        </p>
        <p class="msg none">Lorem ipsum dolor sit amet.</p>
    </form>

    <script src="/auth_or_reg/assets/js/jquery-3.4.1.min.js"></script>
    <script src="/auth_or_reg/assets/js/main.js"></script>

</body>
</html>