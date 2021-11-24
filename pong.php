<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Portfolio Ethan & Noah - Pong</title>

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



		<!-- Pong presentation. -->
		<h2 id="pong" class="title-block grey darken-2 white-text center">P O N G</h2>
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

						<a class="carousel-item" href="#one!"><img src="img/pong/pongtitle.png" alt="Pong game window"></a>
						<a class="carousel-item" href="#two!"><img src="img/pong/pong_zero.png" alt="Pong scores"></a>
						<a class="carousel-item" href="#three!"><img src="img/pong/pong_highscores.png" alt="Pong High scores"></a>
					</div>
				</div>
				<p class="screenshot-desc white-text" id="pongdesc"></p>

				<div class="project-presentation white black-text">
					<div class="row">
						<div class="col s1"></div>
						<div class="col s10">
							<div class="section">
								<h3>History</h3>
								<p>Here is pong, a remake of the world's first arcade game, created by Allan Alcorn in 1972. This game revolutionized the era of video games. To find out how and what felt Allan Alcorn during the development, my teammate and me decided to recreate this famous game, adding our personal touch of course. So we recreated the original pong game with just new colors : a gray background, blue elements (racket, middle line), and a red ball.</p>
							</div>

							<div class="divider"></div>
							<div class="section">
								<h3>Development</h3>
								<p>Our version of Pong was made to run on Linux. It was programmed using the C language and with the help of the SDL2 windowing library.</p>
							</div>

							<div class="divider"></div>
							<div class="section">
								<h3>Gameplay</h3>
								<p>A ball moves across the screen and bounces off the top and bottom edges. The two players control a racket, represented by a vertical line at the left and right sides of the court. The players move their racket vertically by using the assigned keyboard controls. If the ball hits the racket, it bounces back to the other player. If it misses the racket, the opponent scores a point.</p>
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
