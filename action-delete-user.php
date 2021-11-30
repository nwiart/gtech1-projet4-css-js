<?php
	require_once "php/functions.php";
	checkCurrentUserAdmin();

	$pdo = createPDO();
	launchSQL($pdo, "DELETE FROM user WHERE login = :login", array(
		":login" => $_GET["login"]
	));

	header("Location: admin-panel.php");
	exit();
?>