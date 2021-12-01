<?php
	require_once "php/functions.php";
	checkCurrentUserAdmin();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>Admin Panel - Paragraph Modification</title>
		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
		<!--Import materialize.css-->
		<link type="text/css" rel="stylesheet" href="css/materialize.css" media="screen,projection" />
		<link rel="stylesheet" href="css/style.css" />

		<!--Let browser know website is optimized for mobile-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	</head>

	<body class="grey">

		<?php  require "php/menu.php"?>
		<div class="title-block">
			<h1 class="grey darken-2 center white-text">Admin Panel - Paragraph Modification</h1>
		</div>

		<!-- Get paragraph info. -->
		<?php
			$pdo = createPDO();

			$paraId = $_GET["id"];
			$para   = executeSQL($pdo, "SELECT * FROM project_paragraphs WHERE id = :id", array(':id' => $paraId))[0];
		?>

		<div id="admin-container" class="container white">
			<div class="section">
				<h2>Editing paragraph "<?php echo $para["title"]; ?>"</h2>

				<a href="admin-modif-project.php?pr=<?php echo $para["project_id"]; ?>">Go back to project edit page.</a>

				<!-- Update result. -->
				<?php
					if (isset($_SESSION["update-para-result"])) {
						if ($_SESSION["update-para-result"] == 0) {
							echo "<p class=\"green-text text-darken-2\">The paragraph has been updated successfully.</p>";
						}

						unset($_SESSION["update-para-result"]);
					}
				?>

				<form method="post" action="admin-update-project-paragraph.php?id=<?php echo $paraId; ?>">
					<div class="section">
						<div class="row">
							<div class="col s3">
								<h3>Square Image</h3>

								<img src="<?php echo $para["square_image"]; ?>" alt="Paragraph square image" class="responsive-img grey" />
								<input name="square-image-path" type="text" value="<?php echo $para["square_image"]; ?>" />	
							</div>
							<div class="col s9">
								<h3>Content</h3>
								
								<textarea name="para-content" type="text" class="materialize-textarea"><?php echo $para["content"]; ?></textarea>
							</div>
						</div>
					</div>

					<div class="center">
						<button type="submit" class="btn"><i class="material-icons left">description</i>Update Info</button>
					</div>
				</form>
			</div>
		</div>

		<!--JavaScript at end of body for optimized loading-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>