<?php

require "conexion.php";
require "funciones.php";

if($_SERVER["REQUEST_METHOD"]==="POST"){
    //Incorrecto
    if($_POST["usuario"]!=="" && $_POST["contra"]!==""){
        $conn = ConexionBD();
        $usuario = $_POST["usuario"];
        $contra = $_POST["contra"];
        $query = "SELECT * FROM Administrador WHERE correo='${usuario}' AND contra='${contra}'";
        $resultado = mysqli_query($conn,$query);
        if($resultado->num_rows!==0){
            $resultado = mysqli_fetch_assoc($resultado);
            $id = $resultado["id_admin"];
            session_start();

            $_SESSION["admin_id"] = $id;
            
            header("Location: ./principal.php");
        }
    }
    else{

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interfaz Principal</title>
    <link rel="stylesheet" href="./build/css/app.css">
</head>
<body>
    <div class="contenedor_sesion contenedor">
        <div class="contenedor_sesion__titulo">
            <h1>TIENDA ROSAS</h1>
        </div>
        <div class="contenedor_sesion__formulario">
            <form action="" class="formulario" method="POST">
                <div class="formulario_campos">
                    <label for="">Usuario</label>
                    <input type="text" placeholder="Ingrese usuario" name="usuario">
                </div>
                <div class="formulario_campos">
                    <label for="">Contraseña</label>
                    <input type="password" placeholder="Ingrese contraseña" name="contra">
                </div>
                <div class="formulario_boton">
                    <input type="submit" value="INICIAR SESIÓN">
                </div>
            </form>
        </div>
    </div>
</body>
</html>