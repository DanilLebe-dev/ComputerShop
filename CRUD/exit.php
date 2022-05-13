<?php
	setcookie('employee', $employee['name'], time() - 3600, "/");
	header('Location:/');
?>
