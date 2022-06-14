<?php 
    include("../db/db.php");
    $precio = $_POST['precio'];
    $jugadoresTotales = $_POST['jugadoresTotales'];
    if(isset($precio)&& !empty($precio) && isset($jugadoresTotales)&& !empty($jugadoresTotales)){
        $precioFinal = ($precio / $jugadoresTotales) + 1;
        echo '<option value="'.$precioFinal.'">'.$precioFinal.' €</option>';
            
    }else{
        echo '<option value="">Precio no disponibles</option>';
    }
?>