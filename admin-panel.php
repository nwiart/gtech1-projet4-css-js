<?php
	// Small PHP script to deny access to anyone who does not have
	// administrator rights / are not logged in.
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
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Admin Panel</title>

		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
		<link rel="stylesheet" href="css/style.css" />

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	</head>

	<body>
		<?php
			require "php/menu.php";
			require_once "php/functions.php";
		?>

		<h2 class="grey darken-2 center white-text title-block">Admin Panel</h2>

		<div class="container">
			<h3>Registered Users</h3>

			<!-- List users in a table. -->
			<form method="get" action="admin-panel.php">
				<div class="row">
					<div class="col s2">
						<button type="submit" class="btn"><i class="material-icons">search</i></button>
					</div>
					<div class="col s10">
						<input id="search-users" name="search-users" type="search" placeholder="Search" class="search-field" />
					</div>
				</div>
			</form>
			<table>
				<thead>
					<tr>
						<th>Login / Name</th>
						<th>Email Address</th>
					</tr>
				</thead>

				<tbody>
					<?php
						// Get user list.
						if (isset($_GET["search-users"]))
							$result = searchUsers($_GET["search-users"]);
						else
							$result = getUsers();

						foreach ($result as $user)
						{?>
							<tr>
							<td><?php echo $user["login"]; ?></td>
							<td><?php echo $user["email"]; ?></td>
							</tr>
						<?php
						}
					?>
				</tbody>
			</table>
		</div>

		<?php /*require "php/footer.php";*/ ?>
	</body>
</html>