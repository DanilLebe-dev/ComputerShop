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
        padding: 30px; /* Поля */
        background: white; /* Цвет фона */
        border: 2px solid black; /* Параметры рамки */
        margin-left: 20px;
        width: 400px;
        margin-middle: auto;
        text-align: center;
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




        <div class="border border-dark">
            <table class='table table-striped'>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Логин</th>
                    <th>Пароль</th>
                    <th>Email</th>
                </tr>

                <?php

                    /*
                     * Делаем выборку всех строк из таблицы "employees"
                     */

                    $employees = mysqli_query($connect, "SELECT * FROM `employees`");

                    /*
                     * Преобразовываем полученные данные в нормальный массив
                     */

                    $employees = mysqli_fetch_all($employees);

                    /*
                     * Перебираем массив и рендерим HTML с данными из массива
                     * Ключ 0 - id
                     * Ключ 1 - surname
                     * Ключ 2 - name
                     * Ключ 3 - patronymic
                     * Ключ 4 - login
                     * Ключ 5 - password
                     * Ключ 6 - Email
                     */

                    foreach ($employees as $employee) {
                        ?>
                            <tr>
                                <td><?= $employee[0] ?></td>
                                <td><?= $employee[1] ?></td>
                                <td><?= $employee[2] ?></td>
                                <td><?= $employee[3] ?></td>
                                <td><?= $employee[4] ?></td>
                                <td><a href="update_employees.php?id=<?= $employee[0] ?>">Изменить</a></td>
                                <td><a style="color: red;" href="vendor/delete_employees.php?id=<?= $employee[0] ?>">Удалить</a></td>
                            </tr>
                        <?php
                    }
                ?>
            </table>
        </div>






        <form action="vendor/create_employees.php" method="post" class='space'>

            <div class='row align-items-start'>
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
                <button class="btn btn-success" type="button" onclick="location.href='http://crud:8080/index1.php'">Назад</button>
            </div>
        </form>
    </div>
</body>
</html>
