<?php
	function createPDO()
	{
		$pdo = new PDO(
			'mysql:host=localhost;dbname=projet5-db;',
			'root',
			'',
			array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
		);
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

		return $pdo;
	}

	/*
	 * Query the database for all users.
	 */
	function getUsers()
	{
		$pdo = createPDO();

		$maRequete = "SELECT login, email FROM user";
		$pre = $pdo->prepare($maRequete);
		$pre->execute();

		return $pre->fetchAll(PDO::FETCH_ASSOC);
	}

	/*
	 * Search specific users depending on what their login starts with.
	 */
	function searchUsers($loginBeginsWith)
	{
		$pdo = createPDO();

		$maRequete = "SELECT login, email FROM user WHERE login LIKE :log";
		$data = array(
			":log" => ($loginBeginsWith . "%")
		);

		$pre = $pdo->prepare($maRequete);
		$pre->execute($data);

		return $pre->fetchAll(PDO::FETCH_ASSOC);
	}
?>