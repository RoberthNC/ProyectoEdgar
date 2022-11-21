<?php

function ConexionBD(){
    $db = mysqli_connect("localhost","root","Flash123","tiendarosas");

    return $db;
}

?>