<?php 
require("../src/init.php");

/* Es un mundo feliz y toda la información está bein */

echo "Hola";
print_r($_SESSION);
print_r($_POST);

// Recoger los datos de post
if(isset($_POST['login'])){
    $nombre = $_POST['nombre'];
    $passwd = $_POST['passwd'];
    $recuerdame = $_POST['recuerdame'];

    // Consulta a base de datos por el usuario
    $DB->ejecuta(
        "SELECT id, nombre, passwd FROM usuarios WHERE nombre = ?",
        $_POST['nombre']
    );

    $user = $DB->obtenElDato();
    
    // Verificar la contraseña
    if(password_verify($_POST['passwd'], $user['passwd'])) {
        $_SESSION['id'] = $user['id'];
        $_SESSION['nombre'] = $user['nombre'];

        // Si ha pedido recuérdame
        if(isset($_POST['recuerdame']) && $_POST['recuerdame'] == 'on'){
            // generar token
            $token = bin2hex(openssl_random_pseudo_bytes(LONG_TOKEN));
            // guardar token
            $DB->ejecuta(
                "INSERT INTO tokens (id_usuario, valor) VALUES (?, ?)",
                $_SESSION['id'],
                $token
            );
            // cookie con token
            
            setcookie(
                "recuerdame",
                $token,
                [
                    "expires" => (time() + (7 * 24 * 60 * 60)),
                    /*"secure" => true,*/
                    "httponly" => true
                ]
            );
        }

        if(isset($_GET['redirect'])) {
            header("Location: {$_GET['redirect']}");
            die();
        } else {
            header("Location: listado.php");
            die();
        }

    } else {
        // No me quiero detener aquí
        echo "Mostrar erro";
    }


}




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        User: <input type="text" name="nombre" id="">
        Password: <input type="password" name="passwd" id="">
        Recuérdame <input type="checkbox" name="recuerdame" id="">
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>