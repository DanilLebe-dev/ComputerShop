<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once 'config/connect.php';

?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Просмотр пароля</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
			<label for="userPassword">Пароль:</label>
			<input id="userPassword" type="password">

        <body>
			<table class='table table-striped'>
				<tr>
					<th>Логин</th>
					<th>Пароль</th>
				</tr>
			</table>
        </body>

</html>
