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
		?>

		<!-- Presentation section. -->
		<div class="parallax-container">
			<div class="parallax"><img src="img/banner1.jpg" alt="Ultra Games Banner" /></div>
		</div>

		<div class="z-depth-5 grey">
			<h1 class="center grey darken-2 white-text title-block">PRESENTATION</h1>
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
								<p>My name is Ethan Joachim Gabin and in this year 2021 I turned 18 years old.</p> <br>
								<p>After having passed my first and terminal classes with mathematics and NSI specialties, I left high school with a minimum of computer knowledge.</p> <br>
								<p>I am currently in Lyon in a specialized school in video games, the Gaming Campus, to train as a video game developer.</p> <br>
								<p>This web page is a presentation of joint or personal projects. This website itself is also a project.</p>
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
								<p>My name is WIART Noah. I am currently 18 years old and I am studying at Gaming Campus in Lyon.</p> <br>
								<p>I discovered computer programming when I was 11, and since then, I have learned C++ by myself.</p> <br>
								<p>I worked on several personal projects while I was in school, notably on the game "Roll-A-Ball!". This game also runs using a custom game engine that I have made myself as well.</p> <br>
								<p>These personal projects have allowed me to discover game programming and improve my knowledge on the used softwares and languages. I have also gained experience on the versioning software Git and on Unreal Engine 4.</p>
							</div>
						</div>
					</div>
				</div>

				<a href="#contact-us" onclick="reveal()" id="hiddenbtn" class="grey-text text-lighten-2">Click here!</a>
			</div>
		</div>


		
		<div class="parallax-container">
			<div class="parallax"><img src="img/banner2.jpg" alt="Pong" /></div>
		</div>

		<?php require "php/footer.php"; ?>


		
		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>
