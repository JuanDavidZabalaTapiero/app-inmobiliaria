<?php

// PARA RESTRINGIR EL ACCESO
require_once (__DIR__ . '/../../../Controllers/seguridadAcceso.php');

require_once (__DIR__ . '/../../../Controllers/inmueblesController.php');
$objInmueblesController = new InmueblesController();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="../../css/master.css">
</head>

<body>
    <main class="dashboard">
        <header>
            <h2>Inmuebles Disponibles</h2>

            <a href="../../../Controllers/cerrarSesion.php" class="close"></a>
        </header>
        <div class="contCards">
            <?php
            $objInmueblesController->showInmueblesUserDashboard();
            ?>
        </div>

    </main>
</body>

</html>