<?php
	require_once "php/functions.php";
	checkCurrentUserAdmin();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin Panel - Title Project Modification</title>
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

    <?php  require "php/menu.php"?>
    <div class="title-block">
			<h1 class="grey darken-2 center white-text">Admin Panel - Project Text Modification</h1>
		</div>




		<div class="section">
      <?php
          $pdo = createPDO();
          $id_title = $_GET["id"];
          $paragraphe_project = executeSQL($pdo, "SELECT * FROM project_paragraphs WHERE id = :id", array(':id' => $id_title));
          /*$project_text_content = executeSQL($pdo, "SELECT * FROM project_paragraphs", array())[0];*/
      ?>

      <div class="row">
        <div class="col s2 center grey">
        </div>
        <div class="col s8">
          <form method="post" action="admin-update-paragraphe.php">
            <h2><?php echo $paragraphe_project[0]["title"]; ?></h2>
            <textarea name="project_text" type="text" class="materialize-textarea"><?php echo $paragraphe_project[0]["content"]; ?></textarea>
            <button type="submit" class="btn"><i class="material-icons left">description</i>Update text</button>
          </form>
        </div>
      </div>
    </div>

























    <!--JavaScript at end of body for optimized loading-->
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </body>
</html>
