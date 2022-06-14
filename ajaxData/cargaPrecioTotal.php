<?php 
    include("../db/db.php");
    $idPista = $_POST['pistas'];
    if(isset($idPista)&& !empty($idPista)){
        $db = new Conectar();
        $listaPistas=$db->listarPistaById($idPista);
        if(sizeof($listaPistas) > 0){
            foreach($listaPistas as $pista)
            {
                echo '<option value="'.$pista["precio"].'">'.$pista["precio"].' €</option>';
            }
        }else{
            echo '<option value="">Precio no disponibles</option>';
        } 
    }
?>