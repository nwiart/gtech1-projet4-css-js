<!DOCTYPE html>
<html lang="en">
	<head>
		<?php
			$pageTitle = "Presentation";
			$pageDesc  = "Welcome to Ethan and Noah's portfolio! This website is a project from Gaming Campus whose goal is to help us learn about website development. Here we present ourselves, as well as various other projects we have made personally or within the Gaming Campus.";
			require "php/head.php";
		?>
	</head>

	<body>

		<?php require "php/menu.php"; ?>

		<!-- Login response. -->
		<?php
			if (isset($_SESSION["signin-result"]))
			{
				if ($_SESSION["signin-result"]) {
					echo "<p class=\"center\">Welcome back, " . $_SESSION["user"]["name"] . "!</p>";
					if ($_SESSION["user"]["isAdmin"]) {
						echo "<p class=\"center\">You have <a href=\"admin-panel.php\">administrator rights</a> on this website.</p>";
					}
				}
				else {
					echo "<p class=\"center\">Incorrect login or password.</p>";
				}
			}

			$pdo = createPDO();
			$main_page_content = executeSQL($pdo, "SELECT * FROM main_page", array())[0];
		?>

		<!-- Presentation section. -->
		<div class="parallax-container">
			<div class="parallax"><img src="<?php echo $main_page_content["parallax_path_0"]; ?>" alt="Ultra Games Banner" /></div>
		</div>

		<div class="z-depth-5 grey">
			<div class="title-block">
				<h1 class="center grey darken-2 white-text">PRESENTATION</h1>
			</div>
			<div class="container section row">

				<!-- Ethan presentation. -->
				<div class="col l5 m12 s12 white card presentation-box" id="presentation-ethan">
					<div class="row">
						<div class="valign-wrapper">
							<div class="col l5 m12 s12 card-image">
								<img src="img/bg.jpg" alt="Photo du BG en personne" class="presentation-image left" />
							</div>
							<div class="col l7 m12 s12 card-stacked">
								<div class="card-content">
									<h2 class="presentation-name">JOACHIM-GABIN<br>Ethan</h2>
								</div>
							</div>
						</div>
						<div class="col s12 card-stacked">
							<div class="card-content">
								<?php echo $main_page_content["ethan_description"]; ?>
							</div>
						</div>
					</div>
				</div>

				<!-- Noah presentation. -->
				<div class="col l5 offset-l2 m12 s12 white card presentation-box" id="presentation-noah">
					<div class="row">
						<div class="valign-wrapper">
							<div class="col l5 m12 s12 card-image">
								<img src="img/bg2.jpg" alt="Photo du second BG" class="responsive-img presentation-image left" />
							</div>
							<div class="col l7 m12 s12 card-stacked">
								<div class="card-content">
									<h2 class="presentation-name">WIART<br>Noah</h2>
								</div>
							</div>
						</div>
						<div class="col s12 card-stacked">
							<div class="card-content">
								<?php echo $main_page_content["noah_description"]; ?>
							</div>
						</div>
					</div>
				</div>

				<a href="#contact-us" onclick="reveal()" id="hiddenbtn" class="grey-text text-lighten-2">Click here!</a>
			</div>
		</div>


		
		<div class="parallax-container">
			<div class="parallax"><img src="<?php echo $main_page_content["parallax_path_1"]; ?>" alt="Parallax Image" /></div>
		</div>

		<?php require "php/footer.php"; ?>


		
		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>