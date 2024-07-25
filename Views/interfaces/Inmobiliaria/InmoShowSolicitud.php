<?php

// PARA RESTRINGIR EL ACCESO
require_once (__DIR__ . '/../../../Controllers/seguridadAcceso.php');

// ID DE LA SOLICITUD
$id_soli = $_GET["id_soli"];

require_once (__DIR__ . '/../../../Controllers/solicitudesController.php');
$objSolicitudesController = new SolicitudesController();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Solicitud || Tu Inmueble Ya</title>
    <link rel="stylesheet" href="../../css/master.css">
</head>

<body>
    <main class="show">
        <header>
            <h2>Consultar Solicitud</h2>
            <a href="InmoSolicitudes.php" class="back"></a>
            <a href="../../../Controllers/cerrarSesion.php" class="close"></a>
        </header>

        <?php
        $objSolicitudesController->showInmoShowSolicitud($id_soli);
        ?>

    </main>
</body>

</html>