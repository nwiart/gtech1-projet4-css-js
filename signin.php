<?php
	session_start();

	$pdo = new PDO(
		'mysql:host=localhost;dbname=projet5-db;',
		'root',
		'',
		array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
	);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

	$maRequete = "SELECT * FROM user WHERE login = :login AND password = SHA1(:password)";
	$data = array(
		":login"    => $_POST["login"],
		":password" => $_POST["password"]
	);
	$pre = $pdo->prepare($maRequete);
	$pre->execute($data);

	$result = $pre->fetchAll(PDO::FETCH_ASSOC);



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

		//print_r( $result );
	}

	header("Location: index.php");
	exit();
?>