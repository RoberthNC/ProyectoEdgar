<?php
ob_start();

require "./conexion.php";
require "./funciones.php";

$conn = ConexionBD();

$nombre = $_GET["nombre"]??"";
$query = "SELECT * FROM Producto WHERE nom_prod='$nombre'";
$resultados = mysqli_query($conn,$query);
$producto = mysqli_fetch_assoc($resultados);  

if($_SERVER["REQUEST_METHOD"]==="POST"){
    session_start();
    $id_admin = $_SESSION["admin_id"];
    $fecha = date("Y-m-d");
    $cantidad = $_POST["cantidad"];
    $precio = $producto["precio"];
    $total = (int)$cantidad * (float)$precio;
    $query2 = "INSERT INTO Venta(id_admin,fecha,total,cantidad) VALUES('$id_admin','$fecha','$total','$cantidad')";
    mysqli_query($conn,$query2);
    $query4 = "SELECT * FROM Venta ORDER BY id_venta DESC limit 1";
    $resultaux = mysqli_query($conn,$query4);
    $result = mysqli_fetch_assoc($resultaux);
    $id_venta = $result["id_venta"];
    $id_prod = $producto["id_prod"];
    $query3 = "INSERT INTO tiene(id_venta,id_prod) VALUES('$id_venta','$id_prod')";
    $result2 = mysqli_query($conn,$query3);
    header("Location: ./ventas.php");
}

?>
<div class="contenedor-productos">
    <form action="" method="GET">
        <input type="text" placeholder="Buscar producto" name="nombre">
        <input type="submit" value="Buscar">
    </form>
    <form action="" method="POST">
    <div class="contenedor-tabla">
        <table class="tabla-productos">
            <tr>
                <th class="borde">ID</th>
                <th class="borde">NOMBRE</th>
                <th class="borde">CANTIDAD</th>
                <th class="borde">PRECIO</th>
                <th class="borde">FECHA VENCIMIENTO</th>
                <th></th>
                <th></th>
            </tr>
            <?php
            if($resultados->num_rows>0){
            ?>
                <tr><td class='borde'><?php echo $producto["id_prod"]?></td>;
                <td class='borde'><?php echo $producto["nom_prod"]?></td>;
                <td class='borde'><input type="number" value="1" min=1 name="cantidad"></td>;
                <td class='borde'><?php echo $producto["precio"]?></td>;
                <td class='borde'><?php echo $producto["fecha_vencimiento"]?></td>;
                </tr>;
            <?php } ?>
        </table>
        <input type="submit" value="Agregar">
    </div>
    </form>
</div>
<?php
$contenido = ob_get_clean();
require "./includes/layout_principal.php";
?>