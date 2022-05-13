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
				<h1>Зарегистрироваться</h1>
					<form action="check.php" method="post">
						<input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"> <br>
						<input type="text" class="form-control" name="name" id="name" placeholder="Введите имя"> <br>
						<input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль"> <br>
						<button class="btn btn-success" type="submit">Зарегистрировать</button>
						<input type="button" name="" class="btn btn-danger" value="На главную" onclick="history.back()">
					</form>	
				</div>
			</div>	
		</div>
		<?php else: ?>
			<p>Привет <?=$_COOKIE['employee']?>. Чтобы выйти нажмите <a href="/exit.php">здесь</a>.</p>
		<?php endif;?>
	</div>
</body>
</html>