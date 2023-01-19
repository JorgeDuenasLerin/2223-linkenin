<?php

require("../src/init.php");

if(isset($_SESSION["nombre"])) {
    $_SESSION["nombre"] = "";//Redundante
    unset($_SESSION["nombre"]);
}

// Esto es lo necesario
session_destroy();

setcookie("PHPSESSID", null, time()-1);


header("Location: listado.php");
die();

?>