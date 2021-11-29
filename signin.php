<?php
	require_once "php/functions.php";

	session_start();

	$pdo = createPDO();
	$result = executeSQL($pdo, "SELECT * FROM user WHERE login = :login AND password = SHA1(:password)", array(
		":login"    => $_POST["login"],
		":password" => $_POST["password"]
	));



	// No lines found. Either login or password is incorrect.
	if (sizeof($result) == 0)
	{
		$_SESSION["signin-result"] = false;
	}
	// Otherwise, login is successful!
	else
	{
		$isAdmin = $result[0]["is_admin"] == 1;

		$_SESSION["signin-result"] = true;
		$_SESSION["user"] = array(
			"name" => $_POST["login"],
			"isAdmin" => $isAdmin
		);
	}

	header("Location: index.php");
	exit();
?>