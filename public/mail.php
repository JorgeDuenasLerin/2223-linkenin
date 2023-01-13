<?php

require("../src/init.php");

Mailer::sendEmail("roman.kornyeyev1@educa.madrid.org", "Bienvenido!", "Este es el <h1>Cuerpo!</h1>");

?>