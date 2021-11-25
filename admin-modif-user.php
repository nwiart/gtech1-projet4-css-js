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
		<title>Admin Panel - User Modification</title>

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
		?>

		<h2 class="grey darken-2 center white-text title-block">Admin Panel - User Modification</h2>

		<div class="container">

			<!-- Record information about requested user for later use in the page. -->
			<?php
				require_once "php/functions.php";

				$usr = getUserByLogin($_GET["login"]);
				$user_exists = (sizeof($usr) != 0);
			?>

			<h3>User Login : <?php echo $_GET["login"]; ?></h3>
			<a href="admin-panel.php">Go back to Admin Panel</a>

		</div>

		<div class="container">
			<!-- Display form ONLY if user actually exists. -->
			<?php if ($user_exists) { ?>

				<form method="post" action="">
					<div class="input-field">
						<input id="login" name="login" type="text" value="<?php echo $_GET["login"] ?>" />
						<label for="login">Login</label>
					</div>

					<div class="input-field">
						<input id="email" name="email" type="email" value="<?php echo $usr[0]["email"]; ?>" />
						<label for="email">Email</label>
					</div>

					<div class="input-field">
						<input id="password" name="password" type="password" />
						<label for="password">New Password</label>
					</div>
				</form>

				<a href="#modal-user-delete" class="btn waves-effect waves-light red darken-2 modal-trigger">Delete User</a>

				<!-- Delete user modal. -->
				<div id="modal-user-delete" class="modal">
					<div class="modal-content">
						<h3>Delete User</h3>
						<p>Do you REALLY want to remove the user "<?php echo $_GET["login"]; ?>"?</p>
						<p>THIS ACTION CANNOT BE UNDONE.</p>
					</div>

					<div class="modal-footer">
						<a href="#!" class="modal-close waves-effect waves-light btn">Cancel</a>
						<a href="admin-delete-user.php?login=<?php echo $_GET["login"]; ?>" class="modal-close waves-effect waves-light red darken-2 btn">DESTROY THEM!</a>
					</div>
				</div>

			<?php } else {
					echo "<p>User \"" . $_GET["login"] . "\" does not exist.</p>";
				}
			?>

		</div>

		<?php /*require "php/footer.php";*/ ?>



		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>