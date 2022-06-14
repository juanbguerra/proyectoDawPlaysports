<?php
//Funcion para filtrar los campos
function valorSeguro($cadena){
    $cadena = trim($cadena);
    $cadena = stripslashes($cadena);
    $cadena = htmlspecialchars($cadena);
    return $cadena;
}
?>