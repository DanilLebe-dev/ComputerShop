<?php

//Обновление информации о продукте

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$id = $_POST['id'];
$id_product = $_POST['product'];
$description = $_POST['description'];
$summ = $_POST['summ'];
$col = $_POST['col'];
$date_order = $_POST['date_order'];
$id_client = $_POST['client'];
$phone_number = $_POST['phone_number'];
$id_employee = $_POST['employee'];


/*
 * Делаем запрос на изменение строки в таблице orders
 */

mysqli_query($connect, "UPDATE `orders` SET `id_product` = '$id_product', `description` = '$description', `summ` = '$summ', `col` = '$col', `date_order` = '$date_order', `id_client` = '$id_client', `phone_number` = '$phone_number', `id_employee` = '$id_employee' WHERE `orders`.`id` = '$id'");

/*
 * Переадресация на страницу с талицей
 */

header('Location: /orders.php');
?>