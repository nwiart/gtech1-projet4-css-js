<?php
	require_once "php/functions.php";
	session_start();

	$oldLogin = $_SESSION["user"]["name"];
	$newLogin = $_POST["login"];
	$newEmail = $_POST["email"];
	$newPass  = $_POST["password"];

	$pdo = createPDO();

	// Is email taken?
	$result = executeSQL($pdo, "SELECT * FROM user WHERE email = :email AND login != :login", array(":email" => $newEmail, ":login" => $oldLogin));
	if (sizeof($result) != 0) {
		$returnCode = 1;
		goto _done;
	}

	// Password is set.
	if (strlen($newPass) != 0) {
		$hash = hashPassword($newPass);
		launchSQL($pdo, "UPDATE user SET password = :pwd WHERE login = :login", array(
			":pwd" => $hash,
			":login" => $oldLogin
		));
	}

	// Update the rest of the info.
	launchSQL($pdo, "UPDATE user SET login = :login, email = :email WHERE login = :oldlogin", array(
		":login" => $newLogin,
		":email" => $newEmail,
		":oldlogin" => $oldLogin
	));

	// Update current user login.
	$_SESSION["user"]["name"] = $newLogin;

	$returnCode = 0;

_done:
	$_SESSION["update-user-return"] = $returnCode;

	header("Location: settings.php");
	exit();
?>