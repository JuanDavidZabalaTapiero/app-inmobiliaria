<?php

require_once (__DIR__ . '/../../Controllers/usuariosController.php');
$objUsuariosController = new UsuariosController();


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $form = $_POST["form"];

    if ($form == "login") {
        $email = $_POST["email_user"];
        $clave = $_POST["clave_user"];

        $objUsuariosController->loginUsuario($email, $clave);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login || Tu Inmueble Ideal</title>
    <link rel="stylesheet" href="../css/master.css">
</head>

<body>
    <main class="login loginInmo" id="home">
        <h2>Tu Inmueble Ideal</h2>
        <p>Ingresa Tu Email y Contraseña</p>
        <form action="" method="post">
            <input type="hidden" name="form" value="login">
            <input type="email" placeholder="Correo Electrónico" name="email_user" required>
            <input type="password" placeholder="Contraseña" name="clave_user" required>
            <button>Ingresar</button>
        </form>
    </main>
</body>

</html>