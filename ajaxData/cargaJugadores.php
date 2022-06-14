<?php
    include("../db/db.php");
    $idDeporte = $_POST['deporte'];
    if(isset($idDeporte)&& !empty($idDeporte)){
        $db = new Conectar();
        $listaDeporte=$db->listarDeportesById($idDeporte);
        if(sizeof($listaDeporte) > 0){
            foreach($listaDeporte as $deporte)
            {
                echo '<option value="'.$deporte["jugadores"].'">'.$deporte["jugadores"].'</option>';
            }
        }else{
            echo '<option value="">Jugadores no disponibles</option>';
        }
    }
?>