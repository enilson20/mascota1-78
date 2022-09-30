<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql ="SELECT * FROM usuario, tipo_usuario WHERE identificacion = '".$_SESSION['usuario']."' AND usuario.id_tipo_usuario = tipo_usuario.id_tipo_usuario";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);


?>

<?php 
$sql3 ="SELECT * FROM visita";
$tp_usu3 = mysqli_query($mysqli, $sql3);
$usua3 = mysqli_fetch_assoc($tp_usu3);

$sql4 ="SELECT * FROM medicamentos ";
$tp_usu4 = mysqli_query($mysqli, $sql4); 
$usua4 = mysqli_fetch_assoc($tp_usu4);

$sql5 ="SELECT * FROM mascota, visita where mascota.id_mascota = visita.id_mascota";
$tp_usu5 = mysqli_query($mysqli, $sql5);
$usua5 = mysqli_fetch_assoc($tp_usu5)

?>

<?php
    if((isset($_POST["btnguardar"]))&&($_POST["btnguardar"]== "frmadd")){
        $idvis=$_POST["id_vis"];
 
        
        $sqladd ="SELECT * FROM receta";
        $query = mysqli_query($mysqli,$sqladd);
        $fila = mysqli_fetch_assoc($query);

        if ($_POST['id_vis']=='' || $_POST['id_med']=='')
        {
            echo'<script>alert("existen campos vacios en el formulario");</script>';
            echo'<script>window.lacation="receta.php"</script>';
        }else{
            $id_vis=$_POST["id_vis"];
            $tm=$_POST["id_med"];

            $sqladd ="INSERT INTO receta(id_visita, id_medicamentos) values('$id_vis', '$tm')";
            $query = mysqli_query($mysqli,$sqladd);

            echo'<script>alert("registro exitoso");</script>';
            echo'<script>window.lacation="receta.php"</script>';     
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
            <h1>Formulario Receta   <?php echo $usua['tipo_usuario']?></h1>
        </section>
        
        <table class ="centrar" border = "1">
            <form method= "POST" name="frmadd" autocplete = "off">

                <tr>
                    <td colspan="2"> Receta Veterinaria </td>
                </tr>
                <tr>
                    <td>Visitas</td>
                    <td>
                        <select name="id_vis">
                            <option value=""> Seleccione Visita</option>
                            <?php
                            do{                             
                            ?> <option value="<?php echo($usua3['id_visita'])?>"><?php echo($usua3['fecha_visita'])?> <?php echo($usua5['nombre'])?></option>
                            <?php
                            }while($usua3=mysqli_fetch_assoc($tp_usu3) and $usua5 = mysqli_fetch_assoc($tp_usu5));
                            ?>
                        </select>
                    </td>                    
                </tr>

                <tr>
                    <td>Medicamentos</td>
                    <td>
                        <select name="id_med">
                            <option value=""> Seleccione Medicamento</option>
                            <?php
                            do{                             
                            ?> <option value="<?php echo($usua4['id_medicamentos'])?>"><?php echo($usua4['medicamentos'])?></option>
                            <?php
                            }while($usua4=mysqli_fetch_assoc($tp_usu4));
                            ?>
                        </select>
                    </td>                    
                </tr>

                <tr>
                    <td colspan="2"> &nbsp; </td>
                </tr>

                <tr>
                    <td colspan="2"><input type="submit" name="btnadd" value="Guardar"> </td>
                    <input type="hidden" name="btnguardar" value="frmadd">

                </tr>
         