<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
			$pageTitle = "Project";
			$pageDesc  = "Discover our projects over here!";
			require "php/head.php";
		?>
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

		<!-- Project name + icon. -->
		<div class="title-block grey darken-2 white-text center">
			<div class="container row">
				<div class="col s2 valign-wrapper">
					<img src="img/<?php echo $projectId . "/icon.png"; ?>" alt="Project Icon" class="grey lighten-2 left" />
					<?php if (isset($_SESSION["user"]) && $_SESSION["user"]["isAdmin"]) { ?>
						<a href="admin-modif-project.php?pr=<?php echo $projectId; ?>" class="btn red darken-2"><i class="material-icons">edit</i></a>
					<?php } ?>
				</div>
				<div class="col s8">
					<h1><?php echo $prj[0]["name"]; ?></h1>
				</div>
			</div>
		</div>

		<div class="grey darken-1">
			<div class="project-presentation black-text">
				<?php
					$b = true;
					foreach ($prjDesc as $para)
					{ ?>
						<div class="white z-depth-5">
							<div class="container">
								<div class="section row valign-wrapper">
									<?php if ($b) { ?>
										<div class="col s4 m4 l3">
											<img src="<?php echo $para["square_image"]; ?>" class="left responsive-img paragraph-image" />
										</div>
									<?php } ?>

									<div class="col s8 m8 l9">
										<h2><?php echo $para["title"]; ?></h2>
										<?php echo $para["content"]; ?>
									</div>

									<?php if (!$b) { ?>
										<div class="col s4 m4 l3">
											<img src="<?php echo $para["square_image"]; ?>" class="right responsive-img paragraph-image" />
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
						
						<!-- Dirty way of spacing paragraphs. -->
						<br/>
					<?php
						$b = !$b;
					}
				?>
			</div>

			<!-- Carousel section. -->
			<div class="title-block">
				<h2 class="white black-text center">More Images</h2>
			</div>
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
							foreach ($prjImgs as $image) { ?>
								<a class="carousel-item" href="#"><img src="<?php echo $image["path"] ?>" alt="<?php echo $image["description"]; ?>"></a>
						<?php
							}
						?>
					</div>
				</div>
				<p class="screenshot-desc white-text" id="rbdesc"></p>
			</div>
		</div>

		<?php require "php/footer.php"; ?>



		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>

		<!-- Array of carousel image descriptions. -->
		<script type="text/javascript">
			$(document).ready(function() {
				let descs = [
					<?php
					foreach ($prjImgs as $image) {
						echo '"' . $image["description"] . '"' . ',';
					}
					?>
				];

				$('.carousel').carousel({
					dist: 0,
					padding: 0,
					fullWidth: true,
					indicators: true,
					onCycleTo: function(data) {
						$('#rbdesc').html(descs[$(data).index() - 1]);
					}
				});
			});
		</script>
	</body>
</html>