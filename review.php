<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Grand+Hotel&family=Lobster&family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> 
        <link rel="stylesheet" href="assets/css/reviews.css">

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

    <div class="posts">
        <div class="container">
        <nav class="navtop">
	    	<div>
	    		<h1>Отзывы</h1>
	    	</div>
	    </nav>
		<div class="content home">
			<p class="reviews_text">Ознакомьтесь с отзывами от наших клиентов.</p>
            <div class="reviews"></div>
<script>
const reviews_page_id = 1;
fetch("reviews.php?page_id=" + reviews_page_id).then(response => response.text()).then(data => {
	document.querySelector(".reviews").innerHTML = data;
	document.querySelector(".reviews .write_review_btn").onclick = event => {
		event.preventDefault();
		document.querySelector(".reviews .write_review").style.display = 'block';
		document.querySelector(".reviews .write_review input[name='name']").focus();
	};
	document.querySelector(".reviews .write_review form").onsubmit = event => {
		event.preventDefault();
		fetch("reviews.php?page_id=" + reviews_page_id, {
			method: 'POST',
			body: new FormData(document.querySelector(".reviews .write_review form"))
		}).then(response => response.text()).then(data => {
			document.querySelector(".reviews .write_review").innerHTML = data;
		});
	};
});
</script>
		</div>
    </div>
    </div>
</body>
</html>