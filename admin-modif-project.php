<?php
	require_once "php/functions.php";
	checkCurrentUserAdmin();
?>

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

	<body class="grey">
		<?php
			require "php/menu.php";
		?>

		<div class="title-block">
			<h1 class="grey darken-2 center white-text">Admin Panel - Project Modification</h1>
		</div>

		<div class="container white" id="admin-container">

			<!-- Record information about requested user for later use in the page. -->
			<?php
				require_once "php/functions.php";

				$projectId = $_GET["pr"];
				$project = getProjectById($projectId);
				$project_exists = (sizeof($project) != 0);
			?>

			<div class="section">
				<h2>Editing Project : <?php if ($project_exists) echo $project[0]["name"]; else echo "Unknown"; ?></h2>
				<a href="admin-panel.php">Go back to Admin Panel</a>
			</div>

			<!-- Display form ONLY if user actually exists. -->
			<?php if ($project_exists) { ?>



			<div class="section">
				<!-- Carousel. -->
				<h3>Carousel Images</h3>
				<div class="container">
					<div class="carousel carousel-slider">
						<!-- Carousel left and right buttons. -->
						<div class="carousel-fixed-item center carousel-arrow-btn">
							<div class="left"><button class="btn-floating btn-large waves-effect waves-light carousel-move-prev"><i class="material-icons left white-text red darken-2">chevron_left</i></button></div>
							<div class="right"><button class="btn-floating btn-large waves-effect waves-light carousel-move-next"><i class="material-icons right white-text red darken-2">chevron_right</i></button></div>
						</div>

						<!-- Create images. -->
						<?php
							$images = getProjectCarouselImages($projectId);
							foreach ($images as $img) {
						?>
								<a class="carousel-item" href="#one!"><img src="<?php echo $img["path"] ?>" alt="<?php echo $img["description"]; ?>"></a>
						<?php
							}
						?>
					</div>
				</div>
				<div class="center">
					<a href="#" class="btn waves-effect waves-light modal-trigger">New image</a>
				</div>
			</div>















			<?php
					$pdo = createPDO();
					$title_project = executeSQL($pdo, "SELECT * FROM project_paragraphs WHERE project_id = :title_id", array(':title_id' => $projectId));
					/*$project_text_content = executeSQL($pdo, "SELECT * FROM project_paragraphs", array())[0];*/
			?>


			<!-- Modify project text -->
			<div id="modal-text-project" class="center">

				<h2>Title project</h2>

					<?php
					foreach ($title_project as $title)

					{?>
						<h3><?php echo $title["title"] ?><h3>
						<a href="admin-text-project.php?id=<?php echo $title["id"] ?>" class="btn waves-effect waves-light red darken-2 modal-trigger">Modify</a><?php
					} ?>

				</div>


















				<div class="section">
					<h3 class="red-text"><i class="material-icons">warning</i> DANGER ZONE <i class="material-icons">warning</i></h3>
					<a href="#modal-rename-project" class="btn waves-effect waves-light orange darken-2 modal-trigger">Rename project</a>
					<a href="#modal-delete-project" class="btn waves-effect waves-light red darken-2 modal-trigger">Delete project</a>
				</div>

			<!-- Project rename modal. -->
			<div id="modal-rename-project" class="modal">
				<div class="modal-content">
					<h3>Rename project</h3>

					<form method="post" action="admin-rename-project.php?pr=<?php echo $projectId; ?>">
						<div class="input-field">
							<input name="new-name" id="new-name" type="text" required="" aria-required="true" value="<?php echo $project[0]["name"]; ?>" />
							<label for="new-name">Name</label>
						</div>

						<div class="center">
							<button type="submit" class="btn waves-effect waves-light red darken-2">Rename</button>
						</div>
					</form>
				</div>

				<div class="modal-footer">
					<a href="#!" class="modal-close btn waves-effect waves-light red darken-2">Cancel</a>
				</div>
			</div>

			<!-- Project delete modal. -->
			<div id="modal-delete-project" class="modal">
				<div class="modal-content">
					<h3>Delete project</h3>
					<p>Are you sure you want to delete project "<?php echo $project[0]["name"]; ?>"?</p>
					<p>THIS ACTION CANNOT BE UNDONE.</p>

					<div class="center">
						<a href="admin-delete-project?pr=<?php echo $projectId; ?>" class="btn waves-effect waves-light red darken-2">DESTROY IT</a>
					</div>
				</div>

				<div class="modal-footer">
				</div>
			</div>



			<?php } else {
					echo "<p>Project with ID \"" . $projectId . "\" does not exist.</p>";
				}
			?>
		</div>



		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>
