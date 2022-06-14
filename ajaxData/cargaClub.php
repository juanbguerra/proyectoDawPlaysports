<?php
    include("../db/db.php");
    $idPista = $_POST['pistas'];
    if(isset($idPista)&& !empty($idPista)){
        $db = new Conectar();
        $listaClub=$db->buscarClubByIdPista($idPista);
        if(sizeof($listaClub) > 0){
            foreach($listaClub as $club)
            {
                echo '<option value="'.$club["idClubDeportivo"].'">'.$club["nombre"].'</option>';
            }
        }else{
            echo '<option value="">Club no disponibles</option>';
        }  
    }
?>