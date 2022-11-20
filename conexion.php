<?php

function ConexionBD(){
    $db = mysqli_connect("localhost","root","","tiendarosas");

    return $db;
}

?>