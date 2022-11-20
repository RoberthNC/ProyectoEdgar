<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    <link rel="stylesheet" href="./build/css/app.css">
    <script src="https://kit.fontawesome.com/70a17eec4f.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="contenedor-layout">
        <div class="sidebard">
            <nav class="menu_nav">
                <a href="categorias.php">Categorías</a>
                <a href="productos.php">Productos</a>
                <a href="ventas.php">Ventas</a>
                <a href="usuarios.php">Usuarios</a>
            </nav>
        </div>
        <div class="main">
            <?php
            echo $contenido;
            ?>
        </div>
    </div>
</body>
</html>