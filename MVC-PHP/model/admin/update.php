<?php
session_start();
require_once("../../db/connection.php");
include("../../controller/validarSesion.php");
$sql=" SELECT * FROM usuario, tipo_usuario, estado WHERE usuario.id_tipo_usuario=tipo_usuario.id_tipo_usuario AND estado.id_estado=usuario.id_estado AND usuario.identificacion='".$_GET['id']."'";
$query=mysqli_query($mysqli,$sql);
$result=mysqli_fetch_assoc($query)
?>

<?php
if(isset($_POST["update"]))
{
    $id_tp=$_POST['id_tp'];
    $ides=$_POST['id_estado'];
    $nom=$_POST['nom'];
    $ape=$_POST['ape'];
    $tel=$_POST['tel'];
    $cor=$_POST['cor'];
    $dir=$_POST['dir'];
    $tar=$_POST['tar'];
    
    $sql_update="UPDATE usuario SET id_tipo_usuario='$id_tp', id_estado='$ides', nombre = '$nom', apellido = '$ape', telefono = '$tel', correo = '$cor', dirrecion='$dir', tarjeta_profesional='$tar' WHERE identificacion = '".$_GET['id']."'";
    $cs=mysqli_query($mysqli, $sql_update);
    echo '<script>alert (" Actualización Exitosa ");</script>';
}
elseif(isset($_POST["delete"]))
{
    $sqldelete="DELETE FROM usuario WHERE identificacion = '".$_GET['id']."'";
    $cs=mysqli_query($mysqli, $sqldelete);
    echo '<script>alert (" Registro borrado con exito ");</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<script> 
function centrar() { 
    iz=(screen.width-document.body.clientWidth) / 2; 
    de=(screen.height-document.body.clientHeight) / 2; 
    moveTo(iz,de); 
}     
</script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body onload="centrar();">
    <table>
        <form name = "consult" method = "POST" autocomplete="off">

        <tr>
                <td>Tipo de Usuario</td>
                <td> <select name="id_tp">
                            <?php echo($usua1['tipo_usuario'])?>
                            <?php
                            $sql1 ="SELECT * FROM tipo_usuario";
                            $tp_usu = mysqli_query($mysqli, $sql1);
                            $usua1 = mysqli_fetch_assoc($tp_usu);
                            do{                             
                            ?> <option value="<?php echo($usua1['id_tipo_usuario'])?>"><?php echo($usua1['tipo_usuario'])?></option>
                            <?php
                            }while($usua1=mysqli_fetch_assoc($tp_usu));
                            ?>
                        </select></td>
            </tr>

            <tr>
                        <td>Estado</td>
                <td><select name="id_estado">
                            <?php echo($usua1['tipo_estado'])?>
                            <?php
                            $sql2 ="SELECT * FROM `estado` WHERE id_estado < 4 ";
                            $tp_usu2 = mysqli_query($mysqli, $sql2);
                            $usua2 = mysqli_fetch_assoc($tp_usu2); 
                            do{                             
                            ?> <option value="<?php echo($usua2['id_estado'])?>"><?php echo($usua2['tipo_estado'])?></option>
                            <?php
                            }while($usua2=mysqli_fetch_assoc($tp_usu2));
                            ?>
                        </select></td>
            </tr>

            <tr>
                <td>Documento</td>
                <td><input name="doc" value="<?php echo $result['identificacion'] ?>" readonly> </td>
            </tr>

            <tr>
                <td>Nombre</td>
                <td><input name="nom" value="<?php echo $result['nombre'] ?>" > </td>
            </tr>

            <tr>
                <td>Apellido</td>
                <td><input name="ape" value="<?php echo $result['apellido'] ?>" > </td>
            </tr>

            <tr>
                <td>Telefono</td>
                <td><input name="tel" value="<?php echo $result['telefono'] ?>" > </td>
            </tr>

            <tr>
                <td>Correo</td>
                <td><input name="cor" value="<?php echo $result['correo'] ?>" readonly> </td>
            </tr>

            <tr>
                <td>Direccion</td>
                <td><input name="dir" value="<?php echo $result['dirrecion'] ?>" readonly> </td>
            </tr>

            <tr>
                <td>Targeta Profesional</td>
                <td><input name="tar" value="<?php echo $result['tarjeta_profesional'] ?>" readonly> </td>
            </tr>

            
            <tr>
                <td colspan="2"> &nbsp; </td>
            </tr>
            <tr>
                <td><input type="submit" name="update" value="Update"></td>

                <td><input type="submit" name="delete" value="Delete"></td>
            </tr>

        </form>
    </table>
    
</body>
</html>