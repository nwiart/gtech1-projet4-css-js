<?php
	require_once "php/functions.php";

	deleteUserByLogin($_GET["login"]);

	header("Location: admin-panel.php");
	exit();
?>