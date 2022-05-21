<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once 'config/connect.php';

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Добавить новый товар</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>


        <body>
            <?php
                $group =  mysqli_query($connect, "SELECT id, name From products_groups");
                 $group = mysqli_fetch_all($group);
            ?>
            <form action="vendor/create_products.php" method="post">

            <div style="text-align: center; margin-left: 70%;"class='row align-items-start'>
                <big><h3>Добавить новый товар</h3>
                <p>Название
                <input class="form-control" type="text" name="name"></p>
                <p>Цена
                <input class="form-control" type="number" name="price"></p>
                <p>Количество
                <input class="form-control" type="number" name="col"></p>
                <p>Описание
                <textarea class="form-control textarea" name="description"></textarea></p>
                <p>Товарная группа
                <select class="form-select" class="form-select" name="group" id="country">
                  <option value="" selected="selected"></option>
                  <?php
                     foreach($group as $val){
                          echo '<option value="'. $val[0] .'" ' . $selected . ' >'. $val[1] .'</option>';
                     }
                   ?>
                </select></p>

                <button class="btn btn-success" type="submit">Добавить товар</button>
                <button class="btn btn-success" type="button" onclick="location.href='http://crud:8080/products.php'">Назад</button>
            </div>
        </form>
        </body>

</html>