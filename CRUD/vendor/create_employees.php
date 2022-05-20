<?php

//Добавление нового заказ


/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$full_name = $_POST['full_name'];
$login = $_POST['login'];
$password = $_POST['password'];
$email = $_POST['email'];

/*
 * Делаем запрос на добавление новой строки в таблицу employees
 */

mysqli_query($connect,"INSERT INTO `employees` (`id`, `full_name`, `login`, `password`, `email`) VALUES (NULL, '$full_name', '$login', '$password', '$email')");


/*
 * Переадресация на главную страницу
 */

header('Location: /employees.php');
?>