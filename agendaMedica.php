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
    $username = $_GET['username'];
    include("php/datosUsuario.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
      <title>Medico | Agenda</title>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Noto+Sans:wght@300;400&display=swap" rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <script src="https://kit.fontawesome.com/fec945242f.js" crossorigin="anonymous"></script>
      <link rel="stylesheet" href="./styleMenu.css">
      <link rel="stylesheet" href="./css/styleAgenda.css">
      <link rel="icon" href="img/symbol (1).png">
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
                <a class="nav-link" href="<?php echo "menu_medico.php?username=".$username?>">Inicio</a>
              </li>
              <li class="nav-item active">
                  <a href="<?php echo "menu_agendaMedica.php?username=".$username?>" class="nav-link">Agenda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="php/cerrarSesion.php">Cerrar sesión</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="cover d-flex justify-content-center align-items-center flex-column" style="background-image: url(./img/fondFour.jpg);">
          <h1>Agenda médica</h1>
          <p>La mejor atención en america latina</p>
        </div>
      </header>
      <div id="ofset" class="container mt-5 mb-5">
      <div class="calendar">
        <div class="header">
            <div style="align-self: flex-start; flex: 0 0 1"></div>
            <div class="justify-content-center col-md-12" style="display: flex; align-items: center">
              <h2 style="flex: 1; text-align:center;">Proximas citas</h2>
            </div> 
            <div style="align-self: flex-start; flex: 0 0 1"></div>
        </div>
        <div class="outer">
          <table>
            <thead>
              <tr>
                <th class="headcol"></th>
                <th><h4>Lunes</h4></th>
                <th><h4>Martes</h4></th>
                <th><h4>Miercoles</h4></th>
                <th><h4>Jueves</h4></th>
                <th><h4>Viernes</h4></th>
              </tr>
            </thead>
          </table>
          <div class="wrap">
            <table class="offset">
              <tbody>
                <?php
                  #Función para buscar las citas dentro de la tabla
                  function search($h, $m, $curpMedico){
                    $con = mysqli_connect("localhost", "root", "", "usuario");
                    $con->set_charset("utf8");
                    ?> <td class="headcol"><?php echo $h ?>:<?php if($m==0){echo 0;} echo $m ?></td> <?php
                    for ($d = 0; $d <= 4; $d++){
                      $query = "SELECT * FROM Citas WHERE WEEK(fecha)=WEEK(CURDATE()) AND WEEKDAY(fecha)='$d' AND HOUR(hora)='$h' AND MINUTE(hora)='$m' AND CURP_medico='$curpMedico'"; 
                      $query_run = mysqli_query($con, $query); 
                      if(mysqli_num_rows($query_run) > 0){ foreach($query_run as $items){ 
                        ?>
                        <td onclick="window.location='<?php echo "expediente.php?username=".$items['CURP_paciente']."&medico=".$items['CURP_medico']."&numcita=".$items['Codigo_cita'] ?>'">
                          <?php 
                          $Cpac = $items['CURP_paciente'];
                          $query2 = "SELECT Nombre FROM paciente WHERE CURP LIKE '$Cpac'"; 
                          $query_run2 = mysqli_query($con, $query2); foreach($query_run2 as $items2){echo $items2['Nombre'];}
                          ?>
                        </td>
                        <?php
                       } }else{ ?> <td> </td><?php }}}?>
                <tr>
                  <td class="headcol"></td>
                  <td></td><td></td><td></td><td></td><td></td>
                </tr>
                <?php for($i = 9; $i <= 18; $i++){
                    ?> <tr> <?php search($i, 0, $username);?> </tr>
                       <tr> <?php search($i, 20, $username);?> </tr>
                       <tr> <?php if($i != 18){search($i, 40, $username);}?> </tr>
                  <?php }?>
              </tbody>
            </table>
        </div>
        </div>
      </div>
    </div>
    <!-- Boton para imprimir agenda -->
    <div class="container mt-5 mb-5 justify-content-center">
      <button type="button" class="btn btn-info col-md-3" id="btPrint" onclick="createPDF()">Imprimir</button>
    </div>
    <!-- Imprimir agenda médica -->
    <script>
        function createPDF() {
        var sTable = document.getElementById('ofset').innerHTML;
        var style = "<style>";
        style = style + "tbody tr td {position: relative;vertical-align: top;height: 25px;padding: 0.25rem 0.25rem 0 0.25rem;width: auto;}";
        style = style + "tr td {padding: 0;white-space: none;word-wrap: nowrap;}";
        style = style + "thead th {font-size: 1rem;font-weight: bold;color: rgba(0, 0, 0, 0.9);padding: 1rem;}";
        style = style + "thead {z-index: 2;background: white;}";
        style = style + "tr, tr td {height: 20px; border:0.2px solid #eee;}";
        style = style + "td {text-align: center;}";
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
