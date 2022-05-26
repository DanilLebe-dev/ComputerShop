<?php

require_once '../config/connect.php';

/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */

$product_filter = $_POST['product_filter'];
$client_filter = $_POST['client_filter'];
$employee_filter = $_POST['employee_filter'];

echo $client_filter;

$location = "Location: /orders.php?";

if($product_filter)
{
    $location = $location . "&id_product=$product_filter";
}

if($client_filter)
{
    $location = $location . "&id_client=$client_filter";
}

if($employee_filter)
{
    $location = $location . "&id_employee=$employee_filter";
}


header($location);
?>