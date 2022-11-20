<?php
ob_start();

require "./conexion.php";
require "./funciones.php";

$conn = ConexionBD();
$query = "SELECT * FROM Categoria";
$resultados = mysqli_query($conn,$query);

$id = $_GET["id"];
$producto = mysqli_query($conn,"SELECT * FROM Producto WHERE id_prod=${id}");
$producto = mysqli_fetch_assoc($producto);

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $id_cat = $_POST["id_cat"];
    $nom_prod = $_POST["nom_prod"];
    $cantidad = $_POST["cantidad"];
    $precio = $_POST["precio"];
    $fecha_vencimiento = $_POST["fecha_vencimiento"];
    //Actualizar
    //(id_cat,nom_prod,cantidad,precio,fecha_vencimiento) VALUES('$id_cat','$nom_prod','$cantidad','$precio','$fecha_vencimiento')
    $query2 = "UPDATE Producto SET id_cat='$id_cat',nom_prod='$nom_prod',cantidad='$cantidad',precio='$precio',fecha_vencimiento='$fecha_vencimiento' WHERE id_prod=${id}";
    $result = mysqli_query($conn,$query2);
    header("Location: ./productos.php");
}

?>

<div>
    <div class="contenedor-volver">
        <a href="./productos.php">< Volver</a>
    </div>
    <div>
        <form action="" method="POST" class="formulario">
            <div class="agregar-producto">
                <div class="formulario_campos">
                    <label>Categoría: </label>
                    
                    <select name="id_cat">
                        <?php
                            while($row = mysqli_fetch_assoc($resultados)){
                        ?>
                        <option value="<?php echo $row['id_cat']?>" <?php if($row["id_cat"]===$producto["id_cat"]){ echo "selected";}?>><?php echo $row["nom_cat"]?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="formulario_campos">
                    <label>Nombre: </label>
                    <input type="text" name="nom_prod" value="<?php echo $producto["nom_prod"]?>">
                </div>
                <div class="formulario_campos">
                    <label>Stock: </label>
                    <input type="number" name="cantidad" value="<?php echo $producto["cantidad"]?>">
                </div>
                <div class="formulario_campos">
                    <label>Precio: </label>
                    <input type="number" name="precio" value="<?php echo $producto["precio"]?>">
                </div>
                <div class="formulario_campos">
                    <label>Fecha de vencimiento: </label>
                    <input type="date" name="fecha_vencimiento" value="<?php echo $producto["fecha_vencimiento"]?>">
                </div>
            </div>
            <div class="formulario_boton">
                <input type="submit" value="Actualizar producto">
            </div>
        </form>
    </div>
</div>

<?php
$contenido = ob_get_clean();
require "./includes/layout_principal.php";
?>