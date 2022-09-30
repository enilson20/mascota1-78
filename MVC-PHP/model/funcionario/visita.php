
<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql ="SELECT * FROM usuario, tipo_usuario WHERE identificacion = '".$_SESSION['usuario']."' AND usuario.id_tipo_usuario = tipo_usuario.id_tipo_usuario";
$usuarios = mysqli_query($mysqli, $sql);
$usua = mysqli_fetch_assoc($usuarios);
?>

<?php
//consulta para los tipos de usuarios
$sql1 ="SELECT * FROM usuario WHERE id_tipo_usuario = 2 AND identificacion = '".$_SESSION['usuario']."' ";
$tp_usu = mysqli_query($mysqli, $sql1);
$usua1 = mysqli_fetch_assoc($tp_usu);

$sql2 ="SELECT * FROM estado WHERE id_estado > 3 ";
$tp_usu2 = mysqli_query($mysqli, $sql2); 
$usua2 = mysqli_fetch_assoc($tp_usu2);

$sql3 ="SELECT * FROM mascota ";
$tp_usu3 = mysqli_query($mysqli, $sql3);
$usua3 = mysqli_fetch_assoc($tp_usu3);
?>

<?php
    if((isset($_POST["btnguardar"]))&&($_POST["btnguardar"]== "frmadd")){
        $TP=$_POST["id_tp"];
        $sqladd ="SELECT * FROM visita WHERE id_mascota ='$TP'";
        $query = mysqli_query($mysqli,$sqladd);
        $fila = mysqli_fetch_assoc($query);

        if($fila=0){
            echo'<script>alert("error");</script>';
            echo'<script>window.lacation="visita.php"</script>';
        
        }else{
            $idmas=$_POST["id_mas"];
            $idtp=$_POST["id_tp"];
            $idestado=$_POST["id_estado"];
            $fec =$_POST["fec"];
            $tem =$_POST["tem"];
            $pes =$_POST["pes"];
            $res =$_POST["res"];
            $car =$_POST["car"];
            $est =$_POST["est"];
            $rec =$_POST["rec"];
            $cos =$_POST["cos"];
           
            $sqladd ="INSERT INTO visita (id_mascota, id_usuario, id_estado, fecha_visita, temperatura, peso, freq_respi, freq_cardi, estado_animo, recomendaciones, costo_visita) values ('$idmas', '$idtp', '$idestado', '$fec', '$tem', '$pes', '$res', '$car','$est', '$rec', '$cos')";
            $query = mysqli_query($mysqli,$sqladd);

            echo'<script>alert("registro exitoso");</script>';
            echo'<script>window.lacation="visita.php"</script>';     
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
    <body onload = "frmadd.tip_usu.focus()">
        <section class="title">
            <h1>Formulario Captura Informacion Visitas  <?php echo $usua['tipo_usuario']?></h1>
        </section>
        
        <table class ="centrar" border = "1">
            <form method= "POST" name="frmadd" autocplete = "off">
                
                <tr>
                    <td>Fecha de Visita</td>
                    <td><input type= "date" name="fec" placeholder = "ingrese fecha"> </td>
                </tr>

                <tr>
                    <td>Temperatura</td>
                    <td><input type= "text" name="tem" placeholder = "ingrese temperatura"> </td>
                </tr>

                <tr>
                    <td>Peso</td>
                    <td><input type= "text" name="pes" placeholder = "ingrese peso"> </td>
                </tr>

                <tr>
                    <td>Frecuencia Respiratoria</td>
                    <td><input type= "text" name="res" placeholder = "ingrese fre/card"> </td>
                </tr>

                <tr>
                    <td>Frecuencia Cardiaca</td>
                    <td><input type= "text" name="car" placeholder = "ingrese fre/resp"> </td>
                </tr>

                <tr>
                    <td>Estado de Animo</td>
                    <td><input type= "text" name="est" placeholder = "ingrese estado de animo"> </td>
                </tr>

                <tr>
                    <td>Recomendaciones</td>
                    <td><input type= "text" name="rec" placeholder = "haga sus recomendaciones"> </td>
                </tr>

                <tr>
                    <td>Costo Visita</td>
                    <td><input type= "text" name="cos" placeholder = "ingrese targeta profesional" value="0"> </td>
                </tr>

                <tr>
                <tr>
                    <td colspan="2"> tipos de usuarios </td>
                </tr>

                <td>Veterinario Que Atiende</td>
                    <td>
                        <select name="id_tp">
                            <option value=""> seleccione una opcion</option>
                            <?php
                            do{                             
                            ?> <option value="<?php echo($usua1['identificacion'])?>"><?php echo($usua1['nombre'])?> <?php echo($usua1['apellido'])?></option>
                            <?php
                            }while($usua1=mysqli_fetch_assoc($tp_usu));
                            ?>
                        </select>
                    </td>
                    
                </tr>

                <tr>
                    <td>Estado de la Mascota</td>
                    <td>
                        <select name="id_estado">
                            <option value=""> seleccione un estado</option>
                            <?php
                            do{                             
                            ?> <option value="<?php echo($usua2['id_estado'])?>"><?php echo($usua2['tipo_estado'])?></option>
                            <?php
                            }while($usua2=mysqli_fetch_assoc($tp_usu2));
                            ?>
                        </select>
                    </td>
                    
                </tr>

                <tr>
                    <td>Nombre de la Mascota</td>
                    <td>
                        <select name="id_mas">
                            <option value=""> seleccione una mascota</option>
                            <?php
                            do{                             
                            ?> <option value="<?php echo($usua3['id_mascota'])?>"><?php echo($usua3['nombre'])?></option>
                            <?php
                            }while($usua3=mysqli_fetch_assoc($tp_usu3));
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

            </form>

        </table>
    
    </body>
</html>