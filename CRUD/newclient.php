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
        <title>Добавить нового клиента</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
    </head>


        <body>




        <form action="vendor/create_clients.php" method="post">

            <div style="text-align: center; margin-left: 70%;"class='row align-items-start'>
                <big><h3>Добавить нового клиента</h3>
                <p>Имя<br>
                <input class="form-control" type="text" name="name"></p>
                <p>Номер телефона<br>
                <input class="form-control" type="number" name="phone_number"></p>
                <p>Email<br>
                <input class="form-control" type="text" name="email"></p>


                <button class="btn btn-success" type="submit">Добавить клиента</button>
                <button class="btn btn-success" type="button" onclick="location.href='http://crud:8080/clients.php'">Назад</button>
            </div>
        </form>

        </body>

</html>