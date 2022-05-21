<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once 'config/connect.php';

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clients</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
    <style>
    /*    th, td {
            padding: 10px;
        }

        th {
            background: #606060;
            color: #fff;
        }

        td {
            background: #b5b5b5;
        }
    */

        .space 
        {
            padding: 20px; /* Поля */
            background: white; /* Цвет фона */
            border: 2px solid black; /* Параметры рамки */
            margin-left: 10px;
            width: 400px;
            text-align: center;
        }

        .space2 
        {
            padding: 20px; /* Поля */
            background: #E5D3BD; /* Цвет фона */
            border: 2px solid #E81E25; /* Параметры рамки */
            margin-left: auto;
            margin-right: auto;
        }

        .space3 
        {
            margin: 0 auto;
            width: 200px;
        }

        .wrap
        {
            display: flex;
            flex-direction: row;
            justify-content: center;
        }


    </style>
        <body>
            <hr style="margin-top: 80px;">

                <div style="flex-direction: column;" class='wrap'>

                    <div>
                        <table class='table table-striped'>
                            <tr>
                                <th>ID</th>
                                <th>Имя</th>
                                <th>Номер телефона</th>
                                <th>Email</th>
                            </tr>

                            <?php

                                /*
                                 * Делаем выборку всех строк из таблицы "clients"
                                 */

                                $clients = mysqli_query($connect, "SELECT * FROM `clients` order by clients.id desc limit 20;");

                                /*
                                 * Преобразовываем полученные данные в нормальный массив
                                 */

                                $clients = mysqli_fetch_all($clients);

                                /*
                                 * Перебираем массив и рендерим HTML с данными из массива
                                 * Ключ 0 - id
                                 * Ключ 1 - surname
                                 * Ключ 2 - name
                                 * Ключ 3 - patronymic
                                 * Ключ 4 - phone_number
                                 * Ключ 5 - email
                                 */

                                foreach ($clients as $client) {
                                    ?>
                                        <tr>
                                            <td><?= $client[0] ?></td>
                                            <td><?= $client[1] ?></td>
                                            <td><?= $client[2] ?></td>
                                            <td><?= $client[3] ?></td>
                                            <td><a href="update_clients.php?id=<?= $client[0] ?>">Изменить</a></td>
                                            <td><a style="color: red;" href="vendor/delete_clients.php?id=<?= $client[0] ?>">Удалить</a></td>
                                        </tr>
                                    <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
                    <a href="newclient.php"><button  class="btn btn-outline-success" type="btn">Добавить Клиена</button></a>
                    <a href="index1.php"><button  class="btn btn-outline-success" type="btn">Назад</button></a>
        </body>
</html>
