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
        $tm=$_POST["tip_med"];
        
        $sqladd ="SELECT * FROM medicamentos WHERE medicamentos ='$tm'";
        $query = mysqli_query($mysqli,$sqladd);
        $fila = mysqli_fetch_assoc($query); 

        if($fila){
            echo'<script>alert("el medicamnento ya existe");</script>';
            echo'<script>window.lacation="agregar_usuario.php"</script>';
        
        }elseif ($_POST['tip_med']=='')
        {
            echo'<script>alert("existen campos vacios en el formulario");</script>';
            echo'<script>window.lacation="agregar_usuario.php"</script>';
        }else{
            $TP=$_POST["tip_med"];
            $sqladd ="INSERT INTO medicamentos(medicamentos)values('$tm')";
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
    <body onload = "frmadd.tip_med.focus()">
        <section class="title">
            <h1>Formulario Ingreso de Medicamentos   <?php echo $usua['tipo_usuario']?></h1>
        </section>
        
        <table class ="centrar" border = "1">
            <form method= "POST" name="frmadd" autocplete = "off">

                <tr>
                    <td colspan="2"> Tipos de Medicamentos </td>
                </tr>

                <tr>
                    <td>Medicamento</td>
                    <td><input type= "text" name="tip_med"placeholder="ingrese el Medicamento" style="text-transform:uppercase"></td>
                </t
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