<?php
	require_once "php/functions.php";

	$newLogin = $_POST["login"];
	$newEmail = $_POST["email"];
	$newPass  = $_POST["password"];

	$pdo = createPDO();

	// Password is set.
	if (strlen($newPass) != 0) {
		launchSQL($pdo, "UPDATE user SET password = SHA1( :pwd ) WHERE login = :login", array(
			":pwd" => $newPass,
			":login" => $_GET["login"]
		));
	}

	// Update the rest of the info.
	launchSQL($pdo, "UPDATE user SET login = :login, email = :email WHERE login = :oldlogin", array(
		":login" => $newLogin,
		":email" => $newEmail,
		":oldlogin" => $_GET["login"]
	));

	header("Location: admin-modif-user.php?login=" . $newLogin);
	exit();
?>