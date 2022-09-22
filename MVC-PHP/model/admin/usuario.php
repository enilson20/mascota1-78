
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
$sql1 ="SELECT * FROM tipo_usuario";
$tp_usu = mysqli_query($mysqli, $sql1);
$usua1 = mysqli_fetch_assoc($tp_usu);

$sql2 ="SELECT * FROM estado WHERE id_estado < 3 ";
$tp_usu2 = mysqli_query($mysqli, $sql2);
$usua2 = mysqli_fetch_assoc($tp_usu2);
?>

<?php
    if((isset($_POST["btnguardar"]))&&($_POST["btnguardar"]== "frmadd")){
        $TP=$_POST["docu"];
        $sqladd ="SELECT * FROM usuario WHERE identificacion ='$TP'";
        $query = mysqli_query($mysqli,$sqladd);
        $fila = mysqli_fetch_assoc($query);

        if($fila){
            echo'<script>alert("el usuario ya existe");</script>';
            echo'<script>window.lacation="agregar_usuario.php"</script>';
        
        }elseif ($_POST['id_tp']=='' || $_POST['id_estado']==''|| $_POST['pass']=='' || $_POST['docu']==''|| $_POST['nom']=='' || $_POST['ape']=='' || $_POST['tel']=='' || $_POST['cor']=='' || $_POST['dir']=='' || $_POST['tar']=='')
        {
            echo'<script>alert("existen campos vacios en el formulario");</script>';
            echo'<script>window.lacation="agregar_usuario.php"</script>';
        }else{
            $id_tp =$_POST["id_tp"];
            $id_estado =$_POST["id_estado"];
            $pass =$_POST["pass"];
            $docu =$_POST["docu"];
            $nom =$_POST["nom"];
            $ape =$_POST["ape"];
            $tel =$_POST["tel"];
            $cor =$_POST["cor"];
            $dir =$_POST["dir"];
            $tar =$_POST["tar"];
            

            $sqladd ="INSERT INTO usuario (id_tipo_usuario, id_estado, password, identificacion, nombre, apellido, telefono, correo, dirrecion, tarjeta_profesional) values('$id_tp', '$id_estado', '$pass', '$docu', '$nom', '$ape', '$tel', '$cor','$dir', '$tar')";
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
    <body onload = "frmadd.tip_usu.focus()">
        <section class="title">
            <h1>Formulario Creacion Usuarios   <?php echo $usua['tipo_usuario']?></h1>
        </section>
        
        <table class ="centrar" border = "1">
            <form method= "POST" name="frmadd" autocplete = "off">

                
                <tr>
                    <td>Contraseña</td>
                    <td><input type= "password" name="pass" placeholder = "ingrese contraseña"> </td>
                </tr>

                <tr>
                    <td>Documento Identidad</td>
                    <td><input type= "text" name="docu" placeholder = "ingrese numero documento"> </td>
                </tr>

                <tr>
                    <td>Nombre</td>
                    <td><input type= "text" name="nom" placeholder = "ingrese su nombre" style="text-transform:uppercase"> </td>
                </tr>

                <tr>
                    <td>Apellidos</td>
                    <td><input type= "text" name="ape" placeholder = "ingrese sus apellidos" style="text-transform:uppercase"> </td>
                </tr>

                <tr>
                    <td>Telefono</td>
                    <td><input type= "number" name="tel" placeholder = "ingrese numero de telefono"> </td>
                </tr>

                <tr>
                    <td>Correo Electronico</td>
                    <td><input type= "email" name="cor" placeholder = "ingrese correo electronico"> </td>
                </tr>

                <tr>
                    <td>Direccion de Domicilio</td>
                    <td><input type= "text" name="dir" placeholder = "ingrese Direccion Domicilio" style="text-transform:uppercase"> </td>
                </tr>

                <tr>
                    <td>Targeta Profesional</td>
                    <td><input type= "text" name="tar" placeholder = "ingrese targeta profesional" value="0"> </td>
                </tr>

                <tr>
                <tr>
                    <td colspan="2"> tipos de usuarios </td>
                </tr>

                <td>Tipo Usuario</td>
                    <td>
                        <select name="id_tp">
                            <option value=""> seleccione una opcion</option>
                            <?php
                            do{                             
                            ?> <option value="<?php echo($usua1['id_tipo_usuario'])?>"><?php echo($usua1['tipo_usuario'])?></option>
                            <?php
                            }while($usua1=mysqli_fetch_assoc($tp_usu));
                            ?>
                        </select>
                    </td>
                    
                </tr>

                <tr>
                    <td>estado</td>
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