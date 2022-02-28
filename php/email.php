<?php
        $message_email = $_POST["first-name"] . " " . $_POST["last-name"] . ", qui a comme adresse mail " . $_POST["email"] . " vous a envoyé un message :\n\n" . $_POST["message"];
        mail("ejoachimgabin@gaming.tech", "Contact us from " . $_POST["first-name"], $message_email);
        mail("nwiart@gaming.tech", "Contact us from " . $_POST["first-name"], $message_email);

        header("Location: ../index.php");
?>