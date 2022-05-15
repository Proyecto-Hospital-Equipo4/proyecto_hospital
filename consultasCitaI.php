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
        if($_SESSION['rol'] != 2){
            header('Location: index.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Recepcionista | Consulta individual</title>
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
                <a class="nav-link" href="menu_recepcionista.php">Inicio</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Pacientes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="altas.php">Altas</a>
                  <a class="dropdown-item" href="consultasPaciente.php">Consultas generales</a>
                  <a class="dropdown-item nav-item active" href="consultasPacienteI.php">Consultas individuales</a>
                  <!--
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>-->
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Citas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="altasCitas.php">Altas</a>
                  <a class="dropdown-item" href="consultasCita.php">Consultas generales</a>
                  <a class="dropdown-item nav-item active" href="consultasCitaI.php">Consultas individuales</a>
                  <!--
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>-->
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contactos.php">Contactos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="php/cerrarSesion.php">Cerrar sesión</a>
              </li>
            </ul>
        </nav>
        <div class="cover d-flex justify-content-center align-items-center flex-column" style="background-image: url(./img/fondFire.jpg);">
                <h1>Consulta individual</h1>
                <p>Para una atención digna.</p>
                <!--<button type="button" class="btn btn-info"> Conoce más</button>-->
        </div>
    </header>
    <section>
        <div class="container mt-5 mb-5">
            <form action="" method="get" class="container mt-5 mb-5">
                <div class="form-row">
                    <div class="form-group col-md-10">
                        <input type="search" name="busqueda" placeholder="Busqueda de citas..." id="busqueda" class="form-control"/>
                    </div>
                    <div class="form-group col-md-2">
                        <button type="submit" name="enviar" class="btn btn-primary" value="Buscar">Buscar</button>
                    </div>
                </div>
            </form>
            <h2>Resultados de busqueda</h2>
            <br>
        </div>
    </section>
    <section>
        <div class="container mt-5 mb-5 table-responsive">
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" style="text-align: center;"><h5>Cód.Cita</h5></th>
                        <th scope="col" style="text-align: center;"><h5>Fecha</h5></th>
                        <th scope="col" style="text-align: center;"><h5>Hora</h5></th>
                        <th scope="col" style="text-align: center;"><h5>Medico</h5></th>
                        <th scope="col" style="text-align: center;"><h5>Paciente</h5></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if(isset($_GET['enviar'])){
                        $busqueda = $_GET['busqueda'];
                        $consulta = "SELECT * FROM Citas WHERE Codigo_cita LIKE '%$busqueda%'";
                        $datos = mysqli_query($conexion, $consulta);
                        while($fila=mysqli_fetch_array($datos)){
                ?>
                    <tr>
                        <th scope="row" style="text-align:center; font-family: 'Fjalla One', sans-serif; font-size: 1.1rem;"><?php echo $fila['Codigo_cita']?></th>
                        <td style="text-align:center; font-size: 1.1rem;"><?php echo $fila['fecha']?></td>
                        <td style="text-align:center; font-size: 1.1rem;"><?php echo $fila['hora']?></td>
                        <td style="text-align:center; font-size: 1.1rem;"><?php echo $fila['CURP_medico']?></td>
                        <td style="text-align:center; font-size: 1.1rem;"><?php echo $fila['CURP_paciente']?></td>
                    </tr>
                <?php
                    }
                }
                ?>
                </tbody>
            </table>
        </div>
    </section>
    </body>
</html>