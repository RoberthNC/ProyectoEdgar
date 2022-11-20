<?php
ob_start();

require "./conexion.php";
require "./funciones.php";

$conn = ConexionBD();

$id = $_GET["id"];
$venta = mysqli_query($conn,"SELECT producto.precio as precio, venta.id_venta as id, venta.fecha as fecha, venta.cantidad as cantidad, producto.nom_prod as nombre, venta.total as total, categoria.nom_cat as categoria FROM venta LEFT JOIN tiene ON venta.id_venta=tiene.id_venta LEFT JOIN producto ON tiene.id_prod=producto.id_prod LEFT JOIN categoria ON producto.id_cat=categoria.id_cat WHERE venta.id_venta=${id}");
$venta = mysqli_fetch_assoc($venta);

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $cantidad = $_POST["cantidad"];
    $precio = $venta["precio"];
    $total = (int)$cantidad * (float)$precio;
    //Actualizar
    //(id_cat,nom_prod,cantidad,precio,fecha_vencimiento) VALUES('$id_cat','$nom_prod','$cantidad','$precio','$fecha_vencimiento')
    $query2 = "UPDATE Venta SET cantidad='$cantidad', total='$total' WHERE id_venta=${id}";
    $result = mysqli_query($conn,$query2);
    header("Location: ./ventas.php");
}

?>

<div>
    <div class="contenedor-volver">
        <a href="./ventas.php">< Volver</a>
    </div>
    <div>
        <form action="" method="POST" class="formulario">
            <div class="agregar-producto">
                <div class="formulario_campos">
                    <label>Fecha: </label>
                    <input type="date" name="fecha" value="<?php echo $venta["fecha"]?>" disabled>
                </div>
                <div class="formulario_campos">
                    <label>Nombre: </label>
                    <input type="text" name="nombre" value="<?php echo $venta["nombre"]?>" disabled>
                </div>
                <div class="formulario_campos">
                    <label>Precio: </label>
                    <input type="number" name="precio" value="<?php echo $venta["precio"]?>" disabled>
                </div>
                <div class="formulario_campos">
                    <label>Cantidad: </label>
                    <input type="number" name="cantidad" value="<?php echo $venta["cantidad"]?>">
                </div>
                <div class="formulario_campos">
                    <label>Categoría: </label>
                    <input type="text" name="categoria" value="<?php echo $venta["categoria"]?>" disabled>
                </div>
            </div>
            <div class="formulario_boton">
                <input type="submit" value="Actualizar venta">
            </div>
        </form>
    </div>
</div>

<?php
$contenido = ob_get_clean();
require "./includes/layout_principal.php";
?>