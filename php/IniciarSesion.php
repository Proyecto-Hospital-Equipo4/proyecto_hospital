<!-- Equipo No.4 -->
<!-- Integrantes: -->
<!-- 
     Martinez López, Sebastián
     Mendoza Fajardo, Joaquín Esaú
     Núñez Morgan, Luis Fernando
     Orozco Guzmán, Oscar Étienne
     Ramírez Espinosa, Bryan Uriel
-->
<!-- Seminario de solución de problemas de base de datos -->
<!-- Calendario: 2022A Sección: D04 -->
<?php

include("conexion.php");

session_start(); //inicia una nueva sesion o reanuda la existencia.
$_SESSION['login'] = false;

//declaracion de variables
$username = $_POST["username"];
$password = $_POST["contraseña"];
//Evaluamos el nickname ingresado
$consulta = "SELECT *
             FROM sesion
             WHERE Nombre_usuario = '$username'";
$consulta = mysqli_query($conexion, $consulta);
$consulta = mysqli_fetch_array($consulta);

if($consulta){
    if(password_verify($password, $consulta['Password']) or $password == $consulta['Password']){
        $_SESSION['login'] = true;
        $_SESSION['username'] = $consulta['Nombre_usuario'];
        $_SESSION['rol'] = $consulta['rol_id'];
        switch($_SESSION['rol']){
            case 1:
                header('Location: ../menu_admin.php');
                break;
                case 2:
                    header('Location: ../menu_recepcionista.php');
                    break;
                    case 3:
                        header('Location: ../menu_medico.php?username='.$_SESSION['username']);
                        break;
                    default:
        }   
    }else{
        echo "<script>alert('Contraseña incorrecta, por favor intente de nueva cuenta'); window.location = '../index.php';</script>";
    }
}else{
    echo "<script>alert('Usuario no existe, por favor intente de nueva cuenta'); window.location = '../index.php';</script>";
}

//Cerrando la conexion
mysqli_close($conexion);
?>