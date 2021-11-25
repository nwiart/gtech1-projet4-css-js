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
	 * Get a user from the database by its login.
	 */
	function getUserByLogin($login)
	{
		$pdo = createPDO();

		$maRequete = "SELECT login, email FROM user WHERE login = :login";
		$data = array(
			":login" => $login
		);
		$pre = $pdo->prepare($maRequete);
		$pre->execute($data);

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

	/*
	 * Delete the user with the specified login.
	 * Does nothing if user does not exist.
	 */
	function deleteUserByLogin($login)
	{
		$pdo = createPDO();

		$maRequete = "DELETE FROM user WHERE login = :login";
		$data = array(
			":login" => $login
		);
		$pre = $pdo->prepare($maRequete);
		$pre->execute($data);
	}



	/*
	 * Check if current user has admin rights.
	 * Use this at the start of each page that requires admin rights.
	 */
	function checkCurrentUserAdmin()
	{
		if (!isset($_SESSION))
			session_start();

		if (!isset($_SESSION["user"]))
		{
			echo "[ERROR] : You are not currently logged in.";
			exit();
		}
		else
		{
			if (!$_SESSION["user"]["isAdmin"])
			{
				echo "[ERROR] : You do not have administration rights.";
				exit();
			}
		}
	}
?>