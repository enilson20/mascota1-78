
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql ="SELECT * FROM usuario, tipo_usuario WHERE identificacion = '".$_SESSION['usuario']."' AND usuario.id_tipo_usuario = tipo_usuario.id_tipo_usuario";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);


?>
<?php
    if((isset($_POST["btnguardar"]))&&($_POST["btnguardar"]== "frmadd")){
        $tpest=$_POST["tip_est"];
        $sqladd ="SELECT * FROM tipo_usuario WHERE tipo_usuario ='$tpest'";
        $query = mysqli_query($mysqli,$sqladd);
        $fila = mysqli_fetch_assoc($query);

        if($fila){
            echo'<script>alert("el estado ya existe");</script>';
            echo'<script>window.lacation="agregar_usuario.php"</script>';
        
        }elseif ($_POST['tip_est']=='')
        {
            echo'<script>alert("existen campos vacios en el formulario");</script>';
            echo'<script>window.lacation="agregar_usuario.php"</script>';
        }else{
            $TP=$_POST["tip_est"];
            $sqladd ="INSERT INTO estado(tipo_estado)values('$tpest')";
            $query = mysqli_query($mysqli,$sqladd);

            echo'<script>alert("registro exitoso");</script>';
            echo'<script>window.lacation="agregar_usuario.php"</script>';     
        }
}




?>
<form method="POST">

    <tr>
        <td colspan='2' align="center"><?php echo $usua['nombre']?></td>
    </tr>
<tr><br>
    <td colspan='2' align="center">
    
    
        <input type="submit" value="Cerrar sesión" name="btncerrar" /></td>
        <input type="submit" formaction="../index.php" value="Regresar" />
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
    <body onload = "frmadd.tip_est.focus()">
        <section class="title">
            <h1>Formulario Creacion Tipos de Mascota   <?php echo $usua['tipo_usuario']?></h1>
        </section>
        
        <table class ="centrar" border = "1">
            <form method= "POST" name="frmadd" autocplete = "off">

                <tr>
                    <td colspan="2"> RECETARIO </td>
                </tr>

                <tr>
                    <td>VISITA</td>
                    <td><input type= "text" name="vis"> </td>
                </tr>

                <tr>
                    <td>MEDICAMENTOS</td>
                    <td><input type= "text" name="med"placeholder="ingrese medicamento" style="text-transform:uppercase"> </td>
                </tr>
                <td>MEDICAMENTOS</td>
                    <td><input type= "text" name="med"placeholder="ingrese medicamento" style="text-transform:uppercase"> </td>

                <tr>
                    <td colspan="2"> &nbsp; </td>
                </tr>

                <tr>
                    <td colspan="2"><input type="submit" name="btnadd" value="Guardar"> </td>
                    <input type="hidden" name="btnguardar" value="frmadd">

                </tr>

            </form>


        </table>
    
    </body>
</html>