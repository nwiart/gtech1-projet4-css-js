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
			$projectId = $_GET["pr"];
			$prj = getProjectById($projectId);
			$prjDesc = getProjectParagraphs($projectId);
			$prjImgs = getProjectCarouselImages($projectId);
		?>

		<h2 class="title-block grey darken-2 white-text center"><?php echo $prj[0]["name"]; ?></h2>
		<div class="grey darken-1">
			<div class="container z-depth-5">
				<div class="container">
					<div class="carousel carousel-slider">

						<!-- Carousel left and right buttons. -->
						<div class="carousel-fixed-item center carousel-arrow-btn">
							<div class="left"><button class="btn-floating btn-large waves-effect waves-light carousel-move-prev"><i class="material-icons left white-text red darken-2">chevron_left</i></button></div>
							<div class="right"><button class="btn-floating btn-large waves-effect waves-light carousel-move-next"><i class="material-icons right white-text red darken-2">chevron_right</i></button></div>
						</div>

						<!-- Carousel images. -->
						<?php
							foreach ($prjImgs as $image) {
						?>
								<a class="carousel-item" href="#one!"><img src="<?php echo $image["path"] ?>" alt="<?php echo $image["description"]; ?>"></a>
						<?php
							}
						?>
					</div>
				</div>
				<p class="screenshot-desc white-text" id="rbdesc"></p>

				<div class="project-presentation white black-text">
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
		</div>

		<?php require "php/footer.php"; ?>



		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>