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
    <title>Employees</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<div class="h1" align="right" style="margin-right: 70px;">
    <?php
        echo ($_COOKIE['employee']); // отображение имени авторизованного сотрудника на шапке сайта
    ?>
    <a href="index.php"><button  style="margin-left: 20px;"class="btn btn-danger" type="btn">Выйти</button></a>
</div>

<style>
    body
    {
        background-image: linear-gradient( 90deg,  rgba(255,244,228,1) 7.1%, rgba(240,246,238,1) 67.4% );
    }

    th, td
    {
        padding: 10px;
    }

    th
    {
        background: #606060;
        color: #fff;
    }

    td
    {
        background: #b5b5b5;
    }

    .blr
    {
        /* Размытие */
        filter: blur(3px);
    }
   .blr:hover
    {
        filter: blur(0px);;
    }

    .space
    {
        padding: 30px; /* Поля */
        background: white; /* Цвет фона */
        border: 2px solid black; /* Параметры рамки */
        margin-left: 20px;
        width: 400px;
        margin-middle: auto;
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
                    <!-- поля таблицы и их названия-->
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Логин</th>
                    <th>Пароль</th>
                    <th>Email</th>
                    <th></th>

                </tr>

                <?php
                /*
                 * Делаем выборку всех строк из таблицы "employees"
                 */
                $employees = mysqli_query($connect, "SELECT * FROM `employees` order by employees.id desc limit 20;");

                /*
                 * Преобразовываем полученные данные в нормальный массив
                 */
                $employees = mysqli_fetch_all($employees);

                /*
                 * Перебираем массив и рендерим HTML с данными из массива
                 * Ключ 0 - id
                 * Ключ 1 - full_name
                 * Ключ 2 - login
                 * Ключ 3 - password
                 * Ключ 4 - Email
                 */
                foreach ($employees as $employee) {
                    ?>
                        <tr>
                            <td><?= $employee[0] ?></td>
                            <td><?= $employee[1] ?></td>
                            <td><?= $employee[2] ?></td>
                            <td class="blr"><?= $employee[3] ?></td>
                            <td><?= $employee[4] ?></td>
                            <td><a href="update_employees.php?id=<?= $employee[0] ?>">Изменить</a></td>
                            <td><a style="color: red;" href="vendor/delete_employees.php?id=<?= $employee[0] ?>">Удалить</a></td>
                        </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
    <a href="newemployees.php"><button  class="btn btn-outline-success" type="btn">Добавить Сотрудника</button></a>
    <a href="index1.php"><button  class="btn btn-outline-success" type="btn">Назад</button></a>
</body>
</html>
