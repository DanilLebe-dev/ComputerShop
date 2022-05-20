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
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];


/*
 * Делаем запрос на изменение строки в таблице clients
 */

mysqli_query($connect, "UPDATE `clients` SET `name` = '$name', `phone_number` = '$phone_number', `email` = '$email' WHERE `clients`.`id` = '$id'");


/*
 * Переадресация на страницу с талицей
 */

header('Location: /clients.php');
?>