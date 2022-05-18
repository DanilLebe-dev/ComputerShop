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
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>
<style>
    th, td {
        padding: 10px;
    }

    th {
        background: #606060;
        color: #fff;
    }

    td {
        background: #b5b5b5;
    }






    .space {
        padding: 20px; /* Поля */
        background: #E5D3BD; /* Цвет фона */
        border: 2px solid #E81E25; /* Параметры рамки */
        margin-left: 10px;
        width: 400px;
    }

    .space2 {
        padding: 20px; /* Поля */
        background: #E5D3BD; /* Цвет фона */
        border: 2px solid #E81E25; /* Параметры рамки */
        margin-left: auto;
        margin-right: auto;
    }

    .space3 {
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
    <div class='wrap'>




        <div>
            <table class='space'>
                <tr>
                    <th>ID</th>
                    <th>Фамилия</th>
                    <th>Имя</th>
                    <th>Отчество</th>
                    <th>Номер телефона</th>
                    <th>Email</th>
                </tr>

                <?php

                    /*
                     * Делаем выборку всех строк из таблицы "clients"
                     */

                    $clients = mysqli_query($connect, "SELECT * FROM `clients`");

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
                                <td><?= $client[4] ?></td>
                                <td><?= $client[5] ?></td>
                                <td><a href="client.php?id=<?= $client[0] ?>">Промотр</a></td>
                                <td><a href="update.php?id=<?= $client[0] ?>">Изменить</a></td>
                                <td><a style="color: red;" href="vendor/delete.php?id=<?= $client[0] ?>">Удалить</a></td>
                            </tr>
                        <?php
                    }
                ?>
            </table>
        </div>






        <form action="vendor/create.php" method="post" class='space'>

            <div class='space3'>
                <h3>Добавить нового клиента</h3>
                <p>Фамилия</p>
                <input type="text" name="title">
                <p>Имя</p>
                <input type="number" name="price">
                <p>Отчество</p>
                <input type="number" name="price">
                <p>Номер телефона</p>
                <input type="number" name="price">
                <p>Email</p>
                <input type="number" name="price"> <br> <br>



                <button type="submit">Добавить клиента
            </div>
        </form>
    </div>
</body>
</html>
