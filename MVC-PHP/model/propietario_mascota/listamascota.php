
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql ="SELECT * FROM usuario, tipo_usuario WHERE identificacion = '".$_SESSION['usuario']."' AND usuario.id_tipo_usuario = tipo_usuario.id_tipo_usuario";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);
?>
<form method="POST">

    <tr>
        <td colspan='2' align="center"><?php echo $usua['nombre']?></td> 
    </tr>
<tr><br>
    <td colspan='2' align="center">
    
    
         <input type="submit" value="Cerrar sesión" name="btncerrar" /></td>
        <input type="submit" formaction="index1.php" value="Regresar" />
    </tr>
</form>

<?php 

if(isset($_POST['btncerrar']))
{
	session_destroy();
 
    header('location: ../../index.html');

}
	
?>

</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>Mascota Feliz</title>
</head>
    <body onload = "frmadd.tip_usu.focus()">
        <section class="title">
            <h1>Formulario Lista Mascota   <?php echo $usua['tipo_usuario']?></h1>
        </section>
        
        <table class ="centrar" border = "1">
            <form method= "GET" name="frmconsulta" autocplete = "off">
                <tr>
                    <td>&nbsp;</td>
                    <td>Cod. Mascota</td>
                    <td>Nombre Mascota</td>
                    <td>Color</td>
                    <td>Propietario</td>
                    <td>Tipo de Usuario</td>
                    <td>Raza</td>
                    <td>Accion</td>
                    <td>&nbsp;</td>
                </tr>
                <?php
                    $sql = "SELECT *,mascota.nombre as nombre,usuario.nombre as propietario FROM tipo_usuario, mascota, usuario, tipo_mascota WHERE mascota.id_usuario = usuario.identificacion AND mascota.id_tipo_mascota= tipo_mascota.id_tipo_mascota AND usuario.id_tipo_usuario = tipo_usuario.id_tipo_usuario AND usuario.identificacion = '".$_SESSION['usuario']."'";
                    $i=0;
                    $query = mysqli_query($mysqli,$sql);
                    while($result = mysqli_fetch_assoc($query)){
                        $i++;
                ?>
                 <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['id_mascota'] ?></td>
                    <td><?php echo $result['nombre'] ?></td>
                    <td><?php echo $result['color'] ?></td>
                    <td><?php echo $result['propietario']," ",$result['apellido'] ?></td>
                    <td><?php echo $result['tipo_usuario'] ?></td>
                    <td><?php echo $result['raza'] ?></td>
                    <td><a href="?id=<?php echo $result['id_mascota'] ?>" onclick="window.open('historiaclinica.php?id=<?php echo $result['id_mascota'] ?>','','width= 1200,height=500, toolbar=NO');void(null);">Historia Clinica</a></td>
                    <td>&nbsp;</td>
                </tr> <?php } ?>
                    
               
            </form>

        </table>

        </div>
    
    </body>
</html>