<?php
	setcookie('employee', $employee['full_name'], time() - 3600, "/");
	header('Location:/');
?>
