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

	<body class="grey">
		<?php
			require "php/menu.php";
		?>

		<div class="title-block">
			<h1 class="grey darken-2 center white-text">Admin Panel - User Modification</h1>
		</div>

		<div class="container white" id="admin-container">

			<!-- Record information about requested user for later use in the page. -->
			<?php
				require_once "php/functions.php";

				$usr = getUserByLogin($_GET["login"]);
				$user_exists = (sizeof($usr) != 0);
			?>

			<div class="section">
				<h2>User Login : <?php echo $_GET["login"]; ?></h2>
				<a href="admin-panel.php">Go back to Admin Panel</a>
			</div>

			<!-- Display form ONLY if user actually exists. -->
			<?php if ($user_exists) { ?>

				<div class="section">
					<form method="post" action="action-admin-update-user.php?login=<?php echo $_GET["login"]; ?>">
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

						<button type="submit" class="btn waves-effect waves-light">Update user info</button>
					</form>
				</div>

				<!-- DANGER section. -->
				<div class="section">
					<h3 class="red-text"><i class="material-icons">warning</i> DANGER ZONE <i class="material-icons">warning</i></h3>

					<a href="#modal-user-activate" class="btn waves-effect waves-light red darken-2 modal-trigger">
						<?php echo ($usr[0]["is_disabled"] == 0) ? "Deactivate User" : "Reactivate User"; ?>
					</a>

					<?php if ($usr[0]["is_disabled"] == 1) { ?>
						<a href="#modal-user-delete" class="btn waves-effect waves-light red darken-2 modal-trigger">Delete permanently</a>
					<?php } ?>
				</div>

				<!-- Delete / reactivate user modal. -->
				<?php if ($usr[0]["is_disabled"] == 0) { ?>
					<div id="modal-user-activate" class="modal">
						<div class="modal-content">
							<h3>Deactivate User Account</h3>
							<p>Do you REALLY want to deactivate the user "<?php echo $_GET["login"]; ?>"?</p>
						</div>

						<div class="modal-footer">
							<a href="#!" class="modal-close waves-effect waves-light btn">Cancel</a>
							<a href="admin-enable-user.php?login=<?php echo $_GET["login"]; ?>" class="modal-close waves-effect waves-light red darken-2 btn">Wave "Bye bye"!</a>
						</div>
					</div>
				<?php } else { ?>
					<div id="modal-user-activate" class="modal">
						<div class="modal-content">
							<h3>Reactivate User Account</h3>
							<p>Do you REALLY want to reactivate the user "<?php echo $_GET["login"]; ?>"?</p>
						</div>

						<div class="modal-footer">
							<a href="#!" class="modal-close waves-effect waves-light btn">Cancel</a>
							<a href="admin-enable-user.php?login=<?php echo $_GET["login"]; ?>" class="modal-close waves-effect waves-light red darken-2 btn">Yes my boy !!!</a>
						</div>
					</div>

					<div id="modal-user-delete" class="modal">
						<div class="modal-content">
							<h3>Delete permanently</h3>
							<p>Do you REALLY want to PERMANENTLY DELETE the user "<?php echo $_GET["login"]; ?>"?</p>
							<p>THIS CANNOT BE UNDONE.</p>
						</div>

						<div class="modal-footer">
							<a href="#!" class="modal-close waves-effect waves-light btn">Cancel</a>
							<a href="action-delete-user.php?login=<?php echo $_GET["login"]; ?>" class="modal-close waves-effect waves-light red darken-2 btn">Delete</a>
						</div>
					</div>
				<?php } ?>

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