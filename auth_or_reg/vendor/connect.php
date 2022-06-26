<?php

    $connect = mysqli_connect('localhost', 'p104819_root', 'rootYHDB25546000', 'p104819_YHDB');

    if (!$connect) {
        die('Error connect to DataBase');
    }