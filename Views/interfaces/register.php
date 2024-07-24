<?php

require_once (__DIR__ . '/../../Controllers/usuariosController.php');
$objUsuariosController = new UsuariosController();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $form = $_POST["form"];

    if ($form == "registro") {
        $id_user = $_POST["id_user"];
        $nombres = $_POST["nombres_user"];
        $apellidos = $_POST["apellidos_user"];
        $tel = $_POST["telefono_user"];
        $correo = $_POST["correo_user"];
        $clave = $_POST["clave_user"];
        $rol = $_POST["rol_user"];
        $objUsuariosController->registrarUsuario($id_user, $nombres, $apellidos, $tel, $correo, $clave, $rol);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="../css/master.css">
</head>

<body>
    <main class="login register" id="home">
        <h2>Tu Inmueble Ideal</h2>
        <p>Ingresa Tus Datos y Crea una Nueva. Recuerda elegir tu rol.</p>
        <form action="" method="post">
            <input type="hidden" name="form" value="registro" required>
            <input type="number" placeholder="Identificación" name="id_user" required>
            <input type="text" placeholder="Nombres" name="nombres_user" required>
            <input type="text" placeholder="Apellidos" name="apellidos_user" required>
            <input type="number" placeholder="Teléfono" name="telefono_user" required>
            <input type="email" placeholder="Correo Electrónico" name="correo_user" required>
            <input type="password" placeholder="Contraseña" name="clave_user" required>
            <div class="select">
                <select name="rol_user" required>
                    <option>Seleccione Rol</option>
                    <option value="Usuario">Usuario</option>
                    <option value="Inmobiliaria">Inmobiliaria</option>
                </select>
            </div>
            <button>Crear Mi Cuenta</button>
        </form>
    </main>
</body>

</html>