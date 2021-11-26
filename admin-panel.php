<?php
	// Small PHP script to deny access to anyone who does not have
	// administrator rights / are not logged in.
	require_once "php/functions.php";
	checkCurrentUserAdmin();
?>

<!DOCTYPE html>
<html lang="en">
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

	<body class="grey">
		<?php
			require "php/menu.php";
			require_once "php/functions.php";
		?>

		<h1 class="grey darken-2 center white-text title-block">Admin Panel</h1>

		<div class="container white" id="admin-container">
			<h2>Registered Users</h2>
			<div class="section">
				<!-- Search bar (uses URL parameters). -->
				<form method="get" action="admin-panel.php">
					<div class="row">
						<div class="col s11">
							<input id="search-users" name="search-users" type="search" placeholder="Search" class="search-field" />
						</div>
						<div class="col s1">
							<button type="submit" class="btn right"><i class="material-icons">search</i></button>
						</div>
					</div>
				</form>

				<!-- List users in a table. -->
				<table id="admin-user-table" class="striped">
					<thead>
						<tr>
							<th>Modify</th>
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
								<td><a href="admin-modif-user.php?login=<?php echo $user["login"]; ?>" class="btn btn-small"><i class="material-icons">edit</i></a></td>
								<td><?php echo $user["login"]; ?></td>
								<td><?php echo $user["email"]; ?></td>
								</tr>
							<?php
							}
						?>
					</tbody>
				</table>
			</div>

			<div class="divider"></div>

			<!-- Projects table. -->
			<h2>Projects</h2>
			<div class="section">
				<a href="#modal-new-project" class="btn waves-effect waves-light modal-trigger">New Project</a>
				<table class="striped">
					<thead>
						<tr>
							<th>Modify</th>
							<th>Name</th>
							<th>ID</th>
						</tr>
					</thead>

					<tbody>
						<?php
							$projects = getProjects();

							foreach ($projects as $p)
							{?>
								<tr>
								<td><a href="admin-modif-project.php?pr=<?php echo $p["id"]; ?>" class="btn"><i class="material-icons">edit</i></a></td>
								<td><?php echo $p["name"]; ?></td>
								<td><?php echo $p["id"]; ?></td>
								</tr>
							<?php
							}
						?>
					</tbody>
				</table>
			</div>
		</div>



		<!-- New project modal. -->
		<div id="modal-new-project" class="modal">
			<div class="modal-content">
				<h3>New Project</h3>
				<p>Create a new project here by specifying its name and ID.</p>
				<p>The ID corresponds to a simplified version of the project's name. It should contain only lowercase letters and dashes.</p>

				<div class="row">
					<div class="col l2 m1 hide-on-small-only"></div>
					<div class="col s12 m10 l8">
						<form method="post" action="admin-new-project.php">
							<div class="input-field">
								<input name="id" id="id" type="text" required="" aria-required="true" />
								<label for="id">ID</id>
							</div>

							<div class="input-field">
								<input name="name" id="name" type="text" required="" aria-required="true" />
								<label for="name">Name</id>
							</div>

							<div class="center">
								<button type="submit" class="btn waves-effect waves-light red darken-2">Create project</button>
							</div>
						</form>
					</div>
					<div class="col l2 m1 hide-on-small-only"></div>
				</div>
			</div>

			<div class="modal-footer">
				<a href="#!" class="modal-close btn waves-effect waves-light red darken-2">Close</a>
			</div>
		</div>

		<?php /*require "php/footer.php";*/ ?>



		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>