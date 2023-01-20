<?php 
require("../src/init.php");

$title="Listado de usuarios";
$pageHeader="Listado";
$pagId="listado";
$content="Esto es el contenido";

// Obtiene info del modelo
$DB->ejecuta("SELECT * FROM usuarios");
$usuarios = $DB->obtenDatos();

// Se lo pasa al template
ob_start();

?>

<table>
    <tr><td>Nombre</td><td>Foto</td></tr>

    <?php foreach($usuarios as $usuario) { ?>
        <tr>
            <td><?=$usuario['nombre']?></td>
            <td><img src="<?=$usuario['img']?>" alt=""></td>
        </tr>
    <?php } ?>

</table>

<?php 
$content=ob_get_clean();

require("template.php");

/*


<?php foreach($usuarios as $usuario) {
    <?php 
        print_r($usuario);
    ?>
<?php } ?>
*/
?>

