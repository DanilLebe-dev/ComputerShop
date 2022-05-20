<?php

//Добавление нового заказ


/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$id_product = $_POST['product'];
$description = $_POST['description'];
$summ = $_POST['summ'];
$col = $_POST['col'];
$date_order = $_POST['date_order'];
$id_client = $_POST['client'];
$phone_number = $_POST['phone_number'];
$id_employee = $_POST['employee'];

/*
 * Делаем запрос на добавление новой строки в таблицу orders
 */

mysqli_query($connect,"INSERT INTO `orders` (`id`, `id_product`, `description`, `summ`, `col`, `date_order`, `id_client`, `phone_number`, `id_employee`) VALUES (NULL, '$id_product', '$description', '$summ', '$col', '$date_order', '$id_client', '$phone_number', '$id_employee')");


/*
 * Переадресация на главную страницу
 */

header('Location: /orders.php');
?>