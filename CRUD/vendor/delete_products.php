<?php

//Удаление заказа

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Получаем ID товара из адресной строки
 */

$id = $_GET['id'];

/*
 * Делаем запрос на удаление строки из таблицы products
 */

mysqli_query($connect, "DELETE FROM `products` WHERE `products`.`id` = '$id'");

/*
 * Переадресация на главную страницу
 */

header('Location: /products.php');