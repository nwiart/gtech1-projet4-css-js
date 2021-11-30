<?php
	require_once "php/functions.php";
	checkCurrentUserAdmin();

	$oldLogin = $_GET["login"];
	$newLogin = $_POST["login"];
	$newEmail = $_POST["email"];
	$newPass  = $_POST["password"];

	$pdo = createPDO();

	// Password is set.
	if (strlen($newPass) != 0) {
		launchSQL($pdo, "UPDATE user SET password = SHA1( :pwd ) WHERE login = :login", array(
			":pwd" => $newPass,
			":login" => $oldLogin
		));
	}

	// Update the rest of the info.
	launchSQL($pdo, "UPDATE user SET login = :login, email = :email WHERE login = :oldlogin", array(
		":login" => $newLogin,
		":email" => $newEmail,
		":oldlogin" => $oldLogin
	));

	header("Location: admin-modif-user.php?login=" . $newLogin);
	exit();
?>