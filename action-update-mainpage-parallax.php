<?php
	require_once "php/functions.php";

	echo $_GET["id"];

	$pdo = createPDO();
	launchSQL($pdo, "UPDATE main_page SET " . ($_GET["id"] == 0 ? "parallax_path_0" : "parallax_path_1") . " = :path", array(":path" => $_POST["img-path"]));

	header("Location: admin-panel.php");
	exit();
?>