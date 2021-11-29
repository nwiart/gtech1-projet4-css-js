<?php

	/*
	 * Helper functions for executing SQL requests.
	 */
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

	function launchSQL($pdo, $request, $data)
	{
		$pre = $pdo->prepare($request);
		$pre->execute($data);
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
		return executeSQL($pdo, "SELECT * FROM user", array());
	}

	/*
	 * Get a user from the database by its login.
	 */
	function getUserByLogin($login)
	{
		$pdo = createPDO();
		return executeSQL($pdo, "SELECT * FROM user WHERE login = :login", array( ":login" => $login ));
	}

	/*
	 * Search specific users depending on what their login starts with.
	 */
	function searchUsers($loginBeginsWith)
	{
		$pdo = createPDO();
		return executeSQL($pdo, "SELECT login, email FROM user WHERE login LIKE :log", array( ":log" => ($loginBeginsWith . "%") ) );
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
		executeSQL($pdo, "INSERT INTO deleted_users VALUES (:login, :email, :password, :is_admin);", array(
			":login" => $login,
			":email" => $userToDelete[0]["email"],
			":password" => $userToDelete[0]["password"],
			":is_admin" => $userToDelete[0]["is_admin"]
		) );

		// Delete record from "user" table.
		executeSQL($pso, "DELETE FROM user WHERE login = :login", array(
			":login" => $login
		) );
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
		return executeSQL($pdo, "SELECT * FROM projects WHERE id = :id", array( ":id" => $id ));
	}

	function getProjectParagraphs($id)
	{
		$pdo = createPDO();
		return executeSQL($pdo, "SELECT * FROM project_paragraphs WHERE project_id = :id ORDER BY placement", array( ":id" => $id ));
	}

	function getProjectCarouselImages($id)
	{
		$pdo = createPDO();
		return executeSQL($pdo, "SELECT * FROM project_images WHERE project_id = :id ORDER BY placement", array( ":id" => $id ));
	}

	function deleteProjectById($id)
	{
		$pdo = createPDO();

		// Get project data.
		$projectToDelete = getProjectById($id);
		if (sizeof($projectToDelete) == 0) {
			return;
		}

		// Delete record from "projects" table.
		executeSQL($pdo, "DELETE FROM projects WHERE id = :id", array(
			":id" => $id
		) );
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