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
<body>
	<div class="container mt-4">
		<?php 
			if($_COOKIE['employee'] ==''):
		?>
		<div class="row">
			<div class="col">
				<div class="col">
					<h1>Авторизоваться</h1>
						<form action="auth.php" method="post">
						<input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"> <br>
						<input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль"> <br>
						<button class="btn btn-success" type="submit">Авторизоваться</button>
					</form>
					<p>
						У вас нет аккаунта? - <a href="registration.php">Зарегистрируйтесь!</a>
					</p>
				</div>
			</div>	
		</div>
		<?php else: ?>
			<!-- <p>Привет <?=$_COOKIE['employee']?>. Чтобы выйти нажмите <a href="/exit.php">здесь</a>.</p> -->
			<p>Привет <?=$_COOKIE['employee']?>. <a href="/index1.php">Приступить к работе</a>.</p>
		<?php endif;?>
	</div>
</body>
</html>