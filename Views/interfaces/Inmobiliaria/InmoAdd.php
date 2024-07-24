<?php

// PARA RESTRINGIR EL ACCESO
require_once (__DIR__ . '/../../../Controllers/seguridadAcceso.php');

require_once (__DIR__ . '/../../../Controllers/inmueblesController.php');
$objInmueblesController = new InmueblesController();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $form = $_POST["form"];

    if ($form == "registrarInmueble") {
        
        $tipo_inm = $_POST["tipo_inm"];
        $categoria_inm = $_POST["categoria_inm"];
        $precio_inm = $_POST["precio_inm"];
        $tamaño_inm = $_POST["tamaño_inm"];
        $ciudad_inm = $_POST["ciudad_inm"];
        $barrio_inm = $_POST["barrio_inm"];

        // PRIMERO SUBO LA IMG A LA CARPETA UPLOADS
        $uploadDir = '../../../Uploads/inmuebles/';

        // Nombre del archivo subido
        $foto_inm = basename($_FILES['foto_inm']['name']);

        // Ruta completa del archivo subido
        $uploadFile = $uploadDir . $foto_inm;

        // Mover el archivo subido a la carpeta de destino
        if (move_uploaded_file($_FILES['foto_inm']['tmp_name'], $uploadFile)) {
            
            $objInmueblesController->insertInmueble($tipo_inm, $categoria_inm, $precio_inm, $tamaño_inm, $ciudad_inm, $barrio_inm, $foto_inm);
        } else {
            echo "Hubo un error al subir el archivo.\n";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Inmueble || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="../../css/master.css">
</head>

<body>
    <main class="add">
        <header>
            <h2>Adicionar Inmueble</h2>
            <a href="InmoApartamentos.php" class="back"></a>
            <a href="../../../Controllers/cerrarSesion.php" class="close"></a>
        </header>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="form" value="registrarInmueble">

            <input type="file" class="upload" aria-describedby="Foto Inmueble" name="foto_inm" accept=".jpg, .jpeg, .png, .gif, .bmp, .webp" required>

            <div class="select">
                <select name="tipo_inm" required>
                    <option value="">Seleccione Tipo de Inmueble...</option>
                    <option value="Apartamento">Apartamento</option>
                    <option value="Aparta Estudio">Aparta Estudio</option>
                    <option value="Casa">Casa</option>
                </select>
            </div>

            <div class="select">
                <select name="categoria_inm" required>
                    <option value="">Seleccione Categoría...</option>
                    <option value="Arriendo">Arriendo</option>
                    <option value="Venta">Venta</option>
                </select>
            </div>

            <input type="number" placeholder="Precio..." name="precio_inm" required>

            <input type="number" placeholder="Tamaño..." name="tamaño_inm" required>

            <input type="text" placeholder="Ciudad..." name="ciudad_inm" required>

            <input type="text" placeholder="Localidad/Barrio..." name="barrio_inm" required>

            <button class="btn-home" type="submit">Guardar</button>
        </form>
    </main>
</body>

</html>