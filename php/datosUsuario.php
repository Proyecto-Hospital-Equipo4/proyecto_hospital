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
    $consulta = "SELECT *
                FROM Medico
                WHERE CURP='$username'";
    $consulta = mysqli_query($conexion, $consulta);//Ejecutamos la consulta
    $consulta = mysqli_fetch_array($consulta);

    $curp = $consulta['CURP'];
    $domicilio = $consulta['Domicilio'];
    $nombre = $consulta['Nombre'];
    $especialidad = $consulta['Especialidad'];
    $telefono_contacto = $consulta['Telefono_contacto'];
    $fecha_contratacion = $consulta['Fecha_contratacion'];
    $sexo = $consulta['Sexo'];
    $edad = $consulta['Edad'];
?>