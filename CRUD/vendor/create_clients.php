<?php

//Добавление нового клиента


/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$name = $_POST['name'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];


/*
 * Делаем запрос на добавление новой строки в таблицу clients
 */

mysqli_query($connect,"INSERT INTO `clients` (`id`, `name`, `phone_number`, `email`) VALUES (NULL, '$name', '$phone_number', '$email')");


/*
 * Переадресация на главную страницу
 */

header('Location: /clients.php');
?>