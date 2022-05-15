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

session_start();//inicia nueva sesion
$login = $_SESSION['login'];

if(!$login){
    header('Location: index.php');
}else{
    $username = $_SESSION['username']; //no es estrictamente necesario, pero nos facilitara el codigo más adelante
}
?>