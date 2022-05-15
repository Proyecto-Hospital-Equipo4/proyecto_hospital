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
$nameEmpleado = $_POST["nameEmpleado"];
$curp         = $_POST["curp"];
$domicilio    = $_POST["domicilio"];
$telefono     = $_POST["telefono"];
$fechaCont    = $_POST["fechaContratacion"];
$sexo         = $_POST["sexo"];
$edad         = $_POST["edad"];
$password     = $_POST["password"];

$passwordHash = password_hash($password, PASSWORD_BCRYPT); //BCRYPT es el algoritmo de encriptación

//Evaluamos si la CURP ingresada ya existe
$consultaId = "SELECT CURP 
               FROM Recepcionista 
               WHERE CURP= '$curp'";
$consultaId = mysqli_query($conexion, $consultaId); //devuelve un objeto con el resultado (False o True)
$consultaId = mysqli_fetch_array($consultaId); //devuelve un array o NULL

if(!$consultaId){//Si la consulta es vacia, podemos insertar
    $sql = "INSERT INTO Recepcionista VALUES ( '$curp', '$nameEmpleado', '$domicilio', '$telefono', '$fechaCont', '$sexo', '$edad')";
    $sqlDos = "INSERT INTO sesion VALUES ( NULL, '$curp', '$passwordHash', '2')";

    //Ejecutamos y Verificamos si se guardaron los datos
    if(mysqli_query($conexion, $sql)){
        if(mysqli_query($conexion, $sqlDos)){
            echo "<script>alert('Recepcionista agregado correctamente'); window.location = '../altasRecepcionista.php';</script>";
        }else{
            echo "<h1>Error:</h1>".$sqlDos ."<br>".mysqli_error($conexion);
        }
    }else{
        echo "<h1>Error:</h1>".$sql ."<br>".mysqli_error($conexion);
    }
}else{
    echo "<script>alert('El recepcionista ya existe dentro de la base de datos'); window.location = '../altasRecepcionista.php';</script>";
}
//Cerrando la conexión
mysqli_close($conexion);

?>