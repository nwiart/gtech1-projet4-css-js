<?php
	require_once "php/functions.php";
	checkCurrentUserAdmin();

	$newName = $_POST["new-name"];

	$pdo = createPDO();
	executeSQL($pdo, "UPDATE projects SET name = :newname WHERE id = :id", array(
		":newname" => $newName,
		":id" => $_GET["pr"]
	));

	header("Location: admin-panel.php");
	exit();
?>