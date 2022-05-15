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
include("conexion.php"); //llamando a otro archivo php
//declaración de variables para recibir y guardar los datos enviados desde el formulario
$namePaciente = $_POST["namePaciente"];
$curp         = $_POST["curp"];
$domicilio    = $_POST["domicilio"];
$telefono     = $_POST["telefono"];
$sexo         = $_POST["sexo"];
$edad         = $_POST["edad"];

//Evaluamos si la CURP ingresada ya existe
$consultaId = "SELECT CURP 
               FROM Paciente 
               WHERE CURP= '$curp'";
$consultaId = mysqli_query($conexion, $consultaId); //devuelve un objeto con el resultado (False o True)
$consultaId = mysqli_fetch_array($consultaId); //devuelve un array o NULL

if(!$consultaId){//Si la consulta es vacia, podemos insertar
    $sql = "INSERT INTO Paciente VALUES ( '$namePaciente', '$curp', '$domicilio', '$telefono', '$sexo', '$edad')";
    
    //Ejecutamos y Verificamos si se guardaron los datos
    if(mysqli_query($conexion, $sql)){
        echo "<script>alert('Paciente agregado correctamente'); window.location = '../altas.php';</script>";
    }else{
        echo "<h1>Error:</h1>".$sql ."<br>".mysqli_error($conexion);
    }
}else{
    echo "<script>alert('El paciente ya existe dentro de la base de datos'); window.location = '../altas.php';</script>";
}
//Cerrando la conexión
mysqli_close($conexion);

?>