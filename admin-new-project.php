<?php
	// Starting a session.
	// We will store an error code in the _SESSION variable to display an
	// error message afterwards.
	if (!isset($_SESSION))
		session_start();

	require_once "php/functions.php";

	// Check for existing ID.
	$project = getProjectById($_POST["id"]);
	if (sizeof($project) != 0)
	{
		$returnCode = 1;
		goto _done;
	}

	// Add project to the database.
	$pdo = createPDO();
	executeSQL($pdo, "INSERT INTO projects VALUES (:id, :name)", array(
		":id" => $_POST["id"],
		":name" => $_POST["name"]
	));

	$returnCode = 0;

_done:

	$_SESSION["newproject-result"] = $returnCode;

	header("Location: admin-panel.php");
	exit();
?>