<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once 'config/connect.php';

/*
 * Получаем ID продукта из адресной строки - /products.php?id=1
 */

$product_id = $_GET['id'];

/*
 * Делаем выборку строки с полученным ID выше
 */

$product = mysqli_query($connect, "SELECT products.id, products.name as product_name, price, col, description, products_groups.name as group_name From products, products_groups WHERE products.id_product_group = products_groups.id and products.id = '$product_id'");

$group =  mysqli_query($connect, "SELECT id, name From products_groups");

/*
 * Преобразовывем полученные данные в нормальный массив
 * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
 */

$product = mysqli_fetch_assoc($product);
$group = mysqli_fetch_all($group);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Изменение товара</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<style type="text/css">
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
        text-size: 20px
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
        width: 500px;
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
    <div class=" space space3">
        <big><h3>Изменение товара</h3>
        <form action="vendor/update_products.php" method="post">
            <input type="hidden" name="id" value="<?= $product['id'] ?>">

            <p>Название
            <input class="form-control" type="text" name="name" value="<?= $product['product_name'] ?>"></p>

            <p>Цена
            <input class="form-control" type="number" name="price" value="<?= $product['price'] ?>"></p>
            <p>Количество
            <input class="form-control" type="number" name="col" value="<?= $product['col'] ?>"></p>

            <p>Описание
            <textarea class="form-control textarea" name="description"><?= $product['description'] ?></textarea></p>

            <p>Группа
            <select class="form-select" name="group" id="country">
                      <?php
                         foreach($group as $val){
                            if ($product['group_name'] == $val[1])
                            {
                                echo '<option value='. $val[0] .' ' . selected . ' >'. $val[1] .'</option>';

                            }
                            else
                            {
                                echo '<option value='. $val[0] .' ' . ' >'. $val[1] .'</option>';
                            }
                         }
                       ?>

                    </select></p>
            <button class="btn btn-success" type="submit">Изменить</button>
            <button class="btn btn-success" type="button" onclick="window.history.back()">Назад</button>
        </form>
    </div>

</body>
</html>