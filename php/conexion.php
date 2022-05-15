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
//declarando variables para la conexion
$servidor = "localhost"; //el servidor que utilizaremos, en este caso será el localhost
$usuario = "root";       //el usuario de la base de datos
$contraseña = "";        //la contraseña del usuario que utilizaremos
$BD         = "usuario";  //el nombre de la base de datos
$conexion = mysqli_connect($servidor, $usuario, $contraseña, $BD);
$conexion->set_charset("utf8");
//Verificando la conexion
/*
if(!$conexion){
    echo "Falló la conexión <br>";
    die("Conexión failed".mysqli_connect_error());
}
else{
    echo "Conexión exitosa";
}*/
?>