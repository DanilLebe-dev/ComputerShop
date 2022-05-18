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

    // $order = mysqli_query($connect, "SELECT orders.id, products.name, products.description, summ, orders.col, date_order, clients.name, orders.phone_number, employees.name From orders, products, clients, employees WHERE orders.id_product = products.id and orders.id_client = clients.id and orders.id_employee = employees.id WHERE `id` = '$order_id'");

    // $order = mysqli_query($connect, "SELECT * FROM `orders` WHERE `id` = '$order_id'");

    $order = mysqli_query($connect, "SELECT orders.id, products.name as product_name, products.description, summ, orders.col, date_order, clients.name as client_name, orders.phone_number, employees.full_name From orders, products, clients, employees WHERE orders.id_product = products.id and orders.id_client = clients.id and orders.id_employee = employees.id and orders.id = '$order_id'");

    $employee =  mysqli_query($connect, "SELECT id, full_name From employees");
    $client =  mysqli_query($connect, "SELECT id, name From clients");
    $products =  mysqli_query($connect, "SELECT id, name From products");



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
</head>
<body>
    <h3>Изменение заказа</h3>
    <form action="vendor/update_orders.php" method="post">
        <input type="hidden" name="id" value="<?= $order['id'] ?>">
        <p>Товар</p>
                <!-- <input class="form-control" type="text" name="title"></p> -->
                <select name="product" id="country">
                  <!-- <option value="" selected="selected"></option> -->
                  <?php
                     foreach($products as $val){
                        if ($order['product_name'] == $val[1])
                        {
                            echo '<option value='. $val[0] .' ' . selected . ' >'. $val[1] .'</option>';

                        }
                        else
                        {
                            echo '<option value='. $val[0] .' ' . ' >'. $val[1] .'</option>';
                        }
                     }
                   ?>

                </select>
        <p>Описание</p>
        <textarea name="description"><?= $order['description'] ?></textarea>
        <p>Сумма</p>
        <input type="number" name="summ" value="<?= $order['summ'] ?>">
        <p>Количество</p>
        <input type="number" name="col" value="<?= $order['col'] ?>">
        <p>Дата заказа</p>
        <input type="date" name="date_order" value="<?= $order['date_order'] ?>">
        <p>Клиент</p>
        <!-- <input type="text" name="id_client" value="<?= $order['client_name'] ?>"> -->
        <select name="client" id="country">
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

                </select>
        <p>Номер телефона</p>
        <input type="number" name="phone_number" value="<?= $order['phone_number'] ?>">
        <p>Сотрудник</p>
        <!-- <input type="text" name="id_employee" value="<?= $order['name'] ?>"> -->
        <select name="employee" id="country">
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

                </select>

       <!--  <p>Сотрудник</p> -->
        <!-- <select name="country" id="country">
          <option value="" selected="selected">Please Choose</option>
          <?php
             foreach($employee as $key => $val){
                 // $selected = ($employee['full_name'] == 'CAMEROON') ? 'selected="selected"' : '';
                  echo '<option value="'. $employee['full_name'] .'" ' . $selected . ' >'. $key .'</option>';
             }
           ?>
        </select> -->


      <!--   <?php
        foreach($employee as $value)
        {
        echo $value;
        }
        ?> -->






         <br> <br>
        <button type="submit">Изменить</button>
    </form>
</body>
</html>



<!--
<input type="hidden" name="id" value="<?= $order['id'] ?>">
        <p>Товар</p>
        <input type="text" name="id_product" value="<?= $order['product_name'] ?>">
        <p>Описание</p>
        <textarea name="description"><?= $order['description'] ?></textarea>
        <p>Сумма</p>
        <input type="number" name="summ" value="<?= $order['summ'] ?>">
        <p>Количество</p>
        <input type="number" name="col" value="<?= $order['col'] ?>">
        <p>Дата заказа</p>
        <input type="date" name="date_order" value="<?= $order['date_order'] ?>">
        <p>Клиент</p>
        <input type="text" name="id_client" value="<?= $order['client_name'] ?>">
        <p>Номер телефона</p>
        <input type="number" name="phone_number" value="<?= $order['phone_number'] ?>">
        <p>Сотрудник</p>
        <input type="text" name="id_employee" value="<?= $order['name'] ?>"> -->