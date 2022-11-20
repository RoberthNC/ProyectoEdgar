<?php
ob_start();

require "./conexion.php";
require "./funciones.php";

$conn = ConexionBD();

$id = $_GET["id"];
$admin = mysqli_query($conn,"SELECT * FROM Administrador WHERE id_admin=${id}");
$admin = mysqli_fetch_assoc($admin);

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["correo"];
    $contra = $_POST["contra"];
    //Actualizar
    //(id_cat,nom_prod,cantidad,precio,fecha_vencimiento) VALUES('$id_cat','$nom_prod','$cantidad','$precio','$fecha_vencimiento')
    $query2 = "UPDATE Administrador SET nombre='$nombre',apellidos='$apellidos',correo='$correo',contra='$contra' WHERE id_admin=${id}";
    $result = mysqli_query($conn,$query2);
    header("Location: ./usuarios.php");
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
                    <input type="text" name="nombre" value="<?php echo $admin["nombre"]?>">
                </div>
                <div class="formulario_campos">
                    <label>Apellidos: </label>
                    <input type="text" name="apellidos" value="<?php echo $admin["apellidos"]?>">
                </div>
                <div class="formulario_campos">
                    <label>Correo: </label>
                    <input type="text" name="correo" value="<?php echo $admin["correo"]?>">
                </div>
                <div class="formulario_campos">
                    <label>Contraseña: </label>
                    <input type="password" name="contra" value="<?php echo $admin["contra"]?>">
                </div>
            </div>
            <div class="formulario_boton">
                <input type="submit" value="Actualizar usuario">
            </div>
        </form>
    </div>
</div>

<?php
$contenido = ob_get_clean();
require "./includes/layout_principal.php";
?>