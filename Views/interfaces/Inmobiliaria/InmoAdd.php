<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $form = $_POST["form"];

    if ($form == "registrarInmueble") {
        echo 'a';
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
            <input type="file" class="upload" aria-describedby="Foto Inmueble" name="foto_inm" required>
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

            <button class="btn-home">Guardar</button>
        </form>
    </main>
</body>

</html>