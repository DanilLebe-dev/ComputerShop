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
    <title>Orders</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
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
        padding: 20px; /* Поля */
        background: white; /* Цвет фона */
        border: 2px solid black; /* Параметры рамки */
        margin-left: 10px;
        width: 400px;
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


    .textarea
    {
        resize: none; /* Запрещаем изменять размер */
        height: 100px;

    }


</style>
<body>
    <div class='wrap'>

        <div class="border border-dark"> 

            <table class='table table-striped'>
                <tr>
                    <th>ID</th>
                    <th>Товар</th>
                    <th>Описание</th>
                    <th>Сумма</th>
                    <th>Количество</th>
                    <th>Дата заказа</th>
                    <th>Клиент</th>
                    <th>Номер телефона</th>
                    <th>Сотрудник</th>
                </tr>

                <?php

                    /*
                     * Делаем выборку строк из таблиц
                     */

                    $orders = mysqli_query($connect, "SELECT orders.id, products.name, products.description, summ, orders.col, date_order, clients.name, orders.phone_number, employees.full_name From orders, products, clients, employees WHERE orders.id_product = products.id and orders.id_client = clients.id and orders.id_employee = employees.id;");

                    $employee =  mysqli_query($connect, "SELECT id, full_name From employees");
                    $client =  mysqli_query($connect, "SELECT id, name From clients");
                    $products =  mysqli_query($connect, "SELECT id, name From products");


                    // $employee = array('vas', 'danbas');

                    // $orders = mysqli_query($connect, "SELECT * FROM `orders`");



                    /*
                     * Преобразовываем полученные данные в нормальный массив
                     */

                    $orders = mysqli_fetch_all($orders);
                    $employee = mysqli_fetch_all($employee);
                    $client = mysqli_fetch_all($client);
                    $products = mysqli_fetch_all($products);

                    /*
                     * Перебираем массив и рендерим HTML с данными из массива
                     * Ключ 0 - id
                     * Ключ 1 - id_product
                     * Ключ 2 - description
                     * Ключ 3 - sum
                     * Ключ 4 - col
                     * Ключ 5 - date_order
                     * Ключ 6 - id_client
                     * Ключ 7 - phone_number
                     * Ключ 8 - id_empoyee
                     */

                    foreach ($orders as $order) {
                        ?>
                            <tr>
                                <td><?= $order[0] ?></td>
                                <td><?= $order[1] ?></td>
                                <td><?= $order[2] ?></td>
                                <td><?= $order[3] ?></td>
                                <td><?= $order[4] ?></td>
                                <td><?= $order[5] ?></td>
                                <td><?= $order[6] ?></td>
                                <td><?= $order[7] ?></td>
                                <td><?= $order[8] ?></td>


                                <td><a href="update_orders.php?id=<?= $order[0] ?>">Изменить</a></td>
                                <td><a style="color: red;" href="vendor/delete.php?id=<?= $order[0] ?>">Удалить</a></td>
                            </tr>
                        <?php
                    }
                ?>
            </table>
        </div>






        <form action="vendor/create.php" method="post" class='space'>

            <div class='row align-items-start'>
                <big><h3>Добавить новый заказ</h3>
                <p>Товар
                <select class="form-select" name="product" id="country">
                  <option value="" selected="selected"></option>
                  <?php
                     foreach($products as $val){
                          echo '<option value='. $val[0] .' ' . $selected . ' >'. $val[1] .'</option>';
                     }
                   ?>
                </select></p>
                <p>Описание
                <textarea name="description" class="form-control textarea"></textarea></p>

                <p>Сумма
                <input class="form-control" type="number" name="summ"></p>
                <p>Количество
                <input class="form-control" type="number" name="col" value=1></p>
                <p>Дата заказа
                <input class="form-control" type="date" name="date_order" value="<?php echo date('Y-m-d'); ?>" /></p>
                <p>Клиент
                <select class="form-select" name="client" id="country">
                  <option value="" selected="selected"></option>
                  <?php
                     foreach($client as $val){

                          echo '<option value="'. $val[0] .'" ' . $selected . ' >'. $val[1] .'</option>';
                     }
                   ?>
                </select></p>
                <p>Номер телефона
                <input class="form-control" type="number" name="phone_number"></p>

                <p>Сотрудник
                <select class="form-select" name="employee" id="country">
                  <option value="" selected="selected"></option>
                  <?php
                     foreach($employee as $val){
                          echo '<option value="'. $val[0] .'" ' . $selected . ' >'. $val[1] .'</option>';
                     }
                   ?>
                </select></p>





                <button class="btn btn-success" type="submit">Добавить заказ</button>
                <button class="btn btn-success" type="button" onclick="location.href='http://crud:8080/index1.php'">Назад</button>
            </div>
        </form>
    </div>
</body>
</html>
