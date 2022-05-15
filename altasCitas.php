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
      <title>Recepcionista | Altas</title>
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
              <li>
                <a class="nav-link" href="menu_recepcionista.php">Inicio</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Pacientes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="altas.php">Altas</a>
                  <a class="dropdown-item" href="consultasPaciente.php">Consultas generales</a>
                  <a class="dropdown-item" href="consultasPacienteI.php">Consultas individuales</a>
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
                  <a class="dropdown-item nav-item active" href="altasCitas.php">Altas</a>
                  <a class="dropdown-item" href="consultasCita.php">Consultas generales</a>
                  <a class="dropdown-item" href="consultasCitaI.php">Consultas individuales</a>
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
          </div>
        </nav>
        <div class="cover d-flex justify-content-end align-items-start p-5 flex-column" style="background-image: url(./img/fondDoce.jpg);">
          <h1>Agregar citas</h1>
          <p>La mejor atención medica</p>
          <form action="consultasCita.php">
            <button type="submit" class="btn btn-info"> Consultas</button>
          </form>
        </div>
      </header>
      <section>
        <div class="container mt-5 mb-5">
          <!--<h2 style="text-align: center;">Agregar paciente</h2>-->
          <form class="container mt-5 mb-5" name="altaCita" method="post" action="php/AltaCita.php">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="CURPPACIENTE">Nombre del paciente</label>
                    <select name="CURPPACIENTE" id="CURPPACIENTE" class="form-control" required>
                        <option value="" selected>-- Selecciona una opción --</option>
                        <?php
                            $consulta = "SELECT * FROM Paciente ORDER BY Nombre";
                            $datos = mysqli_query($conexion, $consulta);
                            while($fila=mysqli_fetch_array($datos)){
                              $CURPPACIENTE = $fila['CURP'];
                              $NombrePaciente = $fila['Nombre'];
                        ?>
                        <option value="<?php echo $CURPPACIENTE; ?>"><?php echo $NombrePaciente; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="CURPMEDICO">Nombre y especialidad del médico</label>
                  <select name="CURPMEDICO" id="CURPMEDICO" class="form-control" required>
                  <option value="" selected>-- Selecciona una opción --</option>
                        <?php
                            $consulta = "SELECT * FROM Medico ORDER BY Nombre";
                            $datos = mysqli_query($conexion, $consulta);
                            while($fila=mysqli_fetch_array($datos)){
                              $CURP = $fila['CURP'];
                              $Nombre = $fila['Nombre'];
                              $Especialidad = $fila['Especialidad'];
                        ?>
                        <option value="<?php echo $CURP; ?>"><?php echo $Nombre.' - '.$Especialidad; ?></option>
                        <?php
                            }
                        ?>
                  </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="fechaAtencion">Fecha</label>
                    <input type="date" name="fechaAtencion" id="fechaAtencion" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="horaAtencion">Hora</label>
                    <input type="time" name="horaAtencion" list="timeLimit" id="horaAtencion" class="form-control" required>
                    <datalist id="timeLimit">
                      <option>09:00</option><option>09:20</option><option>09:40</option>
                      <option>10:00</option><option>10:20</option><option>10:40</option>
                      <option>11:00</option><option>11:20</option><option>11:40</option>
                      <option>12:00</option><option>12:20</option><option>12:40</option>
                      <option>13:00</option><option>13:20</option><option>13:40</option>
                      <option>14:00</option><option>14:20</option><option>14:40</option>
                      <option>15:00</option><option>15:20</option><option>15:40</option>
                      <option>16:00</option><option>16:20</option><option>16:40</option>
                      <option>17:00</option><option>17:20</option><option>17:40</option>
                      <option>18:00</option><option>18:20</option>
                    </datalist>
                </div>
            </div>
            <div class="d-flex">
              <button type="submit" name="enviar" class="btn btn-success col-md-3 mr-2">Agregar</button>
              <button type="reset" class="btn btn-danger col-md-3">Borrar</button>
            </div>
          </form>
        </div>
      </body>
</html>