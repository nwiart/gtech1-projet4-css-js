<?php
	require_once "php/functions.php";
	checkCurrentUserAdmin();

	echo $_GET["id"];

	$pdo = createPDO();
	launchSQL($pdo, "UPDATE main_page SET " . ($_GET["id"] == 0 ? "ethan_description" : "noah_description") . " = :desc", array(":desc" => $_POST["desc"]));

	header("Location: admin-panel.php");
	exit();
?>
