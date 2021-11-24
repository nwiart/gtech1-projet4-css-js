<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Portfolio Ethan & Noah - Roll-A-Ball!</title>

		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
		<link rel="stylesheet" href="css/style.css" />

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>

	<body>

		<?php require "php/menu.php"; ?>



		<!-- Roll-A-Ball! presentation. -->
		<h2 id="rb" class="title-block grey darken-2 white-text center">Roll-A-Ball!</h2>
		<div class="grey darken-1">
			<!-- Carousel. -->
			<div class="container z-depth-5">
				<div class="container">
					<div class="carousel carousel-slider">

						<!-- Carousel left and right buttons. -->
						<div class="carousel-fixed-item center carousel-arrow-btn">
							<div class="left">
								<button class="btn-floating btn-large waves-effect waves-light carousel-move-prev"><i class="material-icons left white-text red darken-2">chevron_left</i></button>
							</div>
							<div class="right">
								<button class="btn-floating btn-large waves-effect waves-light carousel-move-next"><i class="material-icons right white-text red darken-2">chevron_right</i></button>
							</div>
						</div>

						<a class="carousel-item" href="#one!"><img src="img/rb/rb_splash.jpg" alt="Splashscreen"></a>
						<a class="carousel-item" href="#two!"><img src="img/rb/rb_mainmenu.jpg" alt="Main menu"></a>
						<a class="carousel-item" href="#three!"><img src="img/rb/rb_levels.jpg" alt="Levels menu"></a>
						<a class="carousel-item" href="#four!"><img src="img/rb/rb_island.jpg" alt="Floating island level"></a>
						<a class="carousel-item" href="#five!"><img src="img/rb/rb_lava.jpg" alt="Fire themed level"></a>
						<a class="carousel-item" href="#six!"><img src="img/rb/rb_freakout.jpg" alt="Speed text shaking and turning red"></a>
					</div>
				</div>
				<p class="screenshot-desc white-text" id="rbdesc"></p>

				<div class="project-presentation white black-text">
					<div class="row">
						<div class="col s1"></div>
						<div class="col s10">
							<div class="section">
								<h3>Description</h3>
								<p>Roll-A-Ball! is a 3D platformer game driven by one crucial gameplay rule : you control a ball with your mouse. The faster you move your mouse, the faster the ball will roll.</p>
								<p>The game is divided into many levels, each with a finish zone. The only goal is to complete all levels as quickly as possible.</p>
								<p>This project was made by Noah during highschool.</p>
							</div>

							<div class="divider"></div>
							<div class="section">
								<h3>Development phases</h3>
								<p>The first version of Roll-A-Ball! Alpha was released in 2019. The game included basic levels made out of platforms, custom levels, challenges, etc...</p>
								<p>Beta's major change was supposed to be the addition of a multiplayer mode, but the development of a correct networking API struggled for a long time. The last Beta version has not made it past the "work-in-progress" state and was originally scheduled for July 2020.</p>
								<p>Past this date, development was abandoned.</p>
							</div>

							<div class="divider"></div>
							<div class="section">
								<h3>About Ultra Games</h3>
								<p>"Ultra Games" is not a real development studio name, nor is it registered. Although it is the name of the studio I would like to create, and I always use the logo in my projects.</p>
							</div>

							<div class="divider"></div>
							<div class="section">
								<h3>GameJolt pages</h3>
								<p>Here are the pages for <a href="https://gamejolt.com/games/roll-a-ball/448278" target="blank" rel="nofollow">Alpha</a> and <a href="https://gamejolt.com/games/rab_beta/477391" target="blank" rel="nofollow">Beta.</a></p>
							</div>
						</div>
						<div class="col s1"></div>
					</div>
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
