<?php
$login = filter_var(trim($_POST['login']), 
		FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']),
		FILTER_SANITIZE_STRING);

//подключаемся к бд
	$mysql = new mysqli('localhost', 'root', 'root', 'shop');


	$result = $mysql->query("SELECT * FROM `employees` WHERE `login` = '$login' AND `password` = '$password'");
	//fetch_assoc - функция поможет все выбранные данные из бд сконвертировать в  привычный массив
	$employee = $result -> fetch_assoc();
	
	if(count($employee) == 0)
	{
		echo "Неверный логин или пароль!";
		exit();
	}

	setcookie('employee', $employee['full_name'], time() + 3600, "/");

	$mysql->close();

	header('Location:/index1.php');
?>