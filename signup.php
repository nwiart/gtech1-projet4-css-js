<?php

  require "php/functions.php"
  #login.php
  $maRequete = "SELECT * FROM user WHERE login = :login";
	$data = array(
		":login"    => $_POST["login"],
	);

?>
