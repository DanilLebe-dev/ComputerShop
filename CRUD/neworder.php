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
	<title>Добавить заказ</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>

<style>
    body
    {
        background-image: linear-gradient( 90deg,  rgba(255,244,228,1) 7.1%, rgba(240,246,238,1) 67.4% );
    }

</style>

<?php

/*
 * Делаем выборку строк из таблиц
 */

$orders = mysqli_query($connect, "SELECT orders.id, products.name, products.description, summ, orders.col, date_order, clients.name, orders.phone_number, employees.full_name From orders, products, clients, employees WHERE orders.id_product = products.id and orders.id_client = clients.id and orders.id_employee = employees.id order by orders.id desc limit 20;");

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
	

<form action="vendor/create_orders.php" method="post">

    <div style="text-align: center; margin-left: 70%;" class='row align-items-start'>
        <big><h3>Добавить новый заказ</h3>
        <p>Товар
        <select onchange="summ1();" class="form-select" name="product" id="product">
            <option value="" selected="selected"></option>
            <?php
                foreach($products as $val){
                    echo '<option value='. $val[0] .' ' . $selected . ' >'. $val[1] . ' ($' . ($val[2]) . ')' . '</option>';
                }
            ?>
        </select></p>


        <p>Описание
        <textarea name="description" class="form-control textarea"></textarea></p>

        <p>Сумма
        <input class="form-control" type="number" name="summ" id="summ"></p>

        <p>Количество
        <input onchange="summ1();" class="form-control" type="number" name="col" value=1 id="col"></p>

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
        <button class="btn btn-success" type="button" onclick="location.href='http://crud:8080/orders.php'">Назад</button>

    </div>
</form>
</body>

<script>
    // считает сумму заказа из цены товара умноженного на количество
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
</script>

</html>