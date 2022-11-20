<?php
ob_start();
?>

<h1>Principal</h1>

<?php
$contenido = ob_get_clean();
require "./includes/layout_principal.php";
?>