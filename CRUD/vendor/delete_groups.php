<?php

//Удаление товарной группы

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Получаем ID товарной группы из адресной строки
 */

$id = $_GET['id'];

/*
 * Делаем запрос на удаление строки из таблицы products_groups
 */

mysqli_query($connect, "DELETE FROM `products_groups` WHERE `products_groups`.`id` = '$id'");

/*
 * Переадресация на главную страницу
 */

header('Location: /groups.php');