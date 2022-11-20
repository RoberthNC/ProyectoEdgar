<?php
ob_start();

require "./conexion.php";
require "./funciones.php";

$conn = ConexionBD();
$query = "SELECT * FROM Categoria";
$resultados = mysqli_query($conn,$query);

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $categoria = $_POST["categoria"];
    if($categoria!==""){
        $query2 = "INSERT INTO Categoria(nom_cat) VALUES('$categoria')";
        $result = mysqli_query($conn,$query2);
        if($result){
            header("Location: categorias.php");
        }
    }
}

?>

<div class="contenedor-categorias">
    <div class="agregar_categorias">
        <form action="" method="POST" class="formulario">
            <h2>Agregar Categoría</h2>
            <input type="text" name="categoria">
            <input type="submit" value="Agregar Categoría">
        </form>
    </div>
    <div class="listar_categorias">
        <h2>Lista de Categorías</h2>
        <ul>
        <?php        
        while($row=mysqli_fetch_assoc($resultados)){
            echo "<li>${row['nom_cat']}</li>";
        }
        ?>
        </ul>
    </div>
</div>

<?php
$contenido = ob_get_clean();
require "./includes/layout_principal.php";
?>