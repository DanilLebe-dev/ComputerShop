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
        <title>Добавить нового сотрудника</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>


    <body>

        <style>
        body
        {
            background-image: linear-gradient( 90deg,  rgba(255,244,228,1) 7.1%, rgba(240,246,238,1) 67.4% );
        }

        </style>

        <form action="vendor/create_employees.php" method="post">
            <div style="text-align: center; margin-left: 70%;" class='row align-items-start'>
                <big><h3>Добавить нового сотрудника</h3>
                <p>Имя
                <input class="form-control" type="text" name="full_name"></p>
                <p>Логин
                <input class="form-control" type="text" name="login"></p>
                <p>Пароль
                <input class="form-control" type="text" name="password"></p>
                <p>Email
                <input class="form-control" type="text" name="email"></p>

                <button class="btn btn-success" type="submit">Добавить сотрудника</button>
                <button class="btn btn-success" type="button" onclick="location.href='http://crud:8080/employees.php'">Назад</button>
            </div>
        </form>
    </body>
</html>