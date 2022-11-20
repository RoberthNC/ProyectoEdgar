<?php
ob_start();

require "./conexion.php";
require "./funciones.php";

$conn = ConexionBD();

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $contra = $_POST["contra"];
    $query2 = "INSERT INTO Administrador(nombre,apellidos,correo,contra) VALUES('$nombre','$apellidos','$correo','$contra')";
    $result = mysqli_query($conn,$query2);
}

?>

<div>
    <div class="contenedor-volver">
        <a href="./usuarios.php">< Volver</a>
    </div>
    <div>
        <form action="" method="POST" class="formulario">
            <div class="agregar-producto">
                <div class="formulario_campos">
                    <label>Nombre: </label>
                    <input type="text" name="nombre">
                </div>
                <div class="formulario_campos">
                    <label>Apellidos: </label>
                    <input type="text" name="apellidos">
                </div>
                <div class="formulario_campos">
                    <label>Correo: </label>
                    <input type="text" name="correo">
                </div>
                <div class="formulario_campos">
                    <label>Contraseña: </label>
                    <input type="password" name="contra">
                </div>
            </div>
            <div class="formulario_boton">
                <input type="submit" value="Agregar usuario">
            </div>
        </form>
    </div>
</div>

<?php
$contenido = ob_get_clean();
require "./includes/layout_principal.php";
?>