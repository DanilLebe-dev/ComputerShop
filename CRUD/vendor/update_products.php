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
$name = $_POST['name'];
$price = $_POST['price'];
$col = $_POST['col'];
$description = $_POST['description'];
$id_product_group = $_POST['group'];


/*
 * Делаем запрос на изменение строки в таблице products
 */

mysqli_query($connect, "UPDATE `products` SET `name` = '$name', `price` = '$price', `col` = '$col', `description` = '$description', `id_product_group` = '$id_product_group' WHERE `products`.`id` = '$id'");


/*
 * Переадресация на страницу с талицей
 */

header('Location: /products.php');
?>