<?php session_start(); 
if (!$_SESSION['admins']) {
    header('Location: /');
}
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../admin/assets/css/ap.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Grand+Hotel&family=Lobster&family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> 
        
        
        <title>
            YUMMYHOT
        </title>
        <link rel="shortcut icon" href="../assets/images/zn.png" type="image/x-icon">
    </head>
    <body>
        <header class="header">
            <div class="container">
                <div class="header_inner">
                    <div class="header_logo">YummyHot</div>
                                <nav class="nav">
                            <a class="nav_link" href="/">Главная[АДМИН]</a>
                                <a class="nav_link" href="#">Отзывы</a>
                                <a class="nav_link" href="#">О нас</a>
                                <a class="nav_link" href="/admin/admin-page.php">Редактировать</a>
                                <a class="nav_link" href="/auth_or_reg/vendor/logout.php" class="logout">Выход</a>
                            </nav>
            </div>
        </header>

        <nav class="choice">
        <a class="nav_link" href="/admin/edit-menu/index.php">Редактировать меню</a>
        </nav>

    </body>

</html>