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
      <title>Administrador | Altas</title>
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
                  <a class="dropdown-item nav-item active" href="altasMedicos.php">Altas</a>
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
                  <a class="dropdown-item" href="consultasRecepcionista.php">Consultas generales</a>
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
        <div class="cover d-flex justify-content-end align-items-start p-5 flex-column" style="background-image: url(./img/fondSixe.jpg);">
          <h1>Agregar medico</h1>
          <p>El mejor trabajo de la vida.</p>
          <form action="consultasMedico.php">
            <button type="submit" class="btn btn-info"> Consultas</button>
          </form>
        </div>
      </header>
      <section>
        <div class="container mt-5 mb-5">
          <!--<h2 style="text-align: center;">Agregar paciente</h2>-->
          <form class="container mt-5 mb-5" name="altaMedico" method="post" action="php/AltaMedico.php">
            <div class="form-row">
              <div class="form-group col-md-7">
                <label for="nombreMedico">Nombre del medico</label>
                <input type="text" name="nameMedico" class="form-control" id="nombreMedico" placeholder="Nombre y apellidos" required>
              </div>
              <div class="form-group col-md-5">
                <label for="CURP">CURP</label>
                <input type="text" name="curp" minlength="18" maxlength="18" class="form-control" id="CURP" placeholder="CURP" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-7">
                <label for="Address">Dirección</label>
                <input type="text" name="domicilio" class="form-control" id="Address" placeholder="Blvd. Gral. Marcelino García Barragán 1421, Olímpica, 44430 Guadalajara, Jal." required>
              </div>
              <div class="form-group col-md-5">
                <label for="telefono">Teléfono</label>
                <input type="tel" name="telefono" maxlength="15" class="form-control" id="telefono" placeholder="+52 3310220201" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-7">
                <label for="especialidad">Especialidad</label>
                <input type="text" name="especialidad" class="form-control" id="especialidad" placeholder="Nutrición" required>
              </div>
              <div class="form-group col-md-5">
                <label for="fechaContratacion">Fecha de contratación</label>
                <input type="date" name="fechaContratacion" class="form-control" id="fechaContratacion" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="seleccionado">Sexo</label>
                <select name="sexo" id="seleccionado" class="form-control" required>
                  <option value="" selected>-- Selecciona una opción --</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                </select>
              </div>
              <div class="form-group col-md-4">
                <label for="edad">Edad</label>
                <input type="number" min="18" max="120" placeholder="Ingrese su edad" name="edad" id="edad" class="form-control" required>
              </div>
              <div class="form-group col-md-4">
                <label for="password">Contraseña</label>
                <input type="password" placeholder="contraseña" name="password" class="form-control" id="password" required>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" checked>
                <label class="form-check-label" for="gridCheck">
                  Recuérdame
                </label>
              </div>
            </div>
            <div class="d-flex">
              <button type="submit" name="enviar" class="btn btn-success col-md-3 mr-2">Agregar</button>
              <button type="reset" class="btn btn-danger col-md-3">Borrar</button>
            </div>
          </form>
        </div>
      </section>
    </body>
</html>