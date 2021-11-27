<?php

  require "php/functions.php";
  $pdo = createPDO();

  #login.php

  $result = executeSQL($pdo, "SELECT * FROM user WHERE login = :login", array(":login"=>$_POST["login"]));

  if (sizeof($result) > 0)
  {
		$_SESSION["signup-result"] = 1;
    header("Location: index.php");
    exit();
	}




  $result = executeSQL($pdo, "SELECT * FROM user WHERE email = :email", array(":email"=>$_POST["email"] ));

  if (sizeof($result) > 0)
  {
		$_SESSION["signup-result"] = 2;
    header("Location: index.php");
    exit();
	}


  $_SESSION["signup-result"] = 0;


  executeSQL($pdo, "INSERT INTO user (login, email, password, is_admin) VALUES (:login, :email, SHA1(:password), 0)", array(
    ":login"=>$_POST["login"],
    ":email"=>$_POST["email"],
    ":password"=>$_POST["password"]
  ));
  header("Location: index.php");
  exit();

?>
