<?php  
    include("../db/db.php");
    include("../modelo/Anuncio_model.php");
    $idDeporte = $_POST['deporte'];
    $plazas = $_POST['plazas'];
    if(isset($idDeporte)&& !empty($idDeporte) && isset($plazas)&& !empty($plazas)){
        $db = new Conectar();
        $listaAnuncios=$db->listar_anunciosByIdDeporte($idDeporte,$plazas);
        if(sizeof($listaAnuncios) > 0){
            foreach($listaAnuncios as $anuncio)
            {
                echo'<div class="col">
                    <div class="card border-success p-2">
                        <img src="../img/'.$anuncio->getDeporte().'.jpg" class="card-img-top fotoAnuncio2" alt="'.$anuncio->getDeporte().'">
                        <div class="card-body">
                            <h5 class="card-title text-center"><strong>'.strtoupper($anuncio->getDeporte()).'</strong></h5>
                            <p class="pt-3 text-center"><strong>Fecha: </strong>'.$anuncio->getFecha().'</p>
                            <p class="text-center"><strong>Municipio: </strong>'.$anuncio->getMunicipio().'</p>
                            <p class="text-center"><strong>Club Deportivo:<br> </strong>'.$anuncio->getClub().'</p>
                            <p class="text-center"><strong>Descripción: </strong><br>'.$anuncio->getDescripcion().'</p>
                            <p class="text-center"><strong>Plazas disponibles: </strong>'.$anuncio->getJugadoresNecesitados().'</p>
                            <p class="text-center"><strong>Precio: </strong>'.bcdiv($anuncio->getPrecioPorJugador(), '1', 2).' €/persona</p>
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-outline-success" href="../controlador/anuncio_controller.php?idAnuncio='.$anuncio->getIdAnuncio().'">RESERVAR</a>
                            </div>
                        </div>
                    </div>
                </div>';
            }
        }else{
            echo'<div class="col">
                    <div class="card border-success p-2">
                        <div class="card-body">
                            <h5 class="card-title text-center">Anuncios no disponibles</h5>
                        </div>
                    </div>
                </div>';
        }
    }
?>