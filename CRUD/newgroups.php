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
        <title>Добавить группу</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>


        <body>

            <style>
             body
                {
                /*background: url(config/94lQI.png) no-repeat;*/
                /*background-size: 100%;*/
                background-image: linear-gradient( 90deg,  rgba(255,244,228,1) 7.1%, rgba(240,246,238,1) 67.4% );
                }

            </style>

            <form action="vendor/create_groups.php" method="post">

            <div style="text-align: center; margin-left: 70%" class='row align-items-start'>
                <big><h3>Добавить новую группу</h3>
                <p>Название
                <input class="form-control" type="text" name="name"></p>

                <button class="btn btn-success" type="submit">Добавить группу</button>
                <button class="btn btn-success" type="button" onclick="location.href='http://crud:8080/groups.php'">Назад</button>
            </div>
        </form>
    </div>
        </body>


</html>