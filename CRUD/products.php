<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once 'config/connect.php';

$page = $_GET['page']; // получение номера страницы из адресной строки
$count = 10; // количество записей на странице
$limit_num = $page*$count; // число для sql запроса как значение для limit

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Товары</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<div class="h1" align="right" style="margin-right: 70px;">
    <?php
        echo ($_COOKIE['employee']); // отображение имени авторизованного сотрудника на шапке сайта
    ?>
    <a href="index.php"><button  style="margin-left: 20px;"class="btn btn-danger" type="btn">Выйти</button></a>
</div>

<style>
    body
    {
        background-image: linear-gradient( 90deg,  rgba(255,244,228,1) 7.1%, rgba(240,246,238,1) 67.4% );
    }

    th, td {
        padding: 10px;
    }

    th {
        background: #606060;
        color: #fff;
    }

    td {
        background: #b5b5b5;
    }

    .space {
        padding: 20px; /* Поля */
        background: white; /* Цвет фона */
        border: 2px solid black; /* Параметры рамки */
        margin-left: 10px;
        width: 400px;
        text-align: center;
    }

    .space2 {
        padding: 20px; /* Поля */
        background: #E5D3BD; /* Цвет фона */
        border: 2px solid #E81E25; /* Параметры рамки */
        margin-left: auto;
        margin-right: auto;
    }

    .space3 {
        margin: 0 auto;
        width: 200px;
    }

    .wrap
    {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }

    .textarea
    {
        resize: none; /* Запрещаем изменять размер */
        height: 100px;
    }
</style>

<body>
    <hr style="margin-top: 80px;">
    
    <div class='wrap'>
        <div class="border border-dark">
            <table class='table table-striped'>
                <!-- поля таблицы и их названия-->
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Описание</th>
                    <th>Группа</th>
                </tr>

                <?php
                /*
                 * Делаем выборку всех строк из таблицы "products"
                 */
                $sql_zapros = "SELECT products.id, products.name, price, col, description, products_groups.name FROM products, products_groups WHERE products.id_product_group = products_groups.id order by products.id desc";

                $products = mysqli_query($connect, $sql_zapros . " limit $limit_num, $count");

                $group =  mysqli_query($connect, "SELECT id, name From products_groups");

                /*
                 * Преобразовываем полученные данные в нормальный массив
                 */
                $products = mysqli_fetch_all($products);
                $group = mysqli_fetch_all($group);

                /*
                 * Перебираем массив и рендерим HTML с данными из массива
                 * Ключ 0 - id
                 * Ключ 1 - name
                 * Ключ 2 - price
                 * Ключ 3 - col
                 * Ключ 4 - description
                 * Ключ 5 - id_product_group
                 */
                foreach ($products as $product) {
                    ?>
                        <tr>
                            <td><?= $product[0] ?></td>
                            <td><?= $product[1] ?></td>
                            <td><?= $product[2] ?></td>
                            <td><?= $product[3] ?></td>
                            <td><?= $product[4] ?></td>
                            <td><?= $product[5] ?></td>
                            <td><a href="update_products.php?id=<?= $product[0] ?>">Изменить</a></td>
                            <td><a style="color: red;" href="vendor/delete_products.php?id=<?= $product[0] ?>">Удалить</a></td>
                        </tr>
                    <?php
                    }
                ?>
            </table>
        </div>
    </div>
    <a href="newproducts.php"><button  class="btn btn-outline-success" type="btn">Добавить товар</button></a>
    <a href="index1.php"><button  class="btn btn-outline-success" type="btn">Назад</button></a>
</body>
</html>