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
    <title>products_groups</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
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
        background: #E5D3BD; /* Цвет фона */
        border: 2px solid #E81E25; /* Параметры рамки */
        margin-left: 10px;
        width: 400px;
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
    <div class='wrap'>




        <div>
            <table class='space'>
                <tr>
                    <th>ID</th>
                    <th>Название</th>
                </tr>

                <?php

                    /*
                     * Делаем выборку всех строк из таблицы "products_groups"
                     */

                    $products_groups = mysqli_query($connect, "SELECT * FROM `products_groups`");

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

                                <td><a href="group.php?id=<?= $group[0] ?>">Промотр</a></td>
                                <td><a href="update.php?id=<?= $group[0] ?>">Изменить</a></td>
                                <td><a style="color: red;" href="vendor/delete.php?id=<?= $group[0] ?>">Удалить</a></td>
                            </tr>
                        <?php
                    }
                ?>
            </table>
        </div>






        <form action="vendor/create.php" method="post" class='space'>

            <div class='space3'>
                <h3>Добавить новую группу</h3>
                <p>Название</p>
                <input type="text" name="title"><br> <br>



                <button type="submit">Добавить группу
            </div>
        </form>
    </div>
</body>
</html>
