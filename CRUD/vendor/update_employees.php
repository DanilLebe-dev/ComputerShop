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
$full_name = $_POST['full_name'];
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];


/*
 * Делаем запрос на изменение строки в таблице employees
 */

mysqli_query($connect, "UPDATE `employees` SET `full_name` = '$full_name', `login` = '$login', `password` = '$password', `email` = '$email' WHERE `employees`.`id` = '$id'");

/*
 * Переадресация на страницу с талицей
 */

header('Location: /employees.php');
?>