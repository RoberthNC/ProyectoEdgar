<?php
function debugear($datos){
    echo "<pre>";
    var_dump($datos);
    echo "</pre>";

    exit;
}
function paginaActual($url){
    if(str_contains($_SERVER["REQUEST_URI"],$url)){
        return true;
    }   
    return false;
}
?>