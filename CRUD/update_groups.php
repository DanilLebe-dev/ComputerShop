<?php

    /*
     * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
     */

    require_once 'config/connect.php';

    /*
     * Получаем ID продукта из адресной строки - /products_groups.php?id=1
     */

    $group_id = $_GET['id'];

    /*
     * Делаем выборку строки с полученным ID выше
     */

    $group = mysqli_query($connect, "SELECT id, name From products_groups WHERE products_groups.id = '$group_id'");


    /*
     * Преобразовывем полученные данные в нормальный массив
     * Используя функцию mysqli_fetch_assoc массив будет иметь ключи равные названиям столбцов в таблице
     */

    $group = mysqli_fetch_assoc($group);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <big><title>Изменение товарной группы</title>
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

    <div class="space space3">
        <h3>Изменение заказа</h3>
        <form action="vendor/update_groups.php" method="post">
            <input type="hidden" name="id" value="<?= $group['id'] ?>">
            <p>Название товарной группы
            <input class="form-control" type="text" name="name" value="<?= $group['name'] ?>"></p>
            <button class="btn btn-success" type="submit">Изменить</button>
            <button class="btn btn-success" type="button" onclick="window.history.back()">Назад</button>
        </form>

    </div>

</body>
</html>