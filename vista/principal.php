<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Reserva tu pista de padel, tenis o futbol</title>
</head>
<body>
    <?php
        $_SESSION['ctrler'] = true;
        require_once("header2.php");
    ?>
<!--Ventana Modal para el registro y el iniciar sesion-->
   <div class="modal fade" id="modalLogin">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content colorModal">
                <!--Body de la ventana modal-->
                <div class="modal-body">
                    <h5 class="text-center pb-2">¿Tienes una cuenta?</h5>
                    <p class="text-center fw-bold">Logéate</p>
                    <form method="post">
                        <div class="form-group mb-2">
                            <label for="usuario"><strong>Usuario</strong></label>
                            <input type="usuario" class="form-control" id="usuario" name="usuario" placeholder="Escribe tu nombre de usuario...">
                        </div>
                        <div class="form-group mb-4">
                            <label for="inputPassword"><strong>Contraseña</strong></label>
                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Escribe tu contraseña...">
                        </div>
                        <button type="submit" class="btn  btn-success col-12">Inicio sesion</button>
                    </form>
                </div>
                <!--Footer de la ventana modal  te lleva a otar pestaña para poder registrarte-->
                <div class="modal-footer">
                    <h5 class="m-auto">¿No tienes una cuenta?</h5>
                    <form action="controlador/registro_controller.php" class="col-12">
                            <button type="submit" class="btn btn-primary col-12 mt-3">Registrate</button>
                    </form>
                </div>
            </div>
        </div>
   </div>
 
   <!--Carrusel-->
   <section>
    <!--Div primero con eslogan-->
        <div id="article1" class="d-flex justify-content-center align-items-center p-xl-5 p-md-3">
            <div id="eslogan">
                <h1 class="display-5 letraCursiva text-center fw-bold">Tu elijes el deporte y el lugar, nosotros buscamos con quien</h1>
            </div>
        </div>
         <!--Carrusel que va cambiando fotos automaticamente ademas de poder darle al boton para pasarlas-->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
               
                    <div class="carousel-item active">
                        <img src="img/padel.jpg" class="d-block fotoCarusel" alt="padel">
                    </div>
                    <div class="carousel-item">
                        <img src="img/baloncesto2.jpg" class="d-block fotoCarusel" alt="baloncesto">
                    </div>
                    <div class="carousel-item">
                        <img src="img/futbolSala2.jpg" class="d-block fotoCarusel" alt="futbolSala">
                        <div class="carousel-caption d-none d-md-block"></div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/pelotas-padel.jpg" class="d-block fotoCarusel" alt="padelPelota">
                        <div class="carousel-caption d-none d-md-block"></div>
                    </div>
                    <div class="carousel-item">
                        <img src="img/baloncesto3.jpg" class="d-block fotoCarusel" alt="baloncesto2">
                        <div class="carousel-caption d-none d-md-block"></div>
                    </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon botonesCarrusel" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon botonesCarrusel" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>
<!--Seccion para  hacer la clase cards donde mostramos los anuncios-->
<section id="sectionPrincipal" class="pt-4 pb-4"> 
    <div class="container">
        <h2 class="pt-4 pb-3 text-info letraUltimaPlaza fw-bold">Plazas más recientes...</h2>
        <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4">
            <?php 
            foreach($anuncios as $anuncio)
            {
            ?>
             <div class="col">
                <div class="card border-success p-2">
                    <img src="<?php echo 'img/'.$anuncio->getDeporte().'.jpg';?>" class="card-img-top fotoAnuncio2" alt="<?php echo $anuncio->getDeporte();?>">
                    <div class="card-body">
                        <h5 class="card-title text-center"><?php echo strtoupper($anuncio->getDeporte());?></h5>
                        <p class="pt-2 text-center"><strong>Fecha:</strong> <?php echo $anuncio->getFecha();?></p>
                        <p class=" text-center"><strong>Munipio:</strong> <?php echo $anuncio->getMunicipio();?></p>
                        <p class=" text-center"><strong>Centro Deportivo:</strong> <?php echo $anuncio->getClub();?></p>
                        <p class=" text-center"><strong>Pista:</strong> <?php echo $anuncio->getPista();?></p>                    
                        <p class="text-center"><strong>Descripción:</strong><br> <?php echo $anuncio->getDescripcion();?></p>
                        <p class="text-center"><strong>Plazas disponibles:</strong> <?php echo $anuncio->getJugadoresNecesitados();?></p>
                        <p class="text-center"><strong>Precio:</strong> <?php echo bcdiv($anuncio->getPrecioPorJugador(), '1', 2);?> €/persona</p>
                        <div class="d-flex justify-content-around">
                        <?php
                                if(isset($_SESSION["usuario"])){
                                ?> 
                                    <form action="controlador/anuncio_controller.php" class="col-12 text-center" method="post">
                                        <input type='hidden' name='idAnuncio' value='<?php echo $anuncio->getIdAnuncio();?>'>
                                        <button type="submit" class="btn btn-outline-success">Reservar</button>
                                    </form>
                                <?php
                                }else{
                                ?>
                                    <form action="controlador/registrateUsuario_controller.php" class="col-12 text-center" method="post">
                                        <input type='hidden' name='idAnuncio' value='<?php echo $anuncio->getIdAnuncio();?>'>
                                        <button type="submit" class="btn btn-outline-success">Reservar</button>
                                    </form>
                                <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            }
            ?>
        </div>    
    </div>  
</section>
    <!-- Bloque Footer  el cual se hace responsi dividido en columnas por clases-->
    <?php
    require_once("footer.php");
    ?>
    <script src="js/script.js" type="text/javascript"></script>
</body>
</html>