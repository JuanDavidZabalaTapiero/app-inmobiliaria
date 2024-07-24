<?php

require_once (__DIR__ . '/../Models/consultasUsuarios.php');

class UsuariosController
{
    public $objConsultasUsuarios;

    public function __construct()
    {
        $this->objConsultasUsuarios = new ConsultasUsuarios();
    }

    // REGISTRO DE USUARIO
    public function registrarUsuario($id_user, $nombres, $apellidos, $tel, $correo, $clave, $rol)
    {
        // VERIFICO QUE EL ID NO SE REPITA
        $fUser = $this->objConsultasUsuarios->selectUsuario($id_user);

        if ($fUser["id"] == $id_user) {
            ?>
            <script>
                alert("La cuenta ya está registrada");
                location.href = "../../Views/interfaces/login.php";
            </script>
            <?php
        } else {
            // ENCRIPTAR LA CLAVE
            $newPass = md5($clave);

            $this->objConsultasUsuarios->insertUsuario($id_user, $nombres, $apellidos, $tel, $correo, $newPass, $rol);

            // MENSAJE
            ?>
            <script>
                alert("Registro Existoso!");
                location.href = "../../Views/interfaces/login.php";
            </script>
            <?php
        }
    }

    // LOGIN DEL USUARIO
    public function loginUsuario($email, $clave)
    {
        // CONSULTO EL USER POR EL CORREO
        $fUser = $this->objConsultasUsuarios->selectUsuarioEmail($email);

        // VERIFICO QUE EL EMAIL SEA VALIDO
        if ($fUser["correo"] == $email) {
            $rol = $fUser["rol"];

            session_start();

            $_SESSION["id_user"] = $fUser["id"];

            switch ($rol) {
                case 'Usuario':
                    ?>
                    <script>
                        location.href = "../../Views/interfaces/Usuario/UserDashboard.html";
                    </script>
                    <?php

                    break;

                case 'Inmobiliaria':
                    ?>
                    <script>
                        location.href = "../../Views/interfaces/Inmobiliaria/InmoDashboard.html";
                    </script>
                    <?php

                    break;
            }
        } else {
            ?>
            <script>
                alert("Correo no registrado");
                location.href = "../../Views/interfaces/login.php";
            </script>
            <?php
        }

    }
}