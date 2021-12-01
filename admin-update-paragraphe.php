<?php
	require_once "php/functions.php";
	checkCurrentUserAdmin();

	$pdo = createPDO();
	launchSQL($pdo, "UPDATE project_paragraphs SET content = :new_text", array(":new_text" => $_POST["project_text"]));

	header("Location: admin-panel.php");
	exit();
?>
