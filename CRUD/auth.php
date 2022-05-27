<?php

session_start();


$login = filter_var(trim($_POST['login']), 
		FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']),
		FILTER_SANITIZE_STRING);

//подключаемся к бд
	$mysql = new mysqli('localhost', 'root', 'root', 'shop');

	// запрос на наличие введеного логина и пароля в таблице с сотрудниками
	$result = $mysql->query("SELECT * FROM `employees` WHERE `login` = '$login' AND `password` = '$password'");
	//fetch_assoc - функция поможет все выбранные данные из бд сконвертировать в  привычный массив
	$employee = $result -> fetch_assoc();
	
	// Если пользователь не найден
	if(!$employee)

	{
		$_SESSION['message'] = 'Неверный логин или пароль :(';

		header('Location:/index.php');

		exit();
	}

	setcookie('employee', $employee['full_name'], time() + 3600, "/");


	setcookie('prava', $employee['is_admin'], time() + 3600, "/");
	
	$mysql->close();


	header('Location:/index1.php');
?>


