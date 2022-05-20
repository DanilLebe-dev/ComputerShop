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

/*
 * Делаем запрос на изменение строки в таблице orders
 */

mysqli_query($connect, "UPDATE `products_groups` SET `name` = '$name' WHERE `products_groups`.`id` = '$id'");


/*
 * Переадресация на страницу с таблицей
 */

header('Location: /groups.php');
?>