<?php
	require_once "php/functions.php";
	checkCurrentUserAdmin();

	deleteUserByLogin($_GET["login"]);

	header("Location: admin-panel.php");
	exit();
?>