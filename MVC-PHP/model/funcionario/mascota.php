
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
$sql1 ="SELECT * FROM usuario WHERE id_tipo_usuario = 5  " ;
$tp_usu = mysqli_query($mysqli, $sql1);
$usua1 = mysqli_fetch_assoc($tp_usu);

$sql2 ="SELECT * FROM tipo_mascota "; 
$tp_usu2 = mysqli_query($mysqli, $sql2);
$usua2 = mysqli_fetch_assoc($tp_usu2);
?>

<?php
    if((isset($_POST["btnguardar"]))&&($_POST["btnguardar"]== "frmadd")){
        $TP1 =$_POST["nom"];
        $sqladd ="SELECT * FROM mascota WHERE nombre ='$TP1'";
        $query = mysqli_query($mysqli,$sqladd);
        $fila = mysqli_fetch_assoc($query);

        if($fila){
            echo'<script>alert("la mascota ya existe");</script>';
            echo'<script>window.lacation="agregar_usuario.php"</script>';
        
        }elseif ($_POST['id_us']=='' || $_POST['id_tm']==''|| $_POST['nom']=='' || $_POST['raz']==''|| $_POST['col']=='' )
        {
            echo'<script>alert("existen campos vacios en el formulario");</script>';
            echo'<script>window.lacation="agregar_usuario.php"</script>';
        }else{
            $id_us =$_POST["id_us"];
            $id_tm =$_POST["id_tm"];
            $nom =$_POST["nom"];
            $raz =$_POST["raz"];
            $col =$_POST["col"];

            $sqladd ="INSERT INTO mascota (id_usuario, id_tipo_mascota, nombre, raza, color) values('$id_us', '$id_tm', '$nom', '$raz', '$col')";
            $query = mysqli_query($mysqli,$sqladd);

            echo'<script>alert("registro exitoso");</script>';
            echo'<script>window.lacation="mascota.php"</script>';     
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
    <link rel="shortcut icon" href="../../../img/logogato.png" type="image/x-icon">
    <title>Mascota Feliz</title>
</head>
    <body onload = "frmadd.tip_usu.focus()">
        <section class="title">
            <h1>Formulario Creacion Mascotas - <?php echo $usua['tipo_usuario']?></h1>
        </section>
        
        <table class ="centrar" border = "1">
            <form method= "POST" name="frmadd" autocplete = "off">

                <tr>
                    <td>Nombre</td>
                    <td><input type= "text" name="nom" placeholder = "ingrese su nombre" style="text-transform:uppercase"> </td>
                </tr>

                <tr>
                    <td>Raza</td>
                    <td><input type= "text" name="raz" placeholder = "ingrese la raza" style="text-transform:uppercase"> </td>
                </tr>

                <tr>
                    <td>Color</td>
                    <td><input type= "text" name="col" placeholder = "ingrese color" style="text-transform:uppercase"> </td>
                </tr>

                <tr>
                <tr>
                    <td colspan="2"> usuarios </td>
                </tr>

                <tr>
                <td>Usuario</td>
                    <td>
                        <select name="id_us">
                            <option value=""> seleccione usuario</option>
                            <?php
                            do{                             
                            ?> <option value="<?php echo($usua1['identificacion'])?>"><?php echo($usua1['nombre'])?></option>
                            <?php
                            }while($usua1=mysqli_fetch_assoc($tp_usu));
                            ?>
                        </select>
                    </td>
                    
                </tr>

                <tr>
                    <td>Tipo de Mascota</td>
                    <td>
                        <select name="id_tm">
                            <option value=""> seleccione un estado</option>
                            <?php
                            do{                             
                            ?> <option value="<?php echo($usua2['id_tipo_mascota'])?>"><?php echo($usua2['tipo_mascota'])?></option>
                            <?php
                            }while($usua2=mysqli_fetch_assoc($tp_usu2));
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