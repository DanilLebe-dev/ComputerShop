<?php

//Добавление нового заказ


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
 * Делаем запрос на добавление новой строки в таблицу products
 */

mysqli_query($connect,"INSERT INTO `products` (`id`, `name`, `price`, `col`, `description`, `id_product_group`) VALUES (NULL, '$name', '$price', '$col', '$description', '$id_product_group')");


/*
 * Переадресация на главную страницу
 */

header('Location: /products.php');
?>