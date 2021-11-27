<?php
	require_once "php/functions.php";
	checkCurrentUserAdmin();

	deleteProjectById($_GET["pr"]);

	header("Location: admin-panel.php");
	exit();
?>