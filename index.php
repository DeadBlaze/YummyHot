<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Grand+Hotel&family=Lobster&family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        
        <title>
            YUMMYHOT
        </title>
        <link rel="shortcut icon" href="assets/images/zn.png" type="image/x-icon">
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
        </header>

    <div class="intro">
        <div class="container">
            <div class="intro_inner">
                <h1 class="intro_title">Добро пожаловать в YummyHot</h1>
                <h2 class="intro_subtitle"> У нас самые быстрые доставки. Наши блюда будет у вас в руках уже через 30 минут после оформления заказа. </h2>
                <a class="btn" href="../menu.php"> Оформить заказ </a>
            </div>
        </div>
    </div>
      
    <section class="section"> 
        <div class="container">
            <div class="section_header">
                <h3 class="section_title">Наше меню</h3>
                <div class="section_text">
                    <p>Каждое блюдо, приготовленное шефом, проведет вас по незабываемому пути традиционных вкусов. </p>
                </div>
            </div>
        <div class="menu_category">
            <div class="item_category">
                <div class="category_img">
                    <img src="assets/images/menu1.jpg" alt="">
                </div>
                <a class="main_menu" href="../menu.php">
                    Горячие блюда
                </a>
            </div>
            <div class="item_category">
                <div class="category_img">
                    <img src="assets/images/menu2.jpg" alt="">
                </div>
                <a class="main_menu" href="../menu.php">
                    Выпечка/Десерты
                </a>
            </div>
            <div class="item_category">
                <div class="category_img">
                    <img src="assets/images/menu3.jpg" alt="">
                </div>
                <a class="main_menu" href="../menu.php">
                    Напитки
                </a>
            </div>
            <div class="item_category">
                <div class="category_img">
                    <img src="assets/images/menu4.jpg" alt="">
                </div>
                <a class="main_menu" href="../menu.php">
                    Наборы
                </a>
            </div>
            <div class="item_category">
                <div class="category_img">
                    <img src="assets/images/menu5.jpg" alt="">
                </div>
                <a class="main_menu" href="../menu.php">
                    Салаты
                </a>
            </div>
        </div>
    </div>
     </section>

<div class="middle">
    <div class="container">
        <div class="middle_inner">
            <h1 class="middle_title">МАЧО РИБАЙ СТЕЙК</h1>
            <h2 class="middle_subtitle">Ароматная глазурь со специями и уникальный способ приготовления в дровяной печи дарят мясу неповторимый вкус. А хрустящая корочка, создаваемая глазурью, сохраняет удивительную сочность стейка.</h2>
            <a class="btn_rec1" href="../menu.php"> Оформить заказ </a>
        </div>
        <div class="rec1_category">
            <div class="rec1_img">
                <img src="assets/images/rec1.jpg" alt="" class="round_rec1">
            </div>
        </div>
    </div>
</div>

<div class="sub_middle">
    <div class="container">
        <div class="sub_middle_iner">
            <div class="stat_titles">
            <p class="stat_title">Статистика</p>
            <h2 class="stat_subtitle">Результаты, которые ты получаешь, находятся в прямой зависимости от усилий, которые ты прикладываешь.</h2>
        </div>
            <div class="statistics">
        <div class="container">
        
            <div class="stat">
                <div class="stat_item">
                    <div class="stat_count", class="circle">4.6</div>
                    <div class="stat_text">средняя оценка гостей</div> 
                </div>

                <div class="stat_item">
                    <div class="stat_count", class="circle">2</div>
                    <div class="stat_text">заведения в Красноярске</div>
                </div>

                <div class="stat_item">
                    <div class="stat_count", class="circle">60</div>
                    <div class="stat_text">пунктов меню</div>
                </div>

                <div class="stat_item">
                    <div class="stat_count", class="circle">30</div>
                    <div class="stat_text">минут доставка</div>
                </div>

            </div>
        </div>
    </div>
    </div>
    </div>
</div>
<div class="sup_map">
    <div class="container">
        <div class="sup_map_inner">
            <div class="container">
            <div class="rec2_category">
                <div class="rec2_img">
                    <img src="assets/images/rec2.jpg" alt="" class="round_rec2">
                </div>
            </div>
            <div class="sup_map_title_shift">
            <h1 class="sup_map_title">Баноффи-пай</h1>
            <h2 class="sup_map_subtitle">Это английский пирог, название которого состоит из двух слов — «банан» и мягкая карамель «тоффи». Десерт сочетает в себе беспроигрышные продукты. Плотная песочная основа, слой вареной сгущенки и ароматные бананы под облаком взбитых сливок никого не оставят равнодушными.</h2>
            <a class="btn_rec2" href="../menu.php"> Оформить заказ </a>
        </div>
        </div>
    </div> 
    </div>
</div>

<div class="map">
    <div class="container">
        <div class="map_inner">
            <h1 class="map_title">Рестораны на карте</h1>
            <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A5cb54ee0a31eaaa7b5cd74bbdd1b4615b0a846d4a12f7c37b4e9d9f31a39528c&amp;source=constructor" width="100%" height="578" frameborder="0"></iframe>
        </div>
    </div>
</div>

<div class="slider">
    <div class="wrapper">
        <div class="slider_container">
            
        <div class="slider_track">
        
            <div class="slider_item"></div>
            <div class="slider_item"></div>
            <div class="slider_item"></div>
            <div class="slider_item"></div>
            <div class="slider_item"></div> 
        </div>
    </div>
    <div class="slider_buttons">
        <button class="btn_1"></button>
        <button class="btn_2"></button>
        <button class="btn_3"></button>
        <button class="btn_4"></button>
        <button class="btn_5"></button>
        <a class="btn_prev">&#10094</a>
        <a class="btn_next">&#10095</a>
    </div>
</div>
</div>



<script src="assets/js/main.js"></script>


<footer class="footer">
    <div class="container">
        <div class="footer_inner">
            <div class="footer_col footer_col-first">
                <div class="footer_logo">YummyHot</div>
            
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
                <a href="https://api.whatsapp.com/send?phone=79029478114" target="_blank">
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
            <a class="footer-link_title" href="review.php" >Отзывы</a>
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
    </body>
</html>