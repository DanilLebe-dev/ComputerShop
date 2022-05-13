<?php
//Фильтрует значения, удаляя ненужные html символы и символы которые лучше не добавлять в бд
// Trim удаляет лишние пробелы
	$login = filter_var(trim($_POST['login']), 
		FILTER_SANITIZE_STRING);
	$name = filter_var(trim($_POST['name']), 
		FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']),
		FILTER_SANITIZE_STRING);

	if(mb_strlen($login) < 5 || mb_strlen($login) > 90) 
	{
		echo "Недопустимая длина логина";
		exit();
	}
	else if(mb_strlen($name) < 3 || mb_strlen($name) > 50) 
	{
		echo "Недопустимая длина имени";
		exit();
	}
	else if(mb_strlen($password) < 2 || mb_strlen($name) > 80)
	{
		echo "Недопустимая длина пароля (От двух до 8 символов)";
		exit();
	}
	//хэшируем пароль, добавляем соль для того чтобы пароль не разгадали
	$password = $password;

//подключаемся к бд
	$mysql = new mysqli('localhost', 'root', 'root', 'shop');
	$mysql->query("INSERT INTO `employees` (`login`, `password`, `name`)
	VALUES('$login', '$password', '$name')");

	$mysql->close();

	header('Location:/');
?>