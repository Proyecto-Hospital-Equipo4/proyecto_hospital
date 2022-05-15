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
$CURP_paciente = $_POST['CURPPACIENTE'];
$CURP_medico   = $_POST['CURPMEDICO'];
$Fecha_aten    = $_POST['fechaAtencion'];
$Hora_aten     = $_POST['horaAtencion'];

//Evaluamos si la CURP ingresada ya existe
$consultaId = "SELECT hora 
               FROM Citas
               WHERE fecha= '$Fecha_aten' AND hora= '$Hora_aten' OR fecha= '$Fecha_aten' AND CURP_paciente= '$CURP_paciente'";
$consultaId = mysqli_query($conexion, $consultaId); //devuelve un objeto con el resultado (False o True)
$consultaId = mysqli_fetch_array($consultaId); //devuelve un array o NULL

if(!$consultaId){//Si la consulta es vacia, podemos insertar
    $sql = "INSERT INTO Citas VALUES ( '$CURP_paciente', '$CURP_medico', '$Fecha_aten', '$Hora_aten', NULL)";
    
    //Ejecutamos y Verificamos si se guardaron los datos
    if(mysqli_query($conexion, $sql)){
        echo "<script>alert('Cita asignada correctamente'); window.location = '../altasCitas.php';</script>";
    }else{
        echo "<h1>Error:</h1>".$sql ."<br>".mysqli_error($conexion);
    }
}else{
    echo "<script>alert('Se encuentra ya una cita asignada'); window.location = '../altasCitas.php';</script>";
}
//Cerrando la conexión
mysqli_close($conexion);

?>