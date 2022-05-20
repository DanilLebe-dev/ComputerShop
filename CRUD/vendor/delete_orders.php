<?php

//Удаление заказа

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Получаем ID заказа из адресной строки
 */

$id = $_GET['id'];

/*
 * Делаем запрос на удаление строки из таблицы orders
 */

mysqli_query($connect, "DELETE FROM `orders` WHERE `orders`.`id` = '$id'");

/*
 * Переадресация на главную страницу
 */

header('Location: /orders.php');