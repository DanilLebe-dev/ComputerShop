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

    $order = mysqli_query($connect, "SELECT * FROM `orders` WHERE `id` = '$order_id'");

    /*
     * Преобразовывем полученные данные в нормальный массив
     * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
     */

    $order = mysqli_fetch_assoc($order);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Изменение заказа</title>
</head>
<body>
    <h3>Изменение заказа</h3>
    <form action="vendor/update.php" method="post">
        <input type="hidden" name="id" value="<?= $orders['id'] ?>">
        <p>Товар</p>
        <input type="text" name="id_product" value="<?= $orders['id_product'] ?>">
        <p>Описание</p>
        <textarea name="description"><?= $orders['description'] ?></textarea>
        <p>Сумма</p>
        <input type="number" name="summ" value="<?= $orders['summ'] ?>">
        <p>Количество</p>
        <input type="number" name="col" value="<?= $orders['col'] ?>">
        <p>Дата заказа</p>
        <input type="date" name="date_order" value="<?= $orders['date_order'] ?>">
        <p>Клиент</p>
        <input type="number" name="client" value="<?= $orders['client'] ?>">
        <p>Номер телефона</p>
        <input type="number" name="phone_number" value="<?= $orders['phone_number'] ?>">
        <p>Сотрудник</p>
        <input type="number" name="employee" value="<?= $orders['employee'] ?>"> <br> <br>
        <button type="submit">Изменить</button>
    </form>
</body>
</html>