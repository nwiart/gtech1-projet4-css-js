<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Admin Panel - Project Modification</title>

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

		<h2 class="grey darken-2 center white-text title-block">Admin Panel - Project Modification</h2>

		<div class="container">

			<!-- Record information about requested user for later use in the page. -->
			<?php
				require_once "php/functions.php";

				$prj = getProjectById($_GET["pr"]);
				$project_exists = (sizeof($prj) != 0);
			?>

			<h3>Editing Project : <?php if ($project_exists) echo $prj[0]["name"]; else echo "Unknown"; ?></h3>
			<a href="admin-panel.php">Go back to Admin Panel</a>

		</div>

		<div class="container">
			<!-- Display form ONLY if user actually exists. -->
			<?php if ($project_exists) { ?>

				

			<?php } else {
					echo "<p>Project with ID \"" . $_GET["pr"] . "\" does not exist.</p>";
				}
			?>

		</div>



		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>