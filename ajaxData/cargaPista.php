<?php 
    include("../db/db.php");
    $idDeporte = $_POST['deporte'];
    
    if(isset($idDeporte)&& !empty($idDeporte)){
        $db = new Conectar();
        $listaPistas=$db->listarPistaByDeporte($idDeporte);
        if(sizeof($listaPistas) > 0){
            foreach($listaPistas as $pista)
            {
                echo '<option value="'.$pista["idClubDeporte"].'">'.$pista["nombrePista"].'</option>';
            }
        }else{
            echo '<option value="">Pistas no disponibles</option>';
        }  
    }
?>