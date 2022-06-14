<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Gestión de Reservas</title>
</head>
<body>
       <?php
            $_SESSION['ctrler'] = false;
            require_once("header2.php");
        ?>
    <section id="sectionPrincipal2"> 
        <div class="bg-light bg-opacity-50 pb-4">
            
            <div class="container">
                <h1 class="fw-bold text-center pt-4 pb-2">Mis Reservas</h1>
                <div class="row row-cols-1 row-cols-lg-4 row-cols-md-2 g-4">
                    <?php 
                    foreach($anuncios as $anuncio)
                    {
                    ?>
                    <div class="col">
                        <div class="card border-success p-2">
                            <img src="<?php echo '../img/'.$anuncio->getDeporte().'.jpg';?>" class="card-img-top fotoAnuncio2" alt="<?php echo $anuncio->getDeporte();?>">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo strtoupper($anuncio->getDeporte());?></h5>
                                <p class="pt-2 text-center"><strong>Fecha:</strong> <?php echo $anuncio->getFecha();?></p>
                                <p class=" text-center"><strong>Municipio:</strong> <?php echo $anuncio->getMunicipio();?></p>
                                <p class=" text-center"><strong>Centro Deportivo:</strong> <?php echo $anuncio->getClub();?></p>
                                <p class="text-center"><strong>Descripcion:</strong><br> <?php echo $anuncio->getDescripcion();?></p>
                                <p class="text-center"><strong>Jugadores Necesitados:</strong> <?php echo $anuncio->getJugadoresNecesitados();?></p>
                                <p class="text-center"><strong>Precio:</strong> <?php echo bcdiv($anuncio->getPrecioPorJugador(), '1', 2)?> €/persona</p>
                                <div class="d-flex justify-content-around">
                                    <form action="anuncio_controller.php" method="post">
                                        <input type='hidden' name='idAnuncio' value='<?php echo $anuncio->getIdAnuncio();?>'>
                                        <button type="submit" class="btn btn-outline-success me-3"><i class="bi bi-file-earmark-check-fill" aria-hidden="true"></i> Ver</button>
                                    </form>
                                    <form action="eliminarReserva_controller.php" method="post">
                                         <input type='hidden' name='idAnuncio' value='<?php echo $anuncio->getIdAnuncio();?>'>
                                        <button type="submit" class="btn btn-outline-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancelar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                    }
                    ?>
                </div>  
                <div class="col-md-12 d-flex justify-content-center mt-4">
                    <a class="btn btn-danger fw-bold" href="../index.php"> Volver</a>
                </div>
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