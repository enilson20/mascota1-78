
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
    <link rel="shortcut icon" href="../../../img/logogato3.jpg" type="image/jpg">
    <link rel="stylesheet" href="estilos.css">
    <title>Mascota Feliz</title>
</head>
    <body>
        <section class="title">
            <h1>  <?php echo $usua['tipo_usuario']?></h1>
        </section>
    
        <nav class="navegacion">
           
            <ul class="menu wrapper" >
    
                <li class="first-item">
                    <a href="agregar_usuario.php">
                        <img src="img/usuario.jpg" alt="" class="imagen">
                        <span class="text-item">CREAR TIPO DE USUARIO</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="usuario.php">
                        <img src="img/frmusuario.jpg" alt="" class="imagen">
                        <span class="text-item">CREACION USUARIOS</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="tipo_mascota.php">
                        <img src="img/tpmascota.jpg" alt="" class="imagen">
                        <span class="text-item">CREAR TIPO MASCOTA</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="tipos_estados.php">
                        <img src="img/planear.png" alt="" class="imagen">
                        <span class="text-item">CREAR TIPOS DE ESTADOS</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li class="first-item">
                    <a href="lista_usuarios.php">
                        <img src="img/analisis.png" alt="" class="imagen">
                        <span class="text-item">LISTA DE USUARIOS</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                            
            </ul>
            
        </nav>
    </body>
</html>