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
$CURP_paciente = $_GET['username'];
$CURP_medico   = $_GET['medico'];
$numCita       = $_GET['numeroCita'];
$Fecha_aten    = $_POST['fechaDiagnostico'];
$Hora_aten     = $_POST['horaDiagnostico'];
$observacion   = $_POST['observacion'];

//Evaluamos si Num_expediente ingresada ya existe
$consultaId = "SELECT *
               FROM Expediente
               WHERE CURP= '$CURP_paciente'";
$consultaId = mysqli_query($conexion, $consultaId); //devuelve un objeto con el resultado (False o True)
$consultaId = mysqli_fetch_array($consultaId); //devuelve un array o NULL
$numExpediente = $consultaId['Num_expediente'];

//Evaluamos si Num_expediente ingresada ya existe
$consultaG = "SELECT *
               FROM Medico
               WHERE CURP= '$CURP_medico'";
$consultaG = mysqli_query($conexion, $consultaG); //devuelve un objeto con el resultado (False o True)
$consultaG = mysqli_fetch_array($consultaG); //devuelve un array o NULL
$nMedico = $consultaG['Nombre'];

$sql = "INSERT INTO Diagnosticos VALUES ( '$numExpediente', '$Fecha_aten', '$Hora_aten', '$observacion', '$nMedico')";
    
//Ejecutamos y Verificamos si se guardaron los datos
if(mysqli_query($conexion, $sql)){
    echo "<script>alert('Diagnostico registrado correctamente'); window.location = '../expediente.php?username=".$CURP_paciente."&medico=".$CURP_medico."&numcita=".$numCita."';</script>";
}else{
    echo "<h1>Error:</h1>".$sql ."<br>".mysqli_error($conexion);
}

//Cerrando la conexión
mysqli_close($conexion);

?>