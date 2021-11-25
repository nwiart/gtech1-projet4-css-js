<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Portfolio Ethan & Noah</title>

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
			require_once "php/menu.php";
			require_once "php/functions.php";

			// Get project name and description paragraphs.
			$prj = getProjectById($_GET["pr"]);
			$prjDesc = getProjectParagraphs($_GET["pr"]);
		?>

		<h2 class="title-block grey darken-2 white-text center"><?php echo $prj[0]["name"]; ?></h2>
		<div class="grey darken-1">
			<div class="project-presentation container z-depth-5 white black-text">
				<?php
					foreach ($prjDesc as $para)
					{
				?>
					<div class="section">
						<h3><?php echo $para["title"]; ?></h3>
						<?php echo $para["content"]; ?>
					</div>

				<?php
					}
				?>
			</div>
		</div>

		<?php require "php/footer.php"; ?>



		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>