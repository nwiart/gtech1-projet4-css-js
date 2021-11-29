<?php
	require_once "php/functions.php";
	checkCurrentUserAdmin();

	activateUserByLogin($_GET["login"]);

	header("Location: admin-panel.php");
	exit();
?>
