<?php session_start(); ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <title>Заказ</title>
    <meta name="description" content="Оформление заказа и отправка его на сервер" />
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Grand+Hotel&family=Lobster&family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="css/order.css">
  
    
  
    <link rel="shortcut icon" href="assets/images/zn.png" type="image/x-icon">
</head>
<body data-page="order">
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
                               <a class="nav_link" href="../cart.php">Назад</a>
                               <a class="nav_link" href="/auth_or_reg/vendor/logout.php" class="logout">Выход</a>
                           </nav>

                           <?php elseif($_SESSION['admins']): ?>
                               <nav class="nav">
                           <a class="nav_link" href="/">Главная</a>
                               <a class="nav_link" href="review.php">Отзывы</a>
                               <a class="nav_link" href="#">О нас</a>
                               <a class="nav_link" href="/admin/admin-page.php">Настройки[ADMIN]</a>
                               <a class="nav_link" href="../cart.php">Назад</a>
                               <a class="nav_link" href="/auth_or_reg/vendor/logout.php" class="logout">Выход</a>
                           </nav>
                           
                           <?php else:?>
                               <nav class="nav">
                           <a class="nav_link" href="/">Главная</a>
                           <a class="nav_link" href="/auth_or_reg/index.php">Регистрация/Авторизация</a>
                               <a class="nav_link" href="review.php">Отзывы</a>
                               <a class="nav_link" href="#">О нас</a>
                               <a class="nav_link" href="../cart.php">Назад</a>
                           </nav>
                        <?php endif;?>
            </div>
        </div>
    </header>

    <div class="order_intro">
    <div class="container">
    <div class="order-fig">        
        <br />
        <div id="order-message" class="alert alert-info"></div>
        <br />
        <form id="order-form" class="form-horizontal" role="form">
            <div class="form-group">
                <label for="input-name" class="col-sm-2 control-label">Ваше имя *</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="input-name" name="name" placeholder="Ваше имя">
                </div>
            </div>
            <div class="form-group">
                <label for="input-email" class="col-sm-2 control-label">Email *</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" id="input-email" name="email" placeholder="Email">
                </div>
            </div>
            <div class="form-group">
                <label for="input-phone" class="col-sm-2 control-label">Телефон</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="input-phone" name="phone" placeholder="Телефон">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label">Способ доставки</label>
                <div class="col-sm-6">
                    <input type="hidden" name="delivery_type" id="delivery-type" value="" />
                    <input type="hidden" name="delivery_summa" id="delivery-summa" value="0" />
                    <input type="hidden" name="full_summa" id="full-summa" value="0" />
                    <div class="radio">
                        <label><input type="radio" name="delivery" class="js-delivery-type" data-type="Самовывоз" data-summa="0" checked>Самовывоз (бесплатно)</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="delivery" class="js-delivery-type" data-type="В пределах города" data-summa="150">В пределах города (150 рублей)</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="delivery" class="js-delivery-type" data-type="За городом в пределах 15км" data-summa="600">За городом в пределах 15км (600 рублей)</label>
                    </div>
                    <br />
                    <div id="alert-delivery" class="alert alert-info"></div>
                </div>
            </div>
            <div class="form-group">
                <label for="input-address" class="col-sm-2 control-label">Адрес доставки</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="input-address" name="address" placeholder="Адрес доставки" row="3"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="input-message" class="col-sm-2 control-label">Сообщение</label>
                <div class="col-sm-6">
                    <textarea class="form-control" id="input-message" name="message" placeholder="Дополнительная информация" row="3"></textarea>
                    <br />
                    <div id="alert-validation" class="alert alert-danger hidden">
                        <button type="button" class="close js-close-alert">&times;</button>
                        <strong>Ошибка!</strong> Заполните обязательные поля, отмеченные *
                    </div>
                    <div id="alert-order-done" class="alert alert-success hidden">
                        <button type="button" class="close js-close-alert">&times;</button>
                        <strong>Спасибо за заказ!</strong> Скоро мы с Вами свяжемся
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-6">
                    <button id="order-btn" type="submit" class="btn">Отправить заказ</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    </div>

    <script id="order-message-template" type="text/template">
        <% if (count !== 0) { %>
            В Вашей корзине <%= count %> товара(ов) на общую сумму <%= summa %> рублей.
            Заполните форму ниже и нажмите кнопку Отправить заказ.
        <% } else { %>
            Ваша корзина пуста. Перед отправкой заказа добавьте в корзину хотя бы один товар.
        <% } %>
    </script>

    <script src="js/vendor/jquery.min.js" type="text/javascript"></script>
    <script src="js/vendor/jquery.cookie.js" type="text/javascript"></script>
    <script src="js/vendor/underscore.min.js" type="text/javascript"></script>
    <script src="js/modules/cart.js" type="text/javascript"></script>
    <script src="js/modules/order.js" type="text/javascript"></script>
    <script src="js/modules/compare.js" type="text/javascript"></script>
    <script src="js/modules/main.js" type="text/javascript"></script>
    <script src="/auth_or_reg/assets/js/main.js"></script>
</body>
</html>