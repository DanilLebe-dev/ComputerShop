<?php

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */
$product_filter = $_POST['product_filter'];
$client_filter = $_POST['client_filter'];
$employee_filter = $_POST['employee_filter'];

$location = "Location: /orders.php?";

// если есть фильтр по продукту до добаляем его в адресную стороку
if($product_filter)
{
    $location = $location . "&id_product=$product_filter";
}

// если есть фильтр по клиенту до добаляем его в адресную стороку
if($client_filter)
{
    $location = $location . "&id_client=$client_filter";
}

// если есть фильтр по сотруднику до добаляем его в адресную стороку
if($employee_filter)
{
    $location = $location . "&id_employee=$employee_filter";
}

header($location);
?>