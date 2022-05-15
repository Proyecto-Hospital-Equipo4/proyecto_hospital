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
    include("php/conexion.php");// el include es para llamar a un archivo
    include("php/validarSesion.php");
    if(!isset($_SESSION['rol'])){
        header('Location: index.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('Location: index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Administrador | Consulta general</title>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Noto+Sans:wght@300;400&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://kit.fontawesome.com/fec945242f.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="./styleMenu.css">
      <link rel="icon" href="img/symbol (1).png">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
      <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">
          <img src="img/symbol (1).png" width="30" height="30" class="d-inline-block align-top" alt="">
          Hospital
          </a>  
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="menu_admin.php">Inicio</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Doctores
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="altasMedicos.php">Altas</a>
                  <a class="dropdown-item" href="consultasMedico.php">Consultas generales</a>
                  <a class="dropdown-item" href="consultasMedicoI.php">Consultas individuales</a>
                  <!--
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>-->
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Recepcionistas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="altasRecepcionista.php">Altas</a>
                  <a class="dropdown-item nav-item active" href="consultasRecepcionista.php">Consultas generales</a>
                  <a class="dropdown-item" href="consultasRecepcionistaI.php">Consultas individuales</a>
                  <!--
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>-->
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contactosAdmin.php">Contactos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="php/cerrarSesion.php">Cerrar sesión</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="cover d-flex justify-content-end align-items-start p-5 flex-column" style="background-image: url(./img/fondOnce.jpg);">
            <h1>Consulta general</h1>
            <p>La mejor atención a la comunidad..</p>
            <form action="consultasRecepcionistaI.php">
              <button type="submit" class="btn btn-info"> Conoce más</button>
            </form>
        </div>
    </header>
    <section>
        <div class="container mt-5 mb-5">
          <div class="row justify-content-center">
            <?php
                $consulta = "SELECT * FROM Recepcionista ORDER BY Nombre";
                $datos = mysqli_query($conexion, $consulta);
                while($fila=mysqli_fetch_array($datos)){
            ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-2">
              <div class="card">
                <?php if($fila['Sexo'] == 'Masculino'){ ?>
                  <div title="Avatar hombre." class="cover cover-small" style="background-image: url(./img/av1.png);"></div>
                <?php } else { ?>
                  <div title="Avatar hombre." class="cover cover-small" style="background-image: url(./img/av2.png);"></div>
                <?php } ?>
                <div class="card-body">
                  <h5 class="card-title"><?php echo $fila['Nombre'] ?></h5>
                  <p class="card-text"><?php echo $fila['CURP']."<br> Contratación: ".$fila['Fecha_contratacion']."<br> Edad: ".$fila['Edad'].'<br><br>'?></p>
                  <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
              </div>
            </div>
            <?php
                }
            ?>
          </div>
        </div>
      </section>
    </body>
</html>