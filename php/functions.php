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

	function executeSQL($pdo, $request, $data)
	{
		$pre = $pdo->prepare($request);
		$pre->execute($data);

		return $pre->fetchAll(PDO::FETCH_ASSOC);
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

		$maRequete = "SELECT * FROM user WHERE login = :login";
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
	 * 
	 * Actually does not delete the user, but moves their data to a "deleted_users" table.
	 */
	function deleteUserByLogin($login)
	{
		$pdo = createPDO();

		// Get user data.
		$userToDelete = getUserByLogin($login);
		if (sizeof($userToDelete) == 0) {
			return;
		}

		// Move user data to "deleted_users" table.
		$maRequete = "INSERT INTO deleted_users VALUES (:login, :email, :password, :is_admin);";
		$data = array(
			":login" => $login,
			":email" => $userToDelete[0]["email"],
			":password" => $userToDelete[0]["password"],
			":is_admin" => $userToDelete[0]["is_admin"]
		);
		$pre = $pdo->prepare($maRequete);
		$pre->execute($data);

		// Delete record from "user" table.
		$maRequete = "DELETE FROM user WHERE login = :login";
		$data = array(
			":login" => $login
		);
		$pre = $pdo->prepare($maRequete);
		$pre->execute($data);
	}



	function getProjects()
	{
		$pdo = createPDO();
		return executeSQL($pdo, "SELECT * FROM projects", array());
	}

	/*
	 * 
	 */
	function getProjectById($id)
	{
		$pdo = createPDO();

		$maRequete = "SELECT * FROM projects WHERE id = :id";
		$data = array(
			":id" => $id,
		);
		$pre = $pdo->prepare($maRequete);
		$pre->execute($data);

		return $pre->fetchAll(PDO::FETCH_ASSOC);
	}

	function getProjectParagraphs($id)
	{
		$pdo = createPDO();

		$maRequete = "SELECT * FROM project_paragraphs WHERE project_id = :id ORDER BY placement";
		$data = array(
			":id" => $id,
		);
		$pre = $pdo->prepare($maRequete);
		$pre->execute($data);

		return $pre->fetchAll(PDO::FETCH_ASSOC);
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