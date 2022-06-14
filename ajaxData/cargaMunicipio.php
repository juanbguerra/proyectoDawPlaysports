<?php 
    include("../db/db.php");  
    $idClubDeportivo = $_POST['clubDeportivo']; 
    if(isset($idClubDeportivo)&& !empty($idClubDeportivo)){
        $db = new Conectar();
        $listaMunicipio=$db->buscarMunicipioByIdClubDeportivo($idClubDeportivo);
        if(sizeof($listaMunicipio) > 0){
            foreach($listaMunicipio as $municipio)
            {
                echo '<option value="'.$municipio["idMunicipio"].'">'.$municipio["nombre"].'</option>';
            }
        }else{
            echo '<option value="">Municipio no disponibles</option>';
        } 
    }
?>