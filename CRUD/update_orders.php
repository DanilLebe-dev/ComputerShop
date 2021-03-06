<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once 'config/connect.php';

/*
 * Получаем ID продукта из адресной строки - /orders.php?id=1
 */

$order_id = $_GET['id'];

/*
 * Делаем выборку строки с полученным ID выше
 */

$order = mysqli_query($connect, "SELECT orders.id, products.name as product_name, products.description, summ, orders.col, date_order, clients.name as client_name, orders.phone_number, employees.full_name From orders, products, clients, employees WHERE orders.id_product = products.id and orders.id_client = clients.id and orders.id_employee = employees.id and orders.id = '$order_id'");

$employee =  mysqli_query($connect, "SELECT id, full_name From employees");
$client =  mysqli_query($connect, "SELECT id, name From clients");
$products =  mysqli_query($connect, "SELECT id, name, price, col From products");


/*
 * Преобразовывем полученные данные в нормальный массив
 * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
 */

$order = mysqli_fetch_assoc($order);
$employee = mysqli_fetch_all($employee);
$client = mysqli_fetch_all($client);
$products = mysqli_fetch_all($products);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Изменение заказа</title>
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

    <div class="space space3">
        <h3>Изменение заказа</h3>
        <form action="vendor/update_orders.php" method="post">
            <input type="hidden" name="id" value="<?= $order['id'] ?>">
            <big><p>Товар
                    <!-- <input class="form-control" type="text" name="title"></p> -->
                    <select onchange="summ1();" class="form-select" name="product" id="product">
                      <!-- <option value="" selected="selected"></option> -->
                      <?php
                         foreach($products as $val){
                            if ($order['product_name'] == $val[1])
                            {
                                echo '<option value='. $val[0] .' ' . selected . ' >'. $val[1] . ' ($' . ($val[2]) . ')' .'</option>';

                            }
                            else
                            {
                                echo '<option value='. $val[0] .' ' . $selected . ' >'. $val[1] . ' ($' . ($val[2]) . ')' . '</option>';
                            }
                         }
                       ?>

                    </select></p>



            <p>Описание
            <textarea class="form-control textarea" name="description"><?= $order['description'] ?></textarea></p>
            <p>Сумма
            <input class="form-control" type="number" name="summ" id="summ" value="<?= $order['summ'] ?>"></p>
            <p>Количество
            <input onchange="summ1();" class="form-control" type="number" name="col" id="col" value="<?= $order['col'] ?>"></p>
            <p>Дата заказа
            <input class="form-control" type="date" name="date_order" value="<?= $order['date_order'] ?>"></p>
            <p>Клиент
            <select class="form-select" name="client" id="country">
                      <!-- <option value="" selected="selected"></option> -->
                      <?php
                         foreach($client as $val){
                            if ($order['client_name'] == $val[1])
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
            <p>Номер телефона
            <input class="form-control" type="number" name="phone_number" value="<?= $order['phone_number'] ?>"></p>
            <p>Сотрудник
            <!-- <input type="text" name="id_employee" value="<?= $order['name'] ?>"> -->
            <select class="form-select" name="employee" id="country">
                      <!-- <option value="" selected="selected"></option> -->
                      <?php
                         foreach($employee as $val){
                            if ($order['full_name'] == $val[1])
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

<script>
    function summ1()
    {
        product = document.getElementById('product');
        ans = product.options[product.selectedIndex].text;
        price = ans.split(' ');
        price1 = price[price.length-1];
        price_product = parseInt(price1.substring(2, price1.length-1));

        col = parseInt(document.getElementById('col').value);

        res = col * price_product;

        document.getElementById('summ').value = res;
    }

</script>

</body>
</html>