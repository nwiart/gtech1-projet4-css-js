<?php

    $message_email = $_POST["first-name"].$_POST["last-name"].", qui à comme adresse mail ".$_POST["email"]." vous a envoyez un message :".$_POST["message"];
    mail("valentin@wallmatt.com","Contact us from ".$_POST["first-name"],$message_email);

?>
