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
    <title>Orders</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

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
                    <th>Товар</th>
                    <th>Описание</th>
                    <th>Сумма</th>
                    <th>Количество</th>
                    <th>Дата заказа</th>
                    <th>Клиент</th>
                    <th>Номер телефона</th>
                    <th>Сотрудник</th>
                </tr>

                <?php

                    /*
                     * Делаем выборку строк из таблиц
                     */

                    $orders = mysqli_query($connect, "SELECT orders.id, products.name, products.description, summ, orders.col, date_order, clients.name, orders.phone_number, employees.name From orders, products, clients, employees WHERE orders.id_product = products.id and orders.id_client = clients.id and orders.id_employee = employees.id;");

                    // $orders = mysqli_query($connect, "SELECT * FROM `orders`");



                    /*
                     * Преобразовываем полученные данные в нормальный массив
                     */

                    $orders = mysqli_fetch_all($orders);

                    /*
                     * Перебираем массив и рендерим HTML с данными из массива
                     * Ключ 0 - id
                     * Ключ 1 - id_product
                     * Ключ 2 - description
                     * Ключ 3 - sum
                     * Ключ 4 - col
                     * Ключ 5 - date_order
                     * Ключ 6 - id_client
                     * Ключ 7 - phone_number
                     * Ключ 8 - id_empoyee
                     */

                    foreach ($orders as $order) {
                        ?>
                            <tr>
                                <td><?= $order[0] ?></td>
                                <td><?= $order[1] ?></td>
                                <td><?= $order[2] ?></td>
                                <td><?= $order[3] ?></td>
                                <td><?= $order[4] ?></td>
                                <td><?= $order[5] ?></td>
                                <td><?= $order[6] ?></td>
                                <td><?= $order[7] ?></td>
                                <td><?= $order[8] ?></td>


                                <td><a href="update_orders.php?id=<?= $order[0] ?>">Изменить</a></td>
                                <td><a style="color: red;" href="vendor/delete.php?id=<?= $order[0] ?>">Удалить</a></td>
                            </tr>
                        <?php
                    }
                ?>
            </table>
        </div>






        <form action="vendor/create.php" method="post" class='space'>

            <div class='space3'>
                <h3>Добавить новый заказ</h3>
                <p>Товар
                <input class="form-control" type="text" name="title"></p>
                <p>Описание
                <input class="form-control" type="text" name="description"></p>
                <p>Количество
                <input class="form-control" type="number" name="col"></p>
                <!-- <p>Сумма</p>
                <textarea name="description"></textarea> -->
                <!-- <p>Дата заказа</p>
                <input class="form-control" type="date" name="date_order"> -->
                <p>Клиент
                <input class="form-control" type="number" name="client"></p>
                <p>Номер телефона
                <input class="form-control" type="number" name="phone_number"></p>
                <p>Сотрудник
                <input class="form-control" type="number" name="employee"></p><br>



                <button class="btn btn-success" type="submit">Добавить заказ
            </div>
        </form>
    </div>
</body>
</html>
