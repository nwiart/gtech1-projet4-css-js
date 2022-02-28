<?php
	require_once "php/functions.php";
	checkCurrentUserAdmin();

	$pdo = createPDO();

	// New paragraph.
	if ($_GET["action"] == "new")
	{
		launchSQL($pdo, "INSERT INTO project_paragraphs (project_id, title, content, square_image) VALUES (:prid, :title, :content, \"\")", array(
			":prid"    => $_GET["pr"],
			":title"   => isset($_POST["title"])   ? $_POST["title"]   : "New paragraph",
			":content" => isset($_POST["content"]) ? $_POST["content"] : "Lorem ipsum dolor sit amet."
		));
	
		//header("Location: admin-modif-project-paragraph.php?id=" . $pdo->lastInsertId());
		exit();
	}

	// Update existing paragraph.
	else if ($_GET["action"] == "update")
	{
		launchSQL($pdo, "UPDATE project_paragraphs SET title = :title, content = :content WHERE id = :id", array(
			":title"   => $_POST["title"],
			":content" => $_POST["content"],
			/*":img"     => $_POST["square-image-path"],*/
			":id"      => $_GET["id"]
		));

		$_SESSION["update-para-result"] = 0;

		//header("Location: admin-modif-project-paragraph.php?id=" . $_GET["id"]);
		exit();
	}

	// Delete paragraph.
	else if ($_GET["action"] == "delete")
	{
		launchSQL($pdo, "DELETE FROM project_paragraphs WHERE id = :id", array(
			":id" => $_GET["id"]
		));

		header("Location: admin-panel.php");
		exit();
	}
?>