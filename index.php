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

		<!-- Getting main page content from database. -->
		<?php
			$pdo = createPDO();
			$main_page_content = executeSQL($pdo, "SELECT * FROM main_page", array())[0];
		?>

		<div class="parallax-container">

			<!-- Login response. -->
			<?php
				if (isset($_SESSION["signin-result"]))
				{
					if ($_SESSION["signin-result"]) {
						echo "<p class=\"white-text center\">Welcome back, " . $_SESSION["user"]["name"] . "!</p>";
						if ($_SESSION["user"]["isAdmin"]) {
							echo "<p class=\"white-text center\">You have administrator rights on this website.</p>";
						}
					}
					else {
						echo "<p class=\"white-text center\">Incorrect login or password.</p>";
					}
				}
			?>

			<!-- Register response. -->
			<?php
				if (isset($_SESSION["signup-result"]))
				{
					if ($_SESSION["signup-result"] == 0) {
						echo "<p class=\"green-text center\">You account \"" . $_SESSION["user"]["name"] . "\" has been successfully created!</p>";
					}
					else if ($_SESSION["signup-result"] == 1) {
						echo "<p class=\"red-text center\">This login is already taken.</p>";
					}
					else if ($_SESSION["signup-result"] == 2) {
						echo "<p class=\"red-text center\">This email is already taken.</p>";
					}

					unset($_SESSION["signup-result"]);
				}
			?>

			<div class="parallax"><img src="<?php echo $main_page_content["parallax_path_0"]; ?>" alt="Ultra Games Banner" /></div>
		</div>

		<!-- Presentation section. -->
		<div class="title-block team-block">
			<h1 id="the-team" class="noselect">The Team</h1>
		</div>
		<div class="grey section">
			<div class="container row">

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

				<a href="#contact-us" onclick="reveal()" id="hiddenbtn" class="grey-text text-lighten-2"><i class = "material-icons">visibility</i></a>
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
