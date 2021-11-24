<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Portfolio Ethan & Noah</title>

		<meta name="description" content="Welcome to Ethan and Noah's portfolio! This website is a project from Gaming Campus whose goal is to help us learn about website development. Here we present ourselves, as well as various other projects we have made personally or within the Gaming Campus." />

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

		<?php require "php/menu.php"; ?>

		<!-- Presentation section. -->
		<div class="parallax-container">
			<div class="parallax"><img src="img/banner1.jpg" alt="Ultra Games Banner" /></div>
		</div>

		<div class="z-depth-5">
			<h2 class="black center grey darken-2 white-text title-block">PRESENTATION</h2>
			<div class="section white row">

				<!-- Ethan presentation. -->
				<div class="col l6 m6 s12 white center presentation-box" id="presentation-ethan">
					<div class="row">
						<div class="col s1"></div>
						<div class="col s10">
							<div class="presentation-name">Ethan</div>
							<img src="img/bg.jpg" alt="Photo du BG en personne" class="presentation-image" />

							<p>
								My name is Ethan Joachim Gabin and in this year 2021 I turned 18 years old.<br>
								After having passed my first and terminal classes with mathematics and NSI specialties, I left high school with a minimum of computer knowledge.<br>
								I am currently in Lyon in a specialized school in video games, the Gaming Campus, to train as a video game developer.<br>
								This web page is a presentation of joint or personal projects. This website itself is also a project.<br>
							</p>
						</div>
						<div class="col s1"></div>
					</div>
				</div>

				<!-- Noah presentation. -->
				<div class="col l6 m6 s12 white center presentation-box" id="presentation-noah">
					<div class="row">
						<div class="col s1"></div>
						<div class="col s10">
							<div class="presentation-name">Noah</div>
							<img src="img/bg2.jpg" alt="Photo du second BG" class="presentation-image" />

							<p>
								My name is WIART Noah. I am currently 18 years old and I am studying at Gaming Campus in Lyon. I discovered computer programming when I was 11, and since then, I have learned C++ by myself.<br />
								I worked on several personal projects while I was in school, notably on the game "Roll-A-Ball!". This game also runs using a custom game engine that I have made myself as well. These personal projects have allowed me to discover game programming and improve my knowledge on the used softwares and languages. I have also gained experience on the versioning software Git and on Unreal Engine 4.<br />
							</p>
						</div>
						<div class="col s1"></div>
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
