<?php
session_start();

$_SESSION['pog']='Авторизуйтесь :)';
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Форма регистрации</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
</head>
<style>
	.row
	{
		text-align: center;
		margin-left: 90px;
		padding: 20px;
		font-size: small;

	}
</style>
<body>
	<div class="container mt-4">
		<div class="row">
			<div class="col">
				<div class="col">
					<h1 style="margin-right: 150px;">Авторизоваться</h1>
						<form action="auth.php" method="post">
						<input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"> <br>
						<input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль"> <br>
						<button class="btn btn-success" type="submit">Авторизоваться</button>
						<p><?php $res ?></p>
					</form>
				

					<p style="margin-right: 150px;">
						У вас нет аккаунта? - <a href="registration.php">Зарегистрируйтесь!</a>
					</p>
				</div>
			</div>	
		</div>
	</div>
	<p style="border: 2px solid ; border-radius: 15px; text-align: center; padding: 10px; font-weight: bold; width: 500px; margin:0 auto; height: 50px; margin-left: 690px;" class="border">
		
		<?php
		if ($_SESSION['message'])
		{
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		}
		else
		{
			echo $_SESSION['pog'];
		}
		 ?>
	</p>
</body>
</html>