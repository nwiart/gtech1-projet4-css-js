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

		<link rel="stylesheet" href="css/modif-project.css" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	</head>

	<body class="grey">
		<?php
			require "php/menu.php";
		?>

		<div class="title-block">
			<h1 class="grey darken-2 center white-text">Admin Panel - Project Modification</h1>
		</div>

		<div class="row">
			<div class="col s9 white">

				<!-- Record information about requested user for later use in the page. -->
				<?php
					require_once "php/functions.php";

					$projectId = $_GET["pr"];
					$project = getProjectById($projectId);
					$prjDesc = getProjectParagraphs($projectId);
					$project_exists = (sizeof($project) != 0);
				?>

				<div class="container">
					<div class="section">
						<h2>Editing Project : <?php if ($project_exists) echo $project[0]["name"]; else echo "Unknown"; ?></h2>
						<a href="admin-panel.php">Go back to Admin Panel.</a>
					</div>
				</div>

				<!-- Display form ONLY if user actually exists. -->
				<?php if ($project_exists) { ?>

					<!-- Edit project paragraphs. -->
					<div class="project-presentation black-text">
						
					</div>
					<div class="container">
						<button class="btn" id="add-paragraph"><i class="material-icons">add</i></button>
					</div>

					<!-- Edit carousel images. -->
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

					<!-- Rename & delete operations. -->
					<div class="container">
						<div class="section grid" grid-s="20px">
							<h3 class="red-text"><i class="material-icons">warning</i> DANGER ZONE <i class="material-icons">warning</i></h3>
							<div><a href="#modal-rename-project" class="btn waves-effect waves-light orange darken-2 modal-trigger">Change Visibility</a> (Current visibility : <?php echo $project[0]["visible"] ? "Visible" : "Hidden"; ?>)</div>
							<div><a href="#modal-rename-project" class="btn waves-effect waves-light orange darken-2 modal-trigger">Rename project</a></div>
							<div><a href="#modal-delete-project" class="btn waves-effect waves-light red darken-2 modal-trigger">Delete project</a></div>
						</div>
					</div>



					<!--
						MODALS
					-->

					<!-- New paragraph modal. -->
					<div id="modal-new-paragraph" class="modal">
						<div class="modal-content">
							<h3>New Paragraph</h3>

							<div class="container">
								<form method="post" action="action-project-paragraph.php?action=new&pr=<?php echo $projectId; ?>">
									<div class="input-field">
										<input name="title" id="title" type="text" required="" aria-required="true" />
										<label for="title">Title</label>
									</div>

									<div class="input-field">
										<textarea name="content" id="content" type="text" class="materialize-textarea" required="" aria-required="true"></textarea>
										<label for="content">Content</label>
									</div>

									<div class="center">
										<button type="submit" class="btn waves-effect waves-light red darken-2">Create</button>
									</div>
								</form>
							</div>
						</div>

						<div class="modal-footer">
							<a href="#!" class="modal-close btn waves-effect waves-light red darken-2">Cancel</a>
						</div>
					</div>

					<!-- Project rename modal. -->
					<div id="modal-rename-project" class="modal">
						<div class="modal-content">
							<h3>Rename project</h3>

							<form method="post" action="action-project.php?action=rename&pr=<?php echo $projectId; ?>">
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
							<p>All associated paragraphs will also be wiped.</p>
							<p>THIS ACTION CANNOT BE UNDONE.</p>

							<div class="center">
								<a href="action-project?action=delete&pr=<?php echo $projectId; ?>" class="btn waves-effect waves-light red darken-2">DESTROY IT</a>
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
		</div>

		<div class="col s3">
		</div>



		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>

		<script type="text/javascript" src="js/modif-project.js"></script>
		<script>
			let project = "<?php echo $projectId; ?>";
			reload();
		</script>
	</body>
</html>
