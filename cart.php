<?php session_start(); ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Корзина</title>
    <meta name="description" content="Корзина, редактирование и переход на оформление заказа" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Grand+Hotel&family=Lobster&family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/style_cart.css">
    <link rel="shortcut icon" href="assets/images/zn.png" type="image/x-icon">
</head>
<body data-page="cart">
    <header class="header">
        <div class="container">
            <div class="header_inner">
                <div class="header_logo">YummyHot</div>
                <?php
                   
                   if($_SESSION['user']):
                       ?>
                          <nav class="nav">
                           <a class="nav_link" href="/">Главная</a>
                               <a class="nav_link" href="review.php">Отзывы</a>
                               <a class="nav_link" href="#">О нас</a>
                               <a class="nav_link" href="../menu.php">Назад</a>
                               <a class="nav_link" href="/auth_or_reg/vendor/logout.php" class="logout">Выход</a>
                           </nav>

                           <?php elseif($_SESSION['admins']): ?>
                               <nav class="nav">
                           <a class="nav_link" href="/">Главная</a>
                               <a class="nav_link" href="review.php">Отзывы</a>
                               <a class="nav_link" href="#">О нас</a>
                               <a class="nav_link" href="/admin/admin-page.php">Настройки[ADMIN]</a>
                               <a class="nav_link" href="../menu.php">Назад</a>
                               <a class="nav_link" href="/auth_or_reg/vendor/logout.php" class="logout">Выход</a>
                           </nav>
                           
                           <?php else:?>
                               <nav class="nav">
                           <a class="nav_link" href="/">Главная</a>
                           <a class="nav_link" href="/auth_or_reg/index.php">Регистрация/Авторизация</a>
                               <a class="nav_link" href="review.php">Отзывы</a>
                               <a class="nav_link" href="#">О нас</a>
                               <a class="nav_link" href="../menu.php">Назад</a>
                           </nav>
                        <?php endif;?>
            </div>
        </div>
    </header>

    <div class="cart_intro">
    <div class="container">
        <div class="cart_inner">
       
        <h1 class="cart_title">Корзина</h1>

        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Артикул</th>
                        <th>Название</th>
                        <th>Цена</th>
                        <th>Количество</th>
                        <th>Сумма</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="cart">
                    <tr><td colspan="6"><img src="img/loading.gif" alt="" /></td></tr>
                </tbody>
            </table>
        </div>
        <div>Итого: <span id="total-cart-summa">65000</span> руб.</div>
        <br />
        <a class="btn" href="order.php">Оформить заказ</a>
    </div>
    </div>
    </div>

    <script id="cart-template" type="text/template">
        <% _.each(goods, function(good) { %>
            <tr class="cart-item js-cart-item" data-id="<%= good.id %>">
                <td><%= good.id %></td>
                <td><%- good.name %></td>
                <td><%= good.price %> руб.</td>
                <td>
                    <span 
                        class="cart-item__btn-dec-count js-change-count" 
                        title="Уменьшить на 1" 
                        data-id="<%= good.id %>" 
                        data-delta="-1"
                    >
                        <span class="glyphicon glyphicon-minus"></span>
                    </span>
                    <span class="js-count"><%= good.count %></span>
                    <span 
                        class="cart-item__btn-inc-count js-change-count" 
                        title="Увеличить на 1" 
                        data-id="<%= good.id %>" 
                        data-delta="1"
                    >
                        <span class="glyphicon glyphicon-plus"></span>
                    </span>
                </td>
                <td><span class="js-summa"><%= good.count * good.price %></span> руб.</td>
                <td>
                    <span class="cart-item__btn-remove js-remove-from-cart" title="Удалить из корзины" data-id="<%= good.id %>">
                        <span class="bi bi-x-circle-fill"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
    </svg></span>                                
                    </span>
                </td>
            </tr>
        <% }); %>
    </script>

    <script src="js/vendor/jquery.min.js" type="text/javascript"></script>
    <script src="js/vendor/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/vendor/underscore.min.js" type="text/javascript"></script>
    <script src="js/modules/catalog.js" type="text/javascript"></script>
    <script src="js/modules/cart.js" type="text/javascript"></script>
    <script src="js/modules/compare.js" type="text/javascript"></script>
    <script src="js/modules/main.js" type="text/javascript"></script>
</body>
</html>