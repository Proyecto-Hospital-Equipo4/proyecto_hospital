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
      <title>Medico | SBD</title>
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
              <li class="nav-item active">
                <a class="nav-link" href="<?php echo "menu_medico.php?username=".$username?>">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo "agendaMedica.php?username=".$username?>">Agenda</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="php/cerrarSesion.php">Cerrar sesión</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="cover d-flex justify-content-center align-items-center flex-column">
          <h1>Hospital</h1>
          <p>La mejor atención en america latina</p>
          <button type="button" class="btn btn-info"> Conoce más</button>
        </div>
      </header>
            <section>
            <div class="container mt-5 mb-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-2">
                        <div class="card">
                            <div title="Planta saliendo de la tierra." class="cover cover-small" style="background-image: url(./img/fondDoce.jpg);"></div>
                            <div class="card-body">
                                <h5 class="card-title">Médicos especialistas</h5>
                                <p class="card-text">
                                  Las personas nunca han tenido tantos médicos y otros profesionales de la salud para elegir como ahora.
                                </p>
                                <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-2">
                        <div class="card">
                            <div title="Costal con cacao dentro." class="cover cover-small" style="background-image: url(./img/fondOnce.jpg);"></div>
                            <div class="card-body">
                                <h5 class="card-title">Recepcionistas</h5>
                                <p class="card-text">
                                  La mejor bienvenida a los pacientes y otros visitantes que acudan a nuestros servicios médicos. 
                                </p>
                                <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 mt-2">
                        <div class="card">
                            <div title="administración." class="cover cover-small" style="background-image: url(./img/administrador.jpg);"></div>
                            <div class="card-body">
                                <h5 class="card-title">Administradores</h5>
                                <p class="card-text">
                                  La administración de la salud en la gestión de servicios para un buen servicio hospitalario.
                                </p>
                                <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
      </section>
      <section>
            <div class="container mt-5 mb-5 text-center">
                <h3>¡Inicia una nueva experiencia médica!</h3>
                <p>Realiza una cita médica desde tu domicilio o busca tu hospital más cercano.</p>
                <form action="#mapa">
                  <button type="submit" class="btn btn-dark">Ir al mapa</button>
                </form>
            </div>
      </section>
      <section>
        <!--TIRA DE PRODUCTOS-->
          <div class="container mt-5 mb-5">
            <div class="product-stripe">
              <div class="stripe-container">
                <!-- Content -->
                <div class="card">
                  <div title="Pediatría." class="cover cover-small" style="background-image: url(./img/pediatria.jpg);"></div>
                  <div class="card-body">
                    <h5 class="card-title">Pediatría</h5>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pediatria"> Información</button>
                    <!-- <span class="badge badge-info">$3.25USD</span> -->
                  </div>
                </div>
                <div class="card">
                  <div title="Reumatología." class="cover cover-small" style="background-image: url(./img/reuma.jpg);"></div>
                  <div class="card-body">
                    <h5 class="card-title">Reumatología</h5>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#reuma"> Información</button>
                    <!-- <span class="badge badge-info">$3.25USD</span> -->
                  </div>
                </div>
                <div class="card">
                  <div title="Cardiología." class="cover cover-small" style="background-image: url(./img/cardiologia.jpg);"></div>
                    <div class="card-body">
                      <h5 class="card-title">Cardiología</h5>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cardiologia"> Información</button>
                    </div>
                </div>
                <div class="card">
                  <div title="Nutriología." class="cover cover-small" style="background-image: url(./img/menu_dos.jpg);"></div>
                   <div class="card-body">
                    <h5 class="card-title">Nutriología</h5>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nutricion"> Información</button>
                    <!-- <span class="badge badge-info">$3.25USD</span> -->
                   </div>
                </div>
                <div class="card">
                  <div title="Gastroenterología." class="cover cover-small" style="background-image: url(./img/gastro.jpg);"></div>
                    <div class="card-body">
                      <h5 class="card-title">Gastroenterología</h5>
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#gastro"> Información</button>
                    </div>
                </div>
                <!-- End content -->
                <!-- Modal -->
                <div class="modal fade" id="pediatria" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Pediatría</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Es la especialidad médica y es la rama de la medicina que involucra la atención médica de bebés, niños y adolescentes.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Modal -->
                <!-- Modal -->
                <div class="modal fade" id="reuma" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Reumatología</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Es una especialidad médica dedicada a los trastornos médicos (no los quirúrgicos) del aparato locomotor y del tejido conectivo, que abarca un gran número de entidades clínicas conocidas en conjunto como enfermedades reumáticas, a las que se suman un gran grupo de enfermedades de afectación sistémica: las conectivopatías.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Modal -->
                <!-- Modal -->
                <div class="modal fade" id="cardiologia" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Cardiología</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Es la rama de la medicina que se encarga del estudio, diagnóstico y tratamiento de las enfermedades del corazón y del sistema circulatorio. Es médica, pero no quirúrgica; los especialistas en el abordaje quirúrgico del corazón son el cirujano cardiaco o el cirujano cardiovascular.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Modal -->
                <!-- Modal -->
                <div class="modal fade" id="nutricion" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Nutriología</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Es la maestría que estudia la alimentación humana y su relación con los procesos químicos, biológicos y metabólicos, así como su relación con la composición corporal y estado de salud humana. Existen distintos modelos de nutriología, organizadas en dos grandes grupos: nutriología convencional y nutriología alternativa, así como sus teorías y objetivos.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Modal -->
                <!-- Modal -->
                <div class="modal fade" id="gastro" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Gastroenterología</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Es la especialidad médica que se ocupa de las enfermedades del aparato digestivo y órganos asociados, conformado por: esófago, estómago, hígado y vías biliares, páncreas, intestino delgado (duodeno, yeyuno, íleon), colon y recto. El médico que practica esta especialidad se llama gastroenterólogo o especialista en aparato digestivo.
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Modal -->
              </div>
            </div>
          </div>
      </section>
      <section>
            <div class="container mt-5 mb-5 text-center" id="mapa">
                <h4>Aqui nos encontramos:</h4>
                <p>Blvd. Gral. Marcelino García Barragán 1421, Olímpica, 44430 Guadalajara, Jal.</p>
                <div class="responsive-iframe">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.29976945168!2d-103.32634970341202!3d20.65737979024884!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428b23a9bbba80d%3A0xdacdb7fd592feb90!2sCentro%20Universitario%20de%20Ciencias%20Exactas%20e%20Ingenier%C3%ADas!5e0!3m2!1ses!2smx!4v1650226302621!5m2!1ses!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </section>
    </body>
</html>