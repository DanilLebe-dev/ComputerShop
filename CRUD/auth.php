<?php
$login = filter_var(trim($_POST['login']), 
		FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']),
		FILTER_SANITIZE_STRING);

	//$password = md5($password."soleniy4421");

//подключаемся к бд
	$mysql = new mysqli('localhost', 'root', 'root', 'shop');


	$result = $mysql->query("SELECT * FROM `employees` WHERE `login` = '$login' AND `password` = '$password'");
	//fetch_assoc - функция поможет все выбранные данные из бд сконвертировать в  привычный массив
	$employee = $result -> fetch_assoc();
	
	if(count($employee) == 0)
	{
		echo "Такой пользователь не найден!";
		exit();
	}

	setcookie('employee', $employee['name'], time() + 3600, "/");

	$mysql->close();

	header('Location:/');
?>
