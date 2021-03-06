<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once 'config/connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>


<body onload="admin(<?=$_COOKIE['prava']; ?>);">

<div>

    <style>
    body
    {
        background-image: linear-gradient( 90deg,  rgba(255,244,228,1) 7.1%, rgba(240,246,238,1) 67.4% );
    }

    .header-h1 {
        position: relative;
        margin-bottom: .5rem;
    }

    .header-h1::after {
        content: "";
        position: absolute;
        border-top: 2px solid black;
        border-bottom: 2px solid black;
        height: .375rem;
        left: 0;
        top: 50%;
        width: 100%;
        transform: translateY(-50%);
        z-index: -999;
    }

    .header-h1 h1 {
        font-size: 1.5rem;
        color: black;
        display: inline-block;
        background: #fff;
        margin-bottom: 0;
        padding-right: 1rem;
        text-transform: uppercase;
    }

    .header-h1-center {
        text-align: center;
    }

    .header-h1-center h1 {
        padding-left: 1rem;
    }

    .header-h1-right {
        text-align: right;
    }

    .header-h1-right h1 {
        padding-left: 1rem;
        padding-right: 0;
    }

    </style>

    <div  align="center"class="header-h1 header-h1-center">
        <h1>Компьютерный магазин</h1>
    </div>


    <div class="h1" align="right" style="margin-right: 70px;">
        <?php
            echo ($_COOKIE['employee']);
        ?>
        <a href="index.php"><button  style="margin-left: 20px;"class="btn btn-danger" type="btn">Выйти</button></a>
    </div>

    <div class ='name' style="position: absolute;">
    
</div>

<!-- кнопки на таблицы -->
<div class='btns' style="position: absolute;">
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="groups.php?id=<?= $product[0] ?>">Товарные группы</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="products.php?id=<?= $product[0] ?>">Товары</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="clients.php?id=<?= $product[0] ?>">Клиенты</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="orders.php?id=<?= $product[0] ?>">Заказы</a>
        </li>
        <li class="nav-item" id="foradmin" hidden>
            <a class="nav-link active" href="employees.php?id=<?= $product[0] ?>">Сотрудники</a>
        </li>
    </ul>
</div>

</body>
</html>

<script>
    function admin(role)
    {
        if(role == '1')
        {
            item=document.getElementById('foradmin');
            item.removeAttribute("hidden");
        }
    }
</script>