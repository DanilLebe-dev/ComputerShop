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
 * Делаем запрос на удаление строки из таблицы clients
 */

mysqli_query($connect, "DELETE FROM `clients` WHERE `clients`.`id` = '$id'");

/*
 * Переадресация на главную страницу
 */

header('Location: /clients.php');