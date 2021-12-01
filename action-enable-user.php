<?php
	require_once "php/functions.php";
	checkCurrentUserAdmin();

	toggleUserEnableByLogin($_GET["login"]);

	header("Location: admin-panel.php");
	exit();
?>