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
    <title>Products</title>
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
                    <th>Цена</th>
                    <th>Количество</th>
                    <th>Описание</th>
                    <th>Группа</th>
                </tr>

                <?php

                    /*
                     * Делаем выборку всех строк из таблицы "products"
                     */

                    $products = mysqli_query($connect, "SELECT * FROM `products`");

                    /*
                     * Преобразовываем полученные данные в нормальный массив
                     */

                    $products = mysqli_fetch_all($products);

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
                                <td><a href="product.php?id=<?= $product[0] ?>">Промотр</a></td>
                                <td><a href="update.php?id=<?= $product[0] ?>">Изменить</a></td>
                                <td><a style="color: red;" href="vendor/delete.php?id=<?= $product[0] ?>">Удалить</a></td>
                            </tr>
                        <?php
                    }
                ?>
            </table>
        </div>






        <form action="vendor/create.php" method="post" class='space'>

            <div class='space3'>
                <h3>Добавить новый товар</h3>
                <p>Название</p>
                <input type="text" name="title">
                <p>Цена</p>
                <input type="number" name="price">
                <p>Количество</p>
                <input type="number" name="price">
                <p>Описание</p>
                <textarea name="description"></textarea>
                <p>Товарная группа</p>
                <input type="number" name="price"> <br> <br>



                <button type="submit">Добавить товар
            </div>
        </form>
    </div>
</body>
</html>
