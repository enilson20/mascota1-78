
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql ="SELECT * FROM usuario, tipo_usuario WHERE identificacion = '".$_SESSION['usuario']."' AND usuario.id_tipo_usuario = tipo_usuario.id_tipo_usuario";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);
$id = $_GET['id']
?>

<form method="POST">

    <tr>
        <td colspan='2' align="center"><?php echo $usua['nombre']?></td> 
    </tr>
<tr><br>
    <td   colspan='2' align="center">
    
    
        <input type="submit" value="Cerrar sesión" name="btncerrar" /></td>
        <input type="submit" formaction="index.php" value="Regresar" />
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
                    <td>Cod. Visita</td>
                    <td>Veterinario</td>
                    <td>Fecha Visita</td>
                    <td>Estado</td>
                    <td>Temperatura</td>
                    <td>Peso</td>
                    <td>Frecuencia Respiratoria</td>
                    <td>Frecuencia Cardiaca</td>
                    <td>Estado Animo</td>
                    <td>Recomendaciones</td>
                    <td>Medicamentos</td>
                    <td>&nbsp;</td>
                </tr>
                <?php
                    $sql = "SELECT *,mascota.id_mascota as id_mascota, mascota.nombre as nombre, usuario.nombre as veterinario,tipo_estado as estado, medicamentos.medicamentos as medicina, visita.id_visita as visita FROM visita,receta,mascota,usuario,estado,medicamentos WHERE visita.id_mascota = $_GET[id] AND mascota.id_mascota= visita.id_mascota AND receta.id_visita = visita.id_visita AND receta.id_medicamentos = medicamentos.id_medicamentos AND visita.id_usuario = usuario.identificacion AND visita.id_estado = estado.id_estado";
                    $i=0;
                    $query = mysqli_query($mysqli,$sql);
                    while($result = mysqli_fetch_assoc($query)){
                        $i++;
                ?>
                 <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $result['id_mascota'] ?></td>
                    <td><?php echo $result['nombre'] ?></td>
                    <td><?php echo $result['visita'] ?></td>
                    <td><?php echo $result['veterinario'] ?></td>
                    <td><?php echo $result['fecha_visita'] ?></td>
                    <td><?php echo $result['estado'] ?></td>
                    <td><?php echo $result['temperatura'] ?></td>
                    <td><?php echo $result['peso'] ?></td>
                    <td><?php echo $result['freq_respi'] ?></td>
                    <td><?php echo $result['freq_cardi'] ?></td>
                    <td><?php echo $result['estado_animo'] ?></td>
                    <td><?php echo $result['recomendaciones'] ?></td>
                    <td><?php echo $result['medicina'] ?></td>
                    <td><a href="?id=<?php echo $result['id_mascota'] ?>" onclick="window.open('lista.php?id=<?php echo $result['id_mascota'] ?>','','width= 1200,height=500, toolbar=NO');void(null);">Historia Clinica</a></td>
                    <td>&nbsp;</td>
                </tr> <?php } ?>
                    
               
            </form>

        </table>

        </div>
    
    </body>
</html>