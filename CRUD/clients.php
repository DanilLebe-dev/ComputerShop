<?php

/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */

require_once 'config/connect.php';

$page = $_GET['page'];
$count = 10; // количество записей на странице
$limit_num = $page*$count; // число для sql запроса как значение для limit

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clients</title>
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
   
        body
            {
            /*background: url(config/94lQI.png) no-repeat;*/
            /*background-size: 100%;*/
            background-image: linear-gradient( 90deg,  rgba(255,244,228,1) 7.1%, rgba(240,246,238,1) 67.4% );
            }

          
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

                                $sql_zapros = "SELECT id, name, phone_number, email FROM `clients` order by clients.id desc";


                                $clients = mysqli_query($connect, $sql_zapros . " limit $limit_num, $count");


                                /*
                                 * Преобразовываем полученные данные в нормальный массив
                                 */

                                $clients = mysqli_fetch_all($clients);

                                /*
                                 * Перебираем массив и рендерим HTML с данными из массива
                                 * Ключ 0 - id
                                 * Ключ 1 - name
                                 * Ключ 2 - phone_number
                                 * Ключ 3 - email
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


                    <a href="newclient.php"><button  class="btn btn-outline-success" type="btn">Добавить Клиена</button></a>
                    <a href="index1.php"><button  class="btn btn-outline-success" type="btn">Назад</button></a>
        </body>
</html>
