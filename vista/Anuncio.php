<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
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
    <title>Anuncio</title>
</head>
<body>
    <?php
    $_SESSION['ctrler'] = false;
    require_once("header2.php");
    ?>
<section id="sectionPrincipal" class="pt-4 pb-4"> 
    <div class="container">
        <h2 class="pt-4 pb-3 text-info letraUltimaPlaza fw-bold">Reserva tu plaza ya!</h2>
        <div class="row row-cols-3 row-cols-lg-4 row-cols-md-2 g-4 divAnuncio divAnuncio2 d-flex justify-content-center align-items-center">
            <div class="col div-fotoAnuncio3" style="width: 20vw;"><img src="<?php echo '../img/'.$anuncio->getDeporte().'.jpg';?>" class="fotoAnuncio3" alt="<?php echo $anuncio->getDeporte();?>"></div>
            <div class="col divCentral" style="width: 35vw;">
                <h5 class="card-title text-center"><strong><?php echo strtoupper($anuncio->getDeporte());?></strong></h5>
                <p class="pt-2 text-center"><strong>Fecha:</strong> <?php echo $anuncio->getFecha();?></p>
                <p class="text-center"><strong>Munipio:</strong> <?php echo $anuncio->getMunicipio();?></p>
                <p class=" text-center"><strong>Centro Deportivo:</strong> <?php echo $anuncio->getClub();?></p>
                <p class=" text-center"><strong>Pista:</strong> <?php echo $anuncio->getPista();?></p>
                <p class="text-center"><strong>Descripción:</strong><br> <?php echo $anuncio->getDescripcion();?></p>
                <p class="text-center"><strong>Plazas disponibles:</strong> <?php echo $anuncio->getJugadoresNecesitados();?></p>
                <p class="text-center"><strong>Precio:</strong> <?php echo bcdiv($anuncio->getPrecioPorJugador(), '1', 2);?> €/persona</p>            
                <p class="text-center"><strong>Jugadores Inscritos:</strong></p>
                <p class="text-center">
                <?php
                foreach($usuarios as $usuario){
                    echo  '<spam class="text-center"><a class="btn btn-outline-dark me-2 mb-2" href="perfilUsuario_controller.php?idUsuario='.$usuario["idUsuario"].'">'.strtoupper($usuario["usuario"]).'</a></spam>' ;
                }
                ?>
                </p>
            </div>
            <div class="col" style="width: 10vw;">
                <form action="reservarPlaza_controller.php" class="text-center" method="post">
                    <div class="d-flex justify-content-center align-items-center">
                        <input type='hidden' name='idAnuncio' value='<?php echo $anuncio->getIdAnuncio();?>'>
                        <button type="submit" class="btn btn-outline-success fw-bold mb-2" style = "min-width:90px">Reservar</button>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                    <a class="btn btn-outline-danger fw-bold mb-2" style = "min-width:90px" href="../index.php"> Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>     
</section>
    <!-- Bloque Footer  el cual se hace responsi dividido en columnas por clases-->
    <?php
        require_once("footer.php");
    ?>
    <!--<script src="js/script.js" type="text/javascript"></script>-->
</body>
</html>