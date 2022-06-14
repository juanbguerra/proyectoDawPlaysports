<?php  
    include("../db/db.php");
    $idDeporte = $_POST['deporte'];
    if(isset($idDeporte)&& !empty($idDeporte)){
        $db = new Conectar();
        $listaDeporte=$db->listarDeportesById($idDeporte);
        if(sizeof($listaDeporte) > 0){
            foreach($listaDeporte as $deporte)
            {
                for($i = 1; $i <= $deporte["jugadores"]; $i++){
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }  
            }
        }else{
            echo '<option value="">Plazas no disponibles</option>';
        }
    }
?>