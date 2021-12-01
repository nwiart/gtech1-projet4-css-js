<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
			$pageTitle = "Settings";
			$pageDesc  = "";
			require "php/head.php";
		?>
	</head>

	<body class="grey">
		<?php
			require "php/menu.php";
			require_once "php/functions.php";
		?>

		<?php
			$login = $_SESSION["user"]["name"];
			$user = getUserByLogin($login)[0];
		?>

		<div class="title-block">
			<h1 class="grey darken-2 center white-text">User Settings</h1>
		</div>

		<div class="container white" id="admin-container">
			<div class="section">
				<h2>User Info</h2>

				<!-- Operation result text. -->
				<?php
					if (isset($_SESSION["update-user-return"])) {
						if ($_SESSION["update-user-return"] == 0) {
							echo "<p class=\"green-text text-darken-2\">Your information has been updated.</p>";
						}
						else if ($_SESSION["update-user-return"] == 1) {
							echo "<p class=\"red-text text-darken-2\">The new email you entered is already taken.</p>";
						}

						unset($_SESSION["update-user-return"]);
					}
				?>

				<!-- User info form. -->
				<form method="post" action="action-update-user.php?login=<?php echo $_SESSION["user"]["name"]; ?>">
					<div class="input-field">
						<input id="login" name="login" type="text" value="<?php echo $login ?>" />
						<label for="login">Login</label>
					</div>

					<div class="input-field">
						<input id="email" name="email" type="email" value="<?php echo $user["email"]; ?>" />
						<label for="email">Email</label>
					</div>

					<div class="input-field">
						<input id="password" name="password" type="password" />
						<label for="password">New Password</label>
					</div>

					<button type="submit" class="btn waves-effect waves-light">Update user info</button>
				</form>
			</div>
		</div>

		<?php require "php/footer.php"; ?>


		
		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>