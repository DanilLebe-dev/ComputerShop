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
    <title>Товарные группы</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

</head>
<div class="h1" align="right" style="margin-right: 70px;">
  <?php
echo ($_COOKIE['employee']);
?>
<a href="index.php"><button  style="margin-left: 20px;"class="btn btn-danger" type="btn">Выйти</button></a>
</div>

<style>
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


</style>
<body>



  <hr style="margin-top: 80px;">

    <div style="flex-direction: column;" class='wrap'>

        <div>
            <table class='table table-striped'>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                </tr>

                <?php

                    /*
                     * Делаем выборку всех строк из таблицы "products_groups"
                     */

                    $products_groups = mysqli_query($connect, "SELECT * FROM `products_groups` order by products_groups.id desc limit 20;");

                    /*
                     * Преобразовываем полученные данные в нормальный массив
                     */

                    $products_groups = mysqli_fetch_all($products_groups);

                    /*
                     * Перебираем массив и рендерим HTML с данными из массива
                     * Ключ 0 - id
                     * Ключ 1 - name

                     */

                    foreach ($products_groups as $group) {
                        ?>
                            <tr>
                                <td><?= $group[0] ?></td>
                                <td><?= $group[1] ?></td>

                                <td><a href="update_groups.php?id=<?= $group[0] ?>">Изменить</a></td>
                                <td><a style="color: red;" href="vendor/delete_groups.php?id=<?= $group[0] ?>">Удалить</a></td>
                            </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
        <div>
    <a href="newgroups.php"><button  class="btn btn-outline-success" type="btn">Добавить заказ</button></a>
    <a href="index1.php"><button  class="btn btn-outline-success" type="btn">Назад</button></a>
    </div>
</body>
</html>
