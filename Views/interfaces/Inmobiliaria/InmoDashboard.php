<?php

// PARA RESTRINGIR EL ACCESO
require_once (__DIR__ . '/../../../Controllers/seguridadAcceso.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Inmo || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="../../css/master.css">
</head>

<body>
    <main class="dashboard">
        <header>
            <h2>Panel de Administración</h2>
            <a href="../../../Controllers/cerrarSesion.php" class="close"></a>
        </header>
        <a href="InmoApartamentos.php" class="btn-home inmuebles">Inmuebles</a>
        <a href="InmoSolicitudes.html" class="btn-home solicitudes">Solicitudes</a>
        
    </main>
</body>

</html>