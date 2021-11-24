<?php
	session_start();

	unset($_SESSION["user"]);
	unset($_SESSION["signin-result"]);

	header("Location: index.php");
	exit();
?>