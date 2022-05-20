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
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>

<div class='btns'>
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="groups.php?id=<?= $product[0] ?>">Товарные группы</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="products.php?id=<?= $product[0] ?>">Товары</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="clients.php?id=<?= $product[0] ?>">Клиенты</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="orders.php?id=<?= $product[0] ?>">Заказы</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="employees.php?id=<?= $product[0] ?>">Сотрудники</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="exit.php?id=<?= $product[0] ?>">Выйти</a>
      </li>
    </ul>
</div>

</body>
</html>
