<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once 'config/connect.php';

$page = $_GET['page'];
$product_filter = $_GET['id_product'];
$client_filter = $_GET['id_client'];
$employee_filter = $_GET['id_employee'];
$count = 6; // количество записей на странице
$limit_num = $page*$count; // число для sql запроса как значение для limit
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Заказы</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<div class="h1" align="right" style="margin-right: 70px;">
  <?php
echo ($_COOKIE['employee']);
?>
<a href="index.php"><button  style="margin-left: 20px;"class="btn btn-danger" type="btn">Выйти</button></a>
</div>

<style>

    .sq
    {
        bottom: 200px;

    }
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


      <hr style="margin-top: 60px;">
    
    <div style="flex-direction: column;" class='wrap'>

        <div name ="sq">
            <table style="width: 100%;"class='table table-striped'>
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

                    $sql_zapros = "SELECT orders.id, products.name, products.description, summ, orders.col, date_order, clients.name, orders.phone_number, employees.full_name From orders, products, clients, employees WHERE orders.id_product = products.id and orders.id_client = clients.id and orders.id_employee = employees.id";







                    /*
                     * Делаем выборку строк из таблиц
                     */


                    if($product_filter)
                    {
                        $sql_zapros = $sql_zapros . " and products.id = $product_filter";
                    }

                    if($client_filter)
                    {
                        $sql_zapros = $sql_zapros . " and clients.id = $client_filter";
                    }

                    if($employee_filter)
                    {
                        $sql_zapros = $sql_zapros . " and employees.id = $employee_filter";
                    }



                    // else
                    // {
                    //     $orders = mysqli_query($connect, "SELECT orders.id, products.name, products.description, summ, orders.col, date_order, clients.name, orders.phone_number, employees.full_name From orders, products, clients, employees WHERE orders.id_product = products.id and orders.id_client = clients.id and orders.id_employee = employees.id order by orders.id desc limit $limit_num, $count");

                    // }

                    $sql_zapros = $sql_zapros . " order by orders.id desc";
                    $orders = mysqli_query($connect, $sql_zapros . " limit $limit_num, $count");


                    $employee =  mysqli_query($connect, "SELECT id, full_name From employees");
                    $client =  mysqli_query($connect, "SELECT id, name From clients");
                    $products =  mysqli_query($connect, "SELECT id, name, price, col From products");



                    /*
                     * Преобразовываем полученные данные в нормальный массив
                     */

                    $orders = mysqli_fetch_all($orders);
                    $employee = mysqli_fetch_all($employee);
                    $client = mysqli_fetch_all($client);
                    $products = mysqli_fetch_all($products);

                    ?>
                            <div class="nav justify-content-end" style="" >
                                <form method="post" action="vendor/filter_orders.php">
                                    <p style="margin-right: 40px;">Товар
                                    <select onchange="summ1();" class="form-select" name="product_filter" id="product_filter">
                                      <option value="" selected="selected"></option>
                                      <?php
                                         foreach($products as $val){
                                            if($_GET['id_product']==$val[0])
                                            {
                                                echo '<option selected value="'. $val[0] .'" ' . $selected . ' >'. $val[1] .'</option>';
                                            }
                                            else
                                            {
                                                echo '<option value="'. $val[0] .'" ' . $selected . ' >'. $val[1] .'</option>';
                                            }
                                         }
                                       ?>
                                    </select></p>
                                <!-- </div> -->


                                <!-- <div style=""> -->
                                    <p style="margin-right: 40px;">Клиент
                                    <select class="form-select" name="client_filter" id="client_filter"style="margin-right: 65px;">
                                      <option value="" selected="selected"></option>
                                      <?php
                                         foreach($client as $val){
                                            if($_GET['id_client']==$val[0])
                                            {
                                                echo '<option selected value="'. $val[0] .'" ' . $selected . ' >'. $val[1] .'</option>';

                                            }
                                            else
                                            {
                                                echo '<option value="'. $val[0] .'" ' . $selected . ' >'. $val[1] .'</option>';
                                            }
                                         }
                                       ?>
                                    </select></p>
                                
                                    
                                    <p style="margin-right: 30px;">Сотрудник
                                    <select class="form-select" name="employee_filter" id="employee_filter" style="margin-right: 65px;">
                                      <option value="" selected="selected"></option>
                                      <?php
                                         foreach($employee as $val){
                                            if($_GET['id_employee']==$val[0])
                                            {
                                                echo '<option selected value="'. $val[0] .'" ' . $selected . ' >'. $val[1] .'</option>';

                                            }
                                            else
                                            {
                                                echo '<option value="'. $val[0] .'" ' . $selected . ' >'. $val[1] .'</option>';
                                            }
                                         }

                                       ?>
                                    </select></p>

                                    <p style="margin-right: 20px;">
                                    <input type="submit" class="btn btn-outline-success" value="Применить" style="height: 39px; margin-top: 23px">
                                    </p>
                                </div>

                                </form>

                            </div>


                <?php

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
                                <td><a style="color: red;" href="vendor/delete_orders.php?id=<?= $order[0] ?>">Удалить</a></td>
                            </tr>
                        <?php
                    }
                ?>
            </table>
              
                   
                
        </div>
            
    </div>

    <?php
        $orders_col = mysqli_query($connect, $sql_zapros);
        $orders_col = mysqli_fetch_all($orders_col);

        $page_count = floor((count($orders_col)-1) / $count);

     ?>

    <div align="center">
        <?php for($p = 0; $p <= $page_count; $p++) :?>
            <a href="?id_client=<?=$_GET['id_client']?>&page=<?php echo $p;?>"><button class="btn btn-outline-success"><?php echo $p + 1; ?></button></a>
        <?php endfor;?>

    </div>

    <a href="neworder.php"><button  class="btn btn-outline-success" type="btn">Добавить заказ</button></a>
    <a href="index1.php"><button  class="btn btn-outline-success" type="btn">Назад</button></a>
</body> 


<!--
<script>
    function summ1()
    {
        product = document.getElementById('product');
        ans = product.options[product.selectedIndex].text;
        price = ans.split(' ');
        price1 = price[price.length-1];
        price_product = parseInt(price1.substring(2, price1.length-1));

        col = parseInt(document.getElementById('col').value);

        res = col * price_product;

        document.getElementById('summ').value = res;
    }

</script> -->

</html>