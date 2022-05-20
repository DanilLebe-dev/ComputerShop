<?php

//Добавление новой тованой группы


/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$name = $_POST['name'];


/*
 * Делаем запрос на добавление новой строки в таблицу products_groups
 */

mysqli_query($connect, "INSERT INTO `products_groups` (`id`, `name`) VALUES (NULL, '$name')");


/*
 * Переадресация на главную страницу
 */

header('Location: /groups.php');
?>