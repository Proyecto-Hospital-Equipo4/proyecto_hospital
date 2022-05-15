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
        if($_SESSION['rol'] != 3){
            header('Location: index.php');
        }
    }
    $username = $_GET['username'];//CURP del paciente
    $medico = $_GET['medico'];//CURP del médico
    $numeroCita = $_GET['numcita'];//Código de cita
    $consultaId = "SELECT *
                   FROM Expediente
                   WHERE CURP= '$username'";
    $consultaId = mysqli_query($conexion, $consultaId);
    $consultaId = mysqli_fetch_array($consultaId);
    if(!$consultaId){
        $consultaT = "SELECT *
                      FROM Paciente
                      WHERE CURP= '$username'";
        $consultaT = mysqli_query($conexion, $consultaT);
        $consultaT = mysqli_fetch_array($consultaT);
        $nombrePaciente = $consultaT['Nombre'];
        $curpP = $consultaT['CURP'];
        $domicilioPaciente = $consultaT['Domicilio'];
        $sexo = $consultaT['Sexo'];
        $edad = $consultaT['Edad'];
        $telefonoContacto = $consultaT['Telefono_contacto'];

        $sqltwo = "INSERT INTO Expediente VALUES ('$nombrePaciente', '$curpP', '$domicilioPaciente', '$telefonoContacto', '$sexo', '$edad', NULL)";
        mysqli_query($conexion, $sqltwo);
    }
    else{
        $nombrePaciente = $consultaId['Nombre_paciente'];
        $curpP = $consultaId['CURP'];
        $domicilioPaciente = $consultaId['Domicilio_paciente'];
        $telefonoContacto = $consultaId['Telefono_contacto'];
        $sexo = $consultaId['Sexo'];
        $edad = $consultaId['Edad'];
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Medico | SBD</title>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Noto+Sans:wght@300;400&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://kit.fontawesome.com/fec945242f.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="./styleMenu.css">
      <link rel="stylesheet" href="./css/styleAgenda.css">
      <link rel="icon" href="img/symbol (1).png ">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
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
                <a class="nav-link" href="<?php echo "menu_medico.php?username=".$medico?>">Inicio</a>
              </li>
              <li class="nav-item active">
                  <a href="<?php echo "agendaMedica.php?username=".$medico?>" class="nav-link">Agenda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="php/cerrarSesion.php">Cerrar sesión</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="cover d-flex justify-content-end align-items-start p-5 flex-column" style="background-image: url(./img/agregarPacienteTwo.jpg);">
            <h1>Expediente médico</h1>
            <p>La mejor atención a la comunidad..</p>
            <!--<button type="button" class="btn btn-info"> Conoce más</button>-->
        </div>
      </header>
        <section>
            <div class="container mt-5 mb-5">
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-12">
                        <h2 style="text-align: center;">Expediente médico</h2>
                        <p style="text-align:center; font-size: 1.1rem;">A continuación se nos muestra el expediente médico del paciente que contiene su historia de diagnosticos.</p>
                    </div>
                </div>
                <!-- Expediente -->
                <div class="form-row justify-content-center">
                    <div class="form-group col-md-12">
                        <br>
                        <h3 style="text-align: center;"><?php echo $nombrePaciente; ?></h3>
                        <h4 style="text-align: center; color: teal;"><?php echo $curpP; ?></h4><br>
                        <p style="text-align:center; font-size: 1.1rem;">
                        <?php echo 'Dirección: '.$domicilioPaciente.'<br>Telefono: '.$telefonoContacto.'<br>Sexo: '.$sexo.' Edad: '.$edad; ?></p>
                        <!-- Botones -->
                        <div class="d-flex justify-content-center">
                          <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModalScrollable">
                            Diagnóstico
                          </button>
                        </div>
                        <br>
                        <!-- Modal -->
                        <div class="modal fade" style="color: black;" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableLabel">Diagnóstico</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <div class="modal-body">
                                    <form name="diagnostico" method="post" action="<?php echo "php/AgregarDiagnostico.php?username=".$username."&medico=".$medico."&numeroCita=".$numeroCita?>">
                                        <div class="form-group row">
                                            <label for="fecha" class="col-sm-3 col-form-label">Fecha: </label>
                                            <div class="col-sm-9">
                                                <input type="date" name="fechaDiagnostico" class="form-control" id="fecha" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tiempo" class="col-sm-3 col-form-label">Hora: </label>
                                            <div class="col-sm-9">
                                                <input type="time" name="horaDiagnostico" class="form-control" id="tiempo" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="padecimiento" class="col-sm-3 col-form-label">Observación: </label>
                                            <div class="col-sm-9">
                                                <input type="text" name="observacion" maxlength="255" class="form-control" id="padecimiento" placeholder="Especificación" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="reset" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                                            <button type="submit" class="btn btn-primary">Agregar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Tabla de diagnósticos -->
    <section>
        <div id="ofset" class="container mt-5 mb-5 table-responsive">
        <table class="table table-hover">
            <caption>Lista de diagnosticos</caption>
            <!-- cabecera de la tabla -->
            <thead class="thead-dark">
                <tr>
                    <th scope="col"><h5>Fecha</h5></th>
                    <th scope="col"><h5>Hora</h5></th>
                    <th scope="col"><h5>Medico</h5></th>
                    <th scope="col"><h5>Observación</h5></th>
                </tr>
            </thead>
            <!-- Cuerpo de la tabla -->
            <tbody>
                <?php 
                    $numExpediente = $consultaId['Num_expediente'];
                    $cons = "SELECT * FROM Diagnosticos WHERE Num_expediente='$numExpediente'";
                    $datos = mysqli_query($conexion, $cons);
                    while($fila=mysqli_fetch_array($datos)){
                ?>
                <tr>
                    <th scope="row" style="text-align:center; font-family: 'Fjalla One', sans-serif; font-size: 1.1rem;"><?php echo $fila['Fecha_observacion']?></th>
                    <td style="text-align:center; font-size: 1.1rem;"><?php echo $fila['Hora']?></td>
                    <td style="text-align:center; font-size: 1.1rem;"><?php echo $fila['Nombre_medico']?></td>
                    <td style="text-align:center; font-size: 1.1rem;"><?php echo $fila['Observacion']?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
        </div>
    </section>
    <!-- Regresar a agenda -->
    <section>
      <div class="container mt-5 mb-5">
        <div class="d-flex">
          <button onclick="history.back()" class="btn btn-dark col-md-3 mr-2" value="Volver">
            Regresar a agenda
          </button>
          <!-- Boton para imprimir agenda -->
          <button type="button" class="btn btn-info col-md-3" id="btPrint" onclick="createPDF()">
            Imprimir
          </button>
        </div>
      </div>
    </section>
    <!-- Imprimir agenda médica -->
    <script>
        function createPDF() {
        var sTable = document.getElementById('ofset').innerHTML;
        var style = "<style>";
        style = style + "caption {font-family: 'Fjalla One', sans-serif; font-size: 1rem;}";
        style = style + "tbody tr td, tbody tr th {position: relative;vertical-align: top;height: 25px;padding: 0.25rem 0.25rem 0 0.25rem;width: auto;}";
        style = style + "tr td, tr th {padding: 0;white-space: none;word-wrap: nowrap;}";
        style = style + "thead tr th h5{font-family: 'Fjalla One', sans-serif; font-size: 1rem;font-weight: bold;color: rgba(0, 0, 0, 0.9);padding: 1rem;}";
        style = style + "thead {z-index: 2;background: white;}";
        style = style + "tr, tr td, tr th {height: 20px; border:0.2px solid #eee;}";
        style = style + "td, th {text-align: center;}";
        style = style + "tbody {position: relative;top: 0px;}";
        style = style + "table {background: #fff;width: 100%;height: 100%;table-layout: fixed;margin-bottom: 10px;}";
        style = style + "thead {box-shadow: 0px 2px 3px rgba(0, 0, 0, 0.2);}";
        style = style + "</style>";
        var win = window.open('', '', 'height=600,width=700');
        win.document.write('<html><head>');
        win.document.write('<title>Profile</title>');
        win.document.write(style);       
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);
        win.document.write('</body></html>');
        win.document.close();
        win.print();
    }
    </script>
    </body>
</html>
