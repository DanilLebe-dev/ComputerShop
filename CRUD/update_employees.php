<?php

    /*
     * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
     */

    require_once 'config/connect.php';

    /*
     * Получаем ID продукта из адресной строки - /employees.php?id=1
     */

    $employees_id = $_GET['id'];

    /*
     * Делаем выборку строки с полученным ID выше
     */


    $employees = mysqli_query($connect, "SELECT id, full_name, login, password, email From employees WHERE employees.id = '$employees_id'");

    /*
     * Преобразовывем полученные данные в нормальный массив
     * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
     */

    $employees = mysqli_fetch_assoc($employees);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Изменение заказа</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<style type="text/css">
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
        background: white; /* Цвет фона */
        border: 2px solid black; /* Параметры рамки */
        margin-left: 10px;
        width: 400px;
        text-align: center;
        text-size: 20px
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
        width: 500px;
    }

    .wrap
    {
        display: flex;
        flex-direction: row;
        justify-content: center;
    }


    .textarea
    {
        resize: none; /* Запрещаем изменять размер */
        height: 100px;
    }
</style>

<body>

    <div class=" space space3">
        <big><h3>Изменение заказа</h3>
        <form action="vendor/update_employees.php" method="post">
            <input type="hidden" name="id" value="<?= $employees['id'] ?>">

            <p>Имя
            <input class="form-control" type="text" name="full_name" value="<?= $employees['full_name'] ?>"></p>
            <p>Логин
            <input class="form-control" type="text" name="login" value="<?= $employees['login'] ?>"></p>
            <p>Пароль
            <input class="form-control" type="text" name="password" value="<?= $employees['password'] ?>"></p>
            <p>Email
            <input class="form-control" type="text" name="email" value="<?= $employees['email'] ?>"></p>


            <button class="btn btn-success" type="submit">Изменить</button>
            <button class="btn btn-success" type="button" onclick="window.history.back()">Назад</button>
        </form>

    </div>

</body>
</html>