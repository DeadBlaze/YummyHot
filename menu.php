<?php session_start(); ?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Grand+Hotel&family=Lobster&family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700&subset=latin,cyrillic-ext' rel='stylesheet' type='text/css'>
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style_menu.css">
 
    <title>
        YUMMYHOT
    </title>
    <link rel="shortcut icon" href="assets/images/zn.png" type="image/x-icon">
</head>
<body data-page="catalogDB">
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
                               <a class="nav_link" href="../menu.php">Меню</a>
                               <a class="nav_link" href="/auth_or_reg/vendor/logout.php" class="logout">Выход</a>
                           </nav>

                           <?php elseif($_SESSION['admins']): ?>
                               <nav class="nav">
                           <a class="nav_link" href="/">Главная</a>
                               <a class="nav_link" href="review.php">Отзывы</a>
                               <a class="nav_link" href="#">О нас</a>
                               <a class="nav_link" href="/admin/admin-page.php">Настройки[ADMIN]</a>
                               <a class="nav_link" href="../menu.php">Меню</a>
                               <a class="nav_link" href="/auth_or_reg/vendor/logout.php" class="logout">Выход</a>
                           </nav>
                           
                           <?php else:?>
                               <nav class="nav">
                           <a class="nav_link" href="/">Главная</a>
                           <a class="nav_link" href="/auth_or_reg/index.php">Регистрация/Авторизация</a>
                               <a class="nav_link" href="review.php">Отзывы</a>
                               <a class="nav_link" href="#">О нас</a>
                               <a class="nav_link" href="../menu.php">Меню</a>
                           </nav>
                        <?php endif;?>
            </div>
        </div>
    </header>

    <div class="intro">
        <div class="container">
            <div class="intro_inner">
                    <h1 class="intro_title">Меню</h1>
        </div>
        <nav id="navbar" class="navbar">
            <div class="container">
                <ul class="navbar_nav">
                    <img src="../images_menu/hot_food.png" alt="" class="img_menu">
                    <li><a href="#1">Горячие блюда</a></li>
                    <img src="../images_menu/cupcake.png" alt="" class="img_menu">
                    <li><a href="#2">Выпечка/Десерты</a></li>
                    <img src="../images_menu/beverage.png" alt="" class="img_menu">
                    <li><a href="#3">Напитки</a></li>
                    <img src="../images_menu/food-container.png" alt="" class="img_menu">
                    <li><a href="#4">Наборы</a></li>
                    <img src="../images_menu/salad.png" alt="" class="img_menu">
                    <li><a href="#5">Салаты</a></li>
                    <li>
                        <a rel="nofollow" href="cart.php">
                            <img src="../images_menu/basket.png" alt="" class="img_menu-basket">
                            <span id="total-cart-count" class="badge">
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
 
        <script src="../js/modules/navbar.js"></script>
    </div>

 

   <div class="menu_middle">
    <div class="container">
        
        <div class="Foods"><span id="1"></span>Горячие блюда
        <ul id="goods-hf" data-category="1" class="list-unstyled">
            <img src="images_menu/loading.gif" alt="" />
        </ul>
        
    </div>
        <div class="Foods"><span id="2"></span>Выпечка/Десерты
        <ul id="goods-cc" data-category=1 class="list-unstyled">
            <img src="images_menu/loading.gif" alt="" />
        </ul>
        
        </div>
        <div class="Foods"><span id="3"></span>Напитки
        <ul id="goods-br" data-category="3" class="list-unstyled">
            <img src="images_menu/loading.gif" alt="" />
        </ul>
        
        </div>
        <div class="Foods"><span id="4"></span>Наборы
        <ul id="goods-fc" data-category="4" class="list-unstyled">
            <img src="images_menu/loading.gif" alt="" />
        </ul>
       
        </div>
        <div class="Foods"><span id="5"></span>Салаты
        <ul id="goods-sl" data-category="5" class="list-unstyled">
            <img src="images_menu/loading.gif" alt="" />
        </ul>
        
        </div>
    
        <footer class="footer">
        <div class="container">
            <div class="footer_inner">
                <div class="footer_col footer_col-first">
                    <div class="footer_logo">YammyHot</div>
                
                <div class="footer_text">YummyHot — сеть ресторанов
                    быстрого питания. Доставляем
                    качественную и вкусную еду,
                    предлагая высокое качество
                    за приемлемую цену. </div>
                <div class="footer_social">
                    <a href="https://vk.com/mrproblaze" target="_blank">
                        <i class="fa fa-vk" ></i>
                    </a>
                    <a href="https://www.instagram.com/deadproblaze/" target="_blank">
                        <i class="fa fa-instagram" ></i>
                    </a>
                    <a href="https://twitter.com/mrproblaze" target="_blank">
                        <i class="fa fa-twitter" ></i>
                    </a>
                    <a href="https://wa.me/89029478114" target="_blank">
                        <i class="fa fa-whatsapp"></i>
                    </a>
                </div>
                <form class="subscribe" action="/" method="post">
                    <input class="subscribe_input" type="email" name="name" placeholder="Ваша почта...">
                    <button class="subscribe_btn" type="submit">Подписаться</button>
                </form>
            </div><!-- /.footer_col-first-->
    
            <div class="footer_col footer_col-second">
                <div class="footer_title">Компания</div>
                <div class="Comp_content">
                <a class="footer-link_title" href="#" >О нас</a>
                <a class="footer-link_title" href="#" >Отзывы</a>
            </div>
            </div><!-- /.footer_col-second-->
    
            <div class="footer_col footer_col-third">
                <div class="footer_title">Контакты</div>
                <div class="Cont_content">
                    <a class="footer-link_title" href="#" >Контроль качества</a>
                    <a class="footer-link_title" href="#" >+7 (908) 213-12-24</a>
                    <a class="footer-link_title" href="#" >+7 (902) 947-81-14</a>
                </div>  
            </div><!-- /.footer_col-third-->
    
            <div class="footer_col footer_col-fourth">
                <div class="footer_title">Документы</div>
                <div class="Doc_content">
                    <a class="footer-link_title" href="#" >Правила оказания услуг</a>
                    <a class="footer-link_title" href="#" >Политика конфиденциальности</a>
                    <a class="footer-link_title" href="#" >Публичная оферта</a>
                    <a class="footer-link_title" href="#" >Соглашение</a>
                </div>  
            </div><!-- /.footer_col-fourth-->
    </div><!-- /.footer_inner-->
    
    <div class="copyr"> © 2022 YUMMYHOT project create by <span>K.Karchushkin</span> </div>
       
    </div><!-- /.container-->
    </footer>
    </div>
</div>

<script id="goods-template" type="text/template">
        <% _.each(goods, function(item) { %>
        <div class="poin_container">
        <li class="good-item row">
            <div class="col-md-2">
                <img class="good-item__img" src="images_menu/catalog/<%= item.img %>" />
            </div>
            <div class="col-md-10">
                <div class="good-item__id">Артикул <%= item.id %></div>
                <div class="good-item__name"><%- item.name %></div>
                <div class="good-item__price"><%= item.price %> руб.</div>
                <button
                    class="good-item__btn-add btn btn-info btn-sm js-add-to-cart"
                    data-id="<%= item.id %>"
                    data-name="<%- item.name %>"
                    data-price="<%= item.price %>"
                >Добавить в корзину</button>
            </div>
        </li>
        </div>
        <% }); %>
    </script>


    <script src="js/vendor/jquery.min.js" type="text/javascript"></script>
    <script src="js/vendor/jquery.cookie.js" type="text/javascript"></script>
    <script src="components/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/vendor/underscore.min.js" type="text/javascript"></script>
    <script src="js/modules/catalogDB.js" type="text/javascript"></script>
    <script src="js/modules/cart.js" type="text/javascript"></script>
    <script src="js/modules/main.js" type="text/javascript"></script>
    <script
    type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js".>
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
                $("a[href*=#]").bind("click", function(e){
                        var anchor = $(this);
                        $('html, body').stop().animate({
                                scrollTop: $(anchor.attr('href')).offset().top-75 /* -30 – можно менять для учёта фиксированной шапки*/
                        }, 1000); /* 1000 – можно менять для желаемой скорости прокрутки*/
                          e.preventDefault();
                        return false;
                });
        });
</script>
    
</body>
</html>