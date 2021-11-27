<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
			$pageTitle = "";
			$pageDesc  = "";
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

		<h1 class="title-block grey darken-2 white-text center"><?php echo $prj[0]["name"]; ?></h2>
		<div class="grey darken-1">
			<div class="project-presentation black-text">
				<?php
					$b = true;
					foreach ($prjDesc as $para)
					{ ?>
						<div class="white">
							<div class="container">
								<div class="section row valign-wrapper">
									<?php if ($b) {
										echo "<img src=\"img/" . $projectId . "/" . $para["id"] . ".jpg\" class=\"col s4 m4 l3 left responsive-img\" width=\"260\" height=\"260\"/>";
									} ?>
									<div class="col s8 m8 l9">
										<h2><?php echo $para["title"]; ?></h2>
										<?php echo $para["content"]; ?>
									</div>
									<?php if (!$b) {
										echo "<img src=\"img/" . $projectId . "/" . $para["id"] . ".jpg\" class=\"col s4 m4 l3 right responsive-img\" width=\"260\" height=\"260\"/>";
									} ?>
								</div>
							</div>
						</div>

						<div class="parallax-container">
							<div class="parallax"><img></div>
						</div>
				<?php
						$b = !$b;
					}
				?>
			</div>

			<h2 class="white black-text center title-block">In-Game Images</h2>
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
							$materializeThings = array("#one!", "#two!", "#three!", "#four!", "#five!", "#six!");
							$index = 0;
							foreach ($prjImgs as $image) {
						?>
								<a class="carousel-item" href="#"><img src="<?php echo $image["path"] ?>" alt="<?php echo $image["description"]; ?>"></a>
						<?php
								$index++;
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
	</body>
</html>