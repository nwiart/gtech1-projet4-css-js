<?php
	require_once "php/functions.php";
	checkCurrentUserAdmin();

	$pdo = createPDO();
	launchSQL($pdo, "UPDATE project_paragraphs SET content = :content, square_image = :img WHERE id = :id", array(
		":content" => $_POST["para-content"],
		":img"     => $_POST["square-image-path"],
		":id"      => $_GET["id"]
	));

	$_SESSION["update-para-result"] = 0;

	header("Location: admin-modif-project-paragraph.php?id=" . $_GET["id"]);
	exit();
?>