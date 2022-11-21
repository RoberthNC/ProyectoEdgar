<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layout</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>

    <link rel="stylesheet" href="./build/css/app.css">
    <script src="https://kit.fontawesome.com/70a17eec4f.js" crossorigin="anonymous"></script>
</head>
<body> 
    <?php paginaActual('hola')?>
    <div class="contenedor-layout">
        <div class="sidebar">
            <a class="sidebar__menu-inicio"><i class="fa-solid fa-house"></i> Inicio</a>
            <nav class="menu_nav">
                <a class="<?php echo paginaActual('categoria')? 'seleccionado':''?>" href="categorias.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box-multiple-3" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <rect x="7" y="3" width="14" height="14" rx="2" />
                    <path d="M17 17v2a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-10a2 2 0 0 1 2 -2h2" />
                    <path d="M14 10a2 2 0 1 0 -2 -2" />
                    <path d="M12 12a2 2 0 1 0 2 -2" />
                    </svg> Categorías</a>
                <a class="<?php echo paginaActual('productos')? 'seleccionado':''?>" href="productos.php"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-ice-cream-2" width="28" height="28" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M17.657 11.004a6 6 0 1 0 -11.315 0" />
                    <path d="M6.342 11l5.658 11l5.657 -10.996z" />
                    </svg> Productos</a>
                <a class="<?php echo paginaActual('ventas')? 'seleccionado':''?>" href="ventas.php"><i class="fa-solid fa-money-bill"></i> Ventas</a>
                <a class="<?php echo paginaActual('usuarios')? 'seleccionado':''?>" href="usuarios.php"><i class="fa-solid fa-people-group"></i> Usuarios</a>
            </nav>
        </div>
        <div class="main">
            <?php
            echo $contenido;
            ?>
        </div>
    </div>
</body>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

</html>