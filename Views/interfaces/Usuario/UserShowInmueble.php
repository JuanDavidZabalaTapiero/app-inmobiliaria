<?php

// PARA RESTRINGIR EL ACCESO
require_once (__DIR__ . '/../../../Controllers/seguridadAcceso.php');

// ID DEL USUARIO
$id_user = $_SESSION["id_user"];

// ID DEL INMUEBLE
$id_inm = $_GET["id_inm"];

require_once (__DIR__ . '/../../../Controllers/inmueblesController.php');
$objInmueblesController = new InmueblesController();

require_once (__DIR__ . '/../../../Controllers/solicitudesController.php');
$objSolicitudesController = new SolicitudesController();

if (isset($_GET["cita"])) {
    $id_inmueble = $_GET["cita"];

    $fecha = date('Y-m-d');

    $objSolicitudesController->insertSolicitud($id_inmueble, $id_user, $fecha);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Inmueble - Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="../../css/master.css">
</head>

<body>
    <main class="show">
        <header>
            <h2>Consultar Inmueble</h2>
            <a href="UserDashboard.php" class="back"></a>
            <a href="../../../Controllers/cerrarSesion.php" class="close"></a>
        </header>

        <?php
        $objInmueblesController->UserShowInmueble($id_inm);
        ?>

    </main>
</body>

</html>