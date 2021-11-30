<?php
	require "php/functions.php";
	$pdo = createPDO();



	// Conflicting login.
	$result = executeSQL($pdo, "SELECT * FROM user WHERE login = :login", array(":login" => $_POST["login"]));
	if (sizeof($result) > 0)
	{
		$returnCode = 1;
		goto _done;
	}



	// Conflicting email.
	$result = executeSQL($pdo, "SELECT * FROM user WHERE email = :email", array(":email" => $_POST["email"] ));
	if (sizeof($result) > 0)
	{
		$returnCode = 2;
		goto _done;
	}



	// Everything is clear, register user.
	executeSQL($pdo, "INSERT INTO user (login, email, password, is_admin) VALUES (:login, :email, SHA1(:password), 0)", array(
		":login"    => $_POST["login"],
		":email"    => $_POST["email"],
		":password" => $_POST["password"]
	));

	// Make them logged in.
	session_start();
	$_SESSION["user"] = array(
		"name" => $_POST["login"],
		"isAdmin" => 0
	);

_done:
	$_SESSION["signup-result"] = $returnCode;

	header("Location: index.php");
	exit();
?>