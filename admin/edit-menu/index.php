<?php session_start(); 
if (!$_SESSION['admins']) {
    header('Location: /');
}
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/admin/assets/css/ap.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Caveat&family=Grand+Hotel&family=Lobster&family=Montserrat:wght@400;700&display=swap" rel="stylesheet"> 
        
        <title>
            YUMMYHOT
        </title>
        <link rel="shortcut icon" href="../assets/images/zn.png" type="image/x-icon">
    </head>
    <body>

    <?php include("../header-admin.php"); ?>
        
    <div class="edit-menu">
        <!-- здесь будет выводиться наше приложение -->
    <div id="app"></div>

    </div>
<!-- jQuery -->
<script src="/admin/assets/js/jquery-3.6.0.min.js"></script>

<!-- bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>

<!-- для всплывающих окон -->
<script src="/admin/assets/js/bootbox.js"></script>

<!-- основной файл скриптов -->
<script src="/admin/edit-menu/app.js"></script>

<!-- products scripts -->
<script src="/admin/edit-menu/products/read-products.js"></script>
<script src="/admin/edit-menu/products/create-product.js"></script>
<script src="/admin/edit-menu/products/read-one-product.js"></script>
<script src="/admin/edit-menu/products/update-product.js"></script>
<script src="/admin/edit-menu/products/delete-product.js"></script>
<!-- products scripts -->
<script src="/admin/edit-menu/products/products.js"></script>
<script src="/admin/edit-menu/products/search-product.js"></script>



    </body>
</html>