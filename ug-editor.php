<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Portfolio Ethan & Noah - UGE Editor</title>

		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
		<link rel="stylesheet" href="css/style.css" />

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	</head>

	<body>

		<?php require "php/menu.php" ?>



		<!-- UGE Editor presentation. -->
		<h2 id="ug-editor" class="title-block grey darken-2 white-text center">UGE Editor</h2>
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

						<a class="carousel-item" href="#one!"><img src="img/ug-editor/ed_mainwindow.png" alt="Main window with the level editor"></a>
						<a class="carousel-item" href="#two!"><img src="img/ug-editor/ed_openproject.png" alt="Open project dialog"></a>
						<a class="carousel-item" href="#three!"><img src="img/ug-editor/ed_aboutwindow.png" alt="About window showing a scene from Roll-A-Ball"></a>
					</div>
				</div>
				<p class="screenshot-desc white-text" id="eddesc"></p>

				<div class="project-presentation white black-text">
					<div class="row">
						<div class="col s1"></div>
						<div class="col s10">
							<div class="section">
								<h3>Description</h3>
								<p>UGE Editor is a level designer for the Ultra Game Engine (UGE). It is currently in alpha and only bares the minimum of what a typical level editor can do.</p>
							</div>

							<div class="divider"></div>
							<div class="section">
								<h3>About UGE</h3>
								<p>UGE (or the "Ultra Game Engine") is a game engine project made by me (Noah). This project began near the end of middle school, and since, it kept growing with new features being added, slowly but surely.</p>
								<p>The engine currently supports a world / entity / component system, a Direct3D 9 rendering engine, a physics engine relying on Havok Physics 2014, a sound system, as well as a class reflection system coupled with serialization.</p>
							</div>

							<div class="divider"></div>
							<div class="section">
								<h3>Features</h3>
								<p>The current available features are listed below :</p>
								<ul class="custom-list">
									<li>A "main" window acting as the level editor, containing a viewport, an asset view and a list of all the entities in the current scene.</li>
									<li>General level editing actions, such as placing, moving, renaming and deleting entities from the world.</li>
									<li>A mesh "importer", which is able to convert FBX files to a proprietary 3D mesh format being UGM (UGE Mesh).</li>
									<li>A "Entity properties" panel allowing to modify an entity's values. This uses UGE's reflection system.</li>
								</ul>
							</div>
						</div>
						<div class="col s1"></div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col s6"></div>
			</div>
		</div>

		<?php require "php/footer.php"; ?>



		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>
