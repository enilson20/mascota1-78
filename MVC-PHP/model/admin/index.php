
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
    <link rel="stylesheet" href="estilos.css">
    <title>Mascota Feliz</title>
</head>
    <body>
        <section class="title">
            <h1>INTERFAZ    <?php echo $usua['tipo_usuario']?></h1>
        </section>
    
        <nav class="navegacion">
           
            <ul class="menu wrapper" >
    
                <li class="first-item">
                    <a href="agregar_usuario.php">
                        <img src="img/tpusuarios.webp" alt="" class="imagen">
                        <span class="text-item">CREAR TIPO DE USUARIO</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="usuario.php">
                        <img src="img/frmusuario.jpg" alt="" class="imagen">
                        <span class="text-item">FORMULARIO CREACION USUARIOS</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="tipo_mascota.php">
                        <img src="img/tpmascota.jpg" alt="" class="imagen">
                        <span class="text-item">TIPO_MASCOTA</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="tipos_estados.php">
                        <img src="img/planear.png" alt="" class="imagen">
                        <span class="text-item">TIPOS DE ESTADOS</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="receta.php">
                        <img src="img/recetario.jpg" alt="" class="imagen">
                        <span class="text-item">RECETARIO</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li class="first-item">
                    <a href="#">
                        <img src="img/analisis.png" alt="" class="imagen">
                        <span class="text-item">OPCION 6</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="#">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">OPCION 7</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="#">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">OPCION 8</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="#">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">OPCION 9</span>
                        <span class="down-item"></span>
                    </a>
                </li>
    
                <li>
                    <a href="#">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">OPCION 10</span>
                        <span class="down-item"></span>
                    </a>
                </li>

                <li>
                    <a href="#">
                        <img src="" alt="" class="imagen">
                        <span class="text-item">OPCION 11</span>
                        <span class="down-item"></span>
                    </a>
                </li>
                
            </ul>
            
        </nav>
    </body>
</html>