<?php

// PARA RESTRINGIR EL ACCESO
require_once (__DIR__ . '/../../../Controllers/seguridadAcceso.php');

// ID DEL INMUEBLE
$id_inm = $_GET["id_inm"];

require_once (__DIR__ . '/../../../Controllers/inmueblesController.php');
$objInmueblesController = new InmueblesController();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $form = $_POST["form"];

    if ($form == "edit_inm") {
        $tipo_inm = $_POST["tipo_inm"];
        $categoria_inm = $_POST["categoria_inm"];
        $precio_inm = $_POST["precio_inm"];
        $size_inm = $_POST["size_inm"];
        $ciudad_inm = $_POST["ciudad_inm"];
        $barrio_inm = $_POST["barrio_inm"];

        $objInmueblesController->updateInmueble($id_inm, $tipo_inm, $categoria_inm, $precio_inm, $size_inm, $ciudad_inm, $barrio_inm);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Inmueble || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="../../css/master.css">
</head>

<body>
    <main class="edit">
        <header>
            <h2>Modificar Inmueble</h2>
            <a href="InmoApartamentos.php" class="back"></a>
            <a href="../../../Controllers/cerrarSesion.php" class="close"></a>
        </header>

        <?php
        $objInmueblesController->showFormInmoEdit($id_inm);
        ?>
    </main>
</body>

</html>