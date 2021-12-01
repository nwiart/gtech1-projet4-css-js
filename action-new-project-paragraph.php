<?php
	require_once "php/functions.php";
	checkCurrentUserAdmin();

	$pdo = createPDO();
	launchSQL($pdo, "INSERT INTO project_paragraphs (project_id, title, content, square_image) VALUES (:prid, :title, :content, \"\")", array(
		":prid"    => $_GET["pr"],
		":title"   => $_POST["title"],
		":content" => $_POST["content"]
	));

	header("Location: admin-modif-project-paragraph.php?id=" . $pdo->lastInsertId());
	exit();
?>