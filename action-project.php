<?php
	require_once "php/functions.php";
	checkCurrentUserAdmin();

	// New project.
	if ($_GET["action"] == "new")
	{
		// Check for existing ID.
		$project = getProjectById($_POST["id"]);
		if (sizeof($project) != 0)
		{
			$returnCode = 1;
			goto _done;
		}

		// Add project to the database.
		$pdo = createPDO();
		executeSQL($pdo, "INSERT INTO projects (id, name) VALUES (:id, :name)", array(
			":id" => $_POST["id"],
			":name" => $_POST["name"]
		));

		$returnCode = 0;

_done:
		$_SESSION["newproject-result"] = $returnCode;

		header("Location: admin-panel.php");
		exit();
	}

	// Rename project.
	else if ($_GET["action"] == "rename")
	{
		$pdo = createPDO();
		executeSQL($pdo, "UPDATE projects SET name = :newname WHERE id = :id", array(
			":newname" => $_POST["new-name"],
			":id" => $_GET["pr"]
		));

		header("Location: admin-modif-project.php?pr=" . $_GET["pr"]);
		exit();
	}

	// Change visibility.
	else if ($_GET["action"] == "visible")
	{
		$pdo = createPDO();
		launchSQL($pdo, "UPDATE projects SET visible = :v WHERE id = :id", array(
			":v" => $_GET["v"],
			":id" => $_GET["pr"]
		));

		exit();
	}

	// Delete project.
	else if ($_GET["action"] == "delete")
	{
		deleteProjectById($_GET["pr"]);

		header("Location: admin-panel.php");
		exit();
	}
?>