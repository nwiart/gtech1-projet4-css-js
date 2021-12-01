<?php
	require_once "php/functions.php";
	checkCurrentUserAdmin();

	$pdo = createPDO();

	launchSQL($pdo, "UPDATE main_page SET parallax_path_0 = :ppath0, parallax_path_1 = :ppath1, ethan_description = :edesc, noah_description = :ndesc", array(
		":ppath0" => $_POST["ppath0"],
		":ppath1" => $_POST["ppath1"],
		":edesc"  => $_POST["edesc"],
		":ndesc"  => $_POST["ndesc"]
	));

	header("Location: admin-panel.php#main-page");
	exit();
?>